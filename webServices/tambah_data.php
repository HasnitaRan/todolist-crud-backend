<?php

require_once '../config/connect.php';

# menghubungkan zona waktu saat ini
date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date('Y-m-d H:i:s');

if ($SERVER ["REQUEST_METHOD"] = "POST") {
    # code... 

    $response = array();
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $insert = "INSERT INTO data_list VALUES(NULL, '$nama', '$deskripsi', '1','$tgl_sekarang')";

    if (mysqli_query($con, $insert)){
        $response["value"] = 1;
        $response["message"] = "Berhasil Menambahkan data!";
        echo json_encode ($response);

    } else {
        $response["value"] = 0;
        $response["message"] = "Gagal Menambahkan data!".mysqli_error($con);
        echo json_encode ($response);

    }

}