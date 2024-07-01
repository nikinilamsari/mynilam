<!doctype html>
<html>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->


<body onload="js:window.print()">

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;

        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 0px solid black;
        }

        #data-keluarga,
        #data-keluarga>th,
        #data-keluarga>td {
            border: 1px solid black !important;
        }

        table.data-keluarga {
            border-collapse: collapse !important;
        }

        .judul1 {
            text-align: center;

            line-height: 0.5;

        }


        .judul2 {
            text-align: center;

        }

        .bold {
            font-weight: bolder;
        }

        .yayasan,
        .muslimat {
            font-size: 14px;
        }

        .jalan,
        .email,
        .nss {
            font-size: 11px;
        }

        .sdu {
            font-size: 32px;
        }

        .tengah {
            line-height: 1.7;
            font-size: 14px;
        }

        .sub1 {
            width: 283px;
            line-height: 1.5;
        }

        .awal1 {
            margin-top: 30px;
            margin-left: 35px;
        }

        .awal2 {
            text-align: left;
            margin-left: 35px;
        }

        tr.awal-sub {
            line-height: 2.5;
        }

        .rowspans {
            width: 20px;
        }

        .b-ortu {
            width: 250px;
            padding-left: 10px;
        }

        .b-ortus {
            width: 250px;
            padding-left: 10px;
            border-left: 1px solid black;
        }

        .b-atas {

            border: 1px solid black;
            padding-bottom: 10px;
        }

        .b-ayah-ibu {
            width: 200px;
            text-align: center;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .b-ayah-ibu-atas {
            width: 200px;
            text-align: center;
            border: 1px solid black;
        }

        .border-nom {
            border-right: 1px solid black;
        }

        hr.style-eight {
            overflow: visible;
            /* For IE */
            padding: 0;
            border: ridge;
            border-top: medium ridge #333;
            color: #333;
            text-align: center;
        }

        hr.ttd {
            overflow: visible;
            /* For IE */
            padding: 0;

            border-top: medium solid #333;

            color: #333;
            text-align: center;
        }
    </style>
    <div class="row">
        <table>

            <thead>
                <tr>
                    <th class="" rowspan="6">
                        <img src="../assets/img/logo/umk.png" alt="" width="140px">
                    </th>
                    <!-- <td class="judul1 bold yayasan">YAYASAN PENDIDIKAN DAN SOSIAL</td> -->
                    <td class="judul1 bold yayasan"></td>
                </tr>
                <tr>
                    <!-- <td class="judul1 bold muslimat">MUSLIMAT NU KHADIJAH KABUPATEN KUDUS</td> -->
                    <td class="judul1 bold muslimat"></td>
                </tr>
                <tr>
                    <td class="judul1 bold sdu">PENDATAAN BARANG</td>
                </tr>
                <tr>
                    <!-- <td class="judul1 jalan">Jl. Pramuka No.24 Kudus (Komplek PA. Darul Hadlonah) Telp. 0291-432140 -->
                    <td class="judul1 jalan">Teknik Informatika Pendaataan Barang
                    </td>
                </tr>
                <tr>
                    <td class="judul1 email">Pemrograman Web</td>
                </tr>
                <tr>
                    <td class="judul1 nss">Dosen : Andre Tri Saputra.Kom., M.Kom.</td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="row">
        <hr class="style-eight">
    </div>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <td class="bold judul2 tengah">
                        LAPORAN PENDATAAN BARANG MASUK
                    </td>
                </tr>
                <tr>
                    <td class="bold judul2 tengah">
                        TAHUN <span id="tahun">2020</span>
                    </td>
                </tr>
                <tr>
                    <td class="bold judul2 tengah">

                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="row awal2">
        <table>
            <thead>
                <tr class="awal-sub">
                    <th class="rowspans">*.</th>

                    <th colspan="2" style="width:250px ;">Data Barang Masuk</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="row awal2">
        <table class="data-keluarga" id="data-keluarga">
            <thead>
                <tr class="awal-sub judul2" style="background-color: darkgray;">
                    <th class="b-atas" style="width: 40px;">No</th>
                    <th class="b-atas" style="width: 250px;">Kode Barang Masuk</th>
                    <th class="b-ayah-ibu-atas">Tanggal</th>
                    <th class="b-ayah-ibu-atas">Terima Dari</th>
                    <th class="b-ayah-ibu-atas">Supplier</th>
                </tr>
                <?php
                include "../config/conf.php";
                include "../config/function.php";

                $pkb =  cari_array($conn, 'SELECT * FROM tb_barangmasuk a INNER JOIN tb_supplier d ON a.id_supplier=d.id_supplier');
                $no = 0;
                foreach ($pkb as $pk) :
                    $no++;
                ?>
                    <tr class="awal-sub" style="border: 1px solid black;">
                        <td class="judul2 border-nom" style="width: 40px;"><?= $no; ?>.</td>
                        <td class='b-ortu'><?= $pk['kode_barangmasuk'] ?></td>
                        <td class="b-ortus"><?= $pk['terimadari'] ?></td>
                        <td class="b-ayah-ibu"><?= $pk['tgl_barangmasuk'] ?></td>
                        <td class="b-ortu">Kode : <b><?= $pk['kode_supplier'] ?></b><br>Nama : <b><?= $pk['nama_supplier'] ?></b></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </thead>

        </table>
    </div>
    <div class="row awal1">
        <table>
            <thead>
                <tr>
                    <td colspan="5">*Lampiran detail barang masuk di cetak di lembar selanjutnya.</td>

                </tr>

                <tr>
                    <th style="width: 200px;"></th>
                    <th style="width: 250px;"></th>
                    <th align="left">Kudus, ................................2021</th>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td align="left">Petugas Cetak</td>

                </tr>
                <tr>

                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <!-- <hr class="ttd"> -->
                    </td>
                    <td></td>
                    <td align="left">
                        <hr class="ttd">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</body>
<script>
    var tgl = new Date().getFullYear()
    var elTgl = document.querySelector('#tahun')
    elTgl.innerHTML = tgl
</script>

</html>