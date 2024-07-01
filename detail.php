<?php
include '../../config/function.php';
include '../../config/conf.php';

//cari barang berdasarkan id
$data = cari_array(
    $conn,
    "SELECT * FROM tb_barangmasuk a INNER JOIN tb_detmasuk b ON a.kode_barangmasuk=b.kode_barangmasuk INNER JOIN tb_barang c ON b.id_barang=c.id_barang INNER JOIN tb_supplier d ON a.id_supplier=d.id_supplier WHERE a.id_barangmasuk='$_POST[id]'"
);


echo json_encode(array('data' => $data));
