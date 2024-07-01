<?php
include '../../config/function.php';
include '../../config/conf.php';


//cari barang berdasarkan id
$data = cari_row(
    $conn,
    "SELECT * FROM tb_supplier Where id_supplier='$_POST[id]'"
);
echo json_encode(array('data' => $data));
