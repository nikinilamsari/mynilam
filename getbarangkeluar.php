<?php
include '../../config/function.php';
include '../../config/conf.php';


//cari barang berdasarkan id
$data = cari_row(
    $conn,
    "SELECT * FROM tb_barangkeluar Where id_barangkeluar='$_POST[id]'"
);
echo json_encode(array('data' => $data));
