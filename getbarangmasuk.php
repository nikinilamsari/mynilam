<?php
include '../../config/function.php';
include '../../config/conf.php';


//cari barang berdasarkan id
$data = cari_row(
    $conn,
    "SELECT * FROM tb_barangmasuk Where id_barangmasuk='$_POST[id]'"
);
echo json_encode(array('data' => $data));
