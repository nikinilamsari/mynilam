<?php
include '../../config/function.php';
include '../../config/conf.php';


//cari barang berdasarkan id
$data = cari_row(
    $conn,
    "SELECT * FROM tb_barang a INNER JOIN tb_supplier b ON a.id_supplier=b.id_supplier Where a.id_barang='$_POST[id]'"
);
echo json_encode(array('data' => $data));
