<?php
include '../../config/function.php';
include '../../config/conf.php';


//cari user berdasarkan id
$data = cari_row(
    $conn,
    "SELECT * FROM tb_user Where id_user='$_POST[id]'"
);
echo json_encode(array('data' => $data));
