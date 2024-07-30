<?php

require_once '../config/connect.php';

# menghubungkan zona waktu saat ini
date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date('Y-m-d H:i:s');

if ($SERVER ["REQUEST_METHOD"] = "POST") {

    $response = array();

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $updt = "UPDATE data_list SET nama='$nama', deskripsi='$deskripsi', 
    tgl_sekarang='$tgl_sekarang' WHERE id ='$id'
    ";

    if(mysqli_query($con, $updt)) {
        #code...
        $cek = mysqli_query($con, "SELECT * FROM data_list WHERE id='$id'");
        $results = mysqli_fetch_array($cek);
        
        #ngecek apakah data yg kita ubah berubah atau tidak
        $response['id'] = (int)$results['id'];
        $response['nama'] = $results['nama'];
        $response['deskripsi'] = $results['deskripsi'];
        $response['status'] = $results['status'] == "1" ? "DIBUAT" : "HISTORY";
        $response['tgl_sekarang'] = $results['tgl_sekarang'];

        $response["value"] = 1;
        $response["message"] = "Berhasil Ubah Data";
        echo json_encode($response);
    } else {
        #code... 
        $response["value"] = 0;
        $response["message"] = "Gagal Ubah Data";
        echo json_encode($response);
    }
}