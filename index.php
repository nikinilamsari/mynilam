<?php
include 'views/template/header.php';

if (isset($_GET['halaman'])) {
    $hal = $_GET['halaman'];

    switch ($hal) {
        case 'dashboard': //jika memanggil halaman=beranda maka...
            include "dashboard.php"; //menampilkan file beranda.php
            break;
        case 'barang': //jika memanggil halaman=barang maka...
            include "barang.php"; //menampilkan file barang.php
            break;
        case 'supplier': //jika memanggil halaman=supplier maka...
            include "supplier.php"; //menampilkan file supplier.php
            break;
        case 'barang-masuk': //jika memanggil halaman=barang-masuk maka...
            include "barang-masuk.php"; //menampilkan file barang-masuk.php
            break;
        case 'barang-keluar': //jika memanggil halaman=barang-kelaur maka...
            include "barang-keluar.php"; //menampilkan file barang-kelaur.php
            break;
        case 'stok-gudang': //jika memanggil halaman=barang-kelaur maka...
            include "stok-gudang.php"; //menampilkan file barang-kelaur.php
            break;
        case 'data-user': //jika memanggil halaman=barang-kelaur maka...
            include "data-user.php"; //menampilkan file barang-kelaur.php
            break;
        default: //jika memanggil halaman tidak ada maka...
            echo "<script>alert('Maaf Tidak Ada Halaman')</script>";
            //menampilkan pesan error
            include "404.php"; //menampilkan file 404.php
            break;
    }
} else { //jika tidak memanggil halaman apapun maka...
    include "dashboard.php"; //menampilkan file beranda.php
}

include 'views/template/footer.php';
