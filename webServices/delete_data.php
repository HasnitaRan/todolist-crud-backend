<?php

require_once '../config/connect.php';

# menghubungkan zona waktu saat ini
date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date('Y-m-d H:i:s');

if ($SERVER ["REQUEST_METHOD"] = "POST") {

    $response = array();

    $id = $_POST['id'];

    $hapus = "DELETE FROM data_list WHERE id ='$id'";

    if(mysqli_query($con, $hapus)) {
        #code...
        $cek = mysqli_query($con, "SELECT * FROM data_list WHERE id='$id'");
        $results = mysqli_fetch_array($cek);
        
        #ngecek apakah data yg kita ubah berubah atau tidak
        $response['id'] = (int)$results['id'] ?? "TERHAPUS";
        $response['nama'] = $results['nama'] ?? "TERHAPUS";
        $response['deskripsi'] = $results['deskripsi'] ?? "TERHAPUS";
        $response['status'] = $results['status'] ?? "TERHAPUS";
        $response['tgl_sekarang'] = $results['tgl_sekarang'] ?? "TERHAPUS";

        $response["value"] = 1;
        $response["message"] = "Berhasil Hapus Data";
        echo json_encode($response);
    } else {
        #code... 
        $response["value"] = 0;
        $response["message"] = "Gagal Hapus Data";
        echo json_encode($response);
    }
}