<?php

require_once '../config/connect.php';

date_default_timezone_set('Asia/Jakarta');

if ($SERVER ["REQUEST_METHOD"] = "GET") {
    # code...
    $response = array();

    $cek = mysqli_query($con, "SELECT * FROM data_list ORDER BY tgl_sekarang DESC");
    while ($a = mysqli_fetch_array($cek)) {
        # code...
        $response['data'][] = array(
            "id" => (int)$a['id'],
            "nama" => $a['nama'],
            "deskripsi" => $a['deskripsi'],
            "status" => $a['status'] ?? "1" ? "DIBUAT" : "HISTORY",
            "tgl_sekarang" => $a['tgl_sekarang'],
        );
    }

    $response["value"] = 1;
    $response["message"] = "Berhasil";
    echo json_encode($response);
}