<?php
//================= FUNGSI BIAR SINGKAT =========================
function cari_array($conn, $sql_tampil)
{
    //perintah untuk mengambil data dari tb_buku
    $query_tampil = mysqli_query($conn, $sql_tampil);
    $no = 1; //nilai awal no
    $res  = [];
    while ($data = $query_tampil->fetch_assoc()) :
        $res[] = $data;
    endwhile;

    return $res;
}
function cari_row($conn, $sql_tampil)
{
    //perintah untuk mengambil data dari tb_buku
    $query_tampil = mysqli_query($conn, $sql_tampil);
    $no = 1; //nilai awal no
    $data = $query_tampil->fetch_assoc();
    return $data;
}
