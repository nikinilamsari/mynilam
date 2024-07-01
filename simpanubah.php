<?php
include '../../config/function.php';
include '../../config/conf.php';



if ($_POST['action'] == 'tambah' || $_POST['action'] == 'edit') {

    if ($_POST['id'] != '' || $_POST['id'] != null) {
        //validasi kodesupp & namasupp harus diisi
        if ($_POST['kdsupp'] != '' && $_POST['nmsupp'] != '') {
            //mulai proses ubah
            $sql = "UPDATE tb_supplier SET
        kode_supplier       ='" . $_POST['kdsupp']  . "',
        nama_supplier       ='" . $_POST['nmsupp']  . "',
        alamat_supplier     ='" . $_POST['alamat']  . "'
        WHERE id_supplier   ='" . $_POST['id']      . "'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo json_encode(array('status' => 'success'));
            } else {
                echo json_encode(array('status' => 'failed'));
            }
        } else {
            $val = [];
            if ($_POST['kdsupp'] == '') {
                $val['kdsupp'] = 'Maaf Kode Harus Diisi';
            }
            if ($_POST['nmsupp'] == '') {
                $val['nmsupp'] = 'Maaf Nama Harus Diisi';
                # code...
            }
            echo json_encode(array('status' => 'failed') + $val);
        }
    } else {

        //untuk proses tambah

        if ($_POST['kdsupp'] != '' && $_POST['nmsupp'] != '') {
            $sql = "INSERT INTO tb_supplier 
            (kode_supplier,nama_supplier,alamat_supplier) 
            VALUES (
            '" . $_POST['kdsupp'] . "',
            '" . $_POST['nmsupp'] . "',
            '" . $_POST['alamat'] . "'
            )";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo json_encode(array('status' => 'success'));
            } else {
                echo json_encode(array('status' => 'failed'));
            }
        } else {
            $val = [];
            if ($_POST['kdsupp'] == '') {
                $val['kdsupp'] = 'Maaf Kode Harus Diisi';
            }
            if ($_POST['nmsupp'] == '') {
                $val['nmsupp'] = 'Maaf Nama Harus Diisi';
                # code...
            }
            echo json_encode(array('status' => 'failed') + $val);
        }
    }
} elseif ($_POST['action'] == 'hapus') {

    //query untuk hapus
    $sql = "DELETE FROM tb_supplier WHERE id_supplier ='" . $_POST['id'] . "'";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'failed'));
    }
}
