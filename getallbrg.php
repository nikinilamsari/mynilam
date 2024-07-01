<?php
include '../../config/function.php';
include '../../config/conf.php';


//cari barang berdasarkan id
$data = cari_array(
    $conn,
    "SELECT * FROM tb_barang WHERE id_supplier='$_POST[id_s]'"
);

# code...
echo json_encode(array('data' => $data));
