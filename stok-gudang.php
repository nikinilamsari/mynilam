<div class="content-wrapper" style="min-height: 2838.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card" id="tampil">

            <div class="card-body">

                <!-- <button class="btn btn-warning" onclick="show('tambah',null);"><i class="fa fa-plus"></i> Tambah</button> -->


                <button class="btn btn-default" onclick="show('uprint',null);"><i class="fa fa-print"></i> Cetak</button>

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 40px;">No</th>

                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $sql = "SELECT * FROM tb_barang";
                        foreach (cari_array($conn, $sql) as $key) :
                            $no++;
                            $sqljum = "SELECT IF(jumlah_masuk,SUM(jumlah_masuk),0) as jml,IF(jumlah_keluar,SUM(jumlah_keluar),0) as kur FROM tb_detmasuk a JOIN tb_detkeluar b WHERE a.id_barang='$key[id_barang]'";
                            $sqljums = cari_row($conn, $sqljum);
                            // $sqlkur = "SELECT IF(jumlah_keluar,SUM(jumlah_keluar),0) as jml FROM tb_detkeluar WHERE id_barang='$key[id_barang]'";
                            // $sqljums = cari_row($conn, $sqljum);
                            // $sqlkurs = cari_row($conn, $sqlkur);
                            // echo "<pre>";
                            // print_r($sqljums);

                        ?>
                            <tr>
                                <td align="center"><?= $no; ?></td>

                                <td><?= $key['kode_barang'] ?></td>
                                <td><?= $key['nama_barang'] ?></td>
                                <td><?= $sqljums['jml'] - $sqljums['kur'] ?></td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card -->
        <div class="card col-md-8 col-sm-8 col-lg-4 col-xs-12" id="tambahForm" style="display: none;">
            <div class="card-header">
                <h5 class="card-titleT"></h5>
            </div>
            <div class="card-body">


                <form role="form" method="post" id="form-data">
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="action" id="action" value="">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="kdbrg" id="kdbrg" class="form-control" placeholder="Masukkan Kode Barang">
                        <span class="help-block" id="help_kdbrg"></span>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nmbrg" id="nmbrg" class="form-control" placeholder="Masukkan  Nama Barang">
                        <span class="help-block" id="help_nmbrg"></span>
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <div align="right"><b><span id="rpsaldo" style="font-size:20px;color:red">Rp. 0</span></b></div>
                        <input type="text" name="hrgbrg" id="hrgbrg" onkeypress='return check_int(event)' onkeyup='return HitungNominal()' class="form-control" placeholder="Masukkan Harga Barang">
                        <span class="help-block" id="help_hrgbrg"></span>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" style="resize:none" name="ket" id="ket" cols="30" rows="5"></textarea>
                        <span class="help-block" id="help_ket"></span>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <!-- <input type="text" name="id_supp" id="id_supp" class="form-control" placeholder="Masukkan Id Supplier"> -->
                        <select name="id_supp" class="form-control select" id="id_supp">
                            <option value="">-PILIH SUPPLIER-</option>
                            <?php
                            $sql = 'SELECT id_supplier,nama_supplier FROM tb_supplier';
                            foreach (cari_array($conn, $sql) as $key) :
                            ?>
                                <option value="<?= $key['id_supplier'] ?>"><?= $key['nama_supplier'] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <span class="help-block" id="help_id_supp"></span>
                    </div>
                </form>



            </div>
            <div class="card-footer">
                <button id="btnBack" class="btn btn-default">Kembali</button>
                <button id="btnSubmit" name="btnSubmit" class="btn btn-warning float-right">Simpan</button>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="modalp">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    var title = 'Data Barang'
    $('title').html(title)


    // $('#btnTmb').click(function(e) {})
    $('#btnBack').click(function(e) {
        e.preventDefault()
        $('#tambahForm').hide()
        $('#tampil').show()
        $('#id').val('')
        $('#kdbrg').val('')
        $('#nmbrg').val('')
        $('#hrgbrg').val('')
        $('#ket').val('')
        $('#id_supp').val('')
        $('#hapus-notif').remove();
        $('#form-data').show();
        $('#btnSubmit').text('Simpan');
    })

    function show(act, id) {
        if (act == 'tambah') {
            // e.preventDefault()
            $('.card-titleT').html('Tambah ' + title)
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#id').val('')
            $('#kdbrg').val('')
            $('#nmbrg').val('')
            $('#hrgbrg').val('')
            $('#ket').val('')
            $('#id_supp').val('')
            $('#action').val('tambah')
            $('#btnSubmit').text('Simpan');
        } else if (act == 'edit') {
            var dt_get = getJSON('<?= base_url() ?>load/barang/getbarang.php', {
                id: id
            });
            $('.card-titleT').html('Edit ' + title)
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#action').val('edit')
            $('#btnSubmit').text('Edit');
            $('#id').val(dt_get.data.id_barang)
            $('#kdbrg').val(dt_get.data.kode_barang)
            $('#nmbrg').val(dt_get.data.nama_barang)
            $('#ket').val(dt_get.data.keterangan)
            $('#id_supp').val(dt_get.data.id_supplier)
            $('#hrgbrg').val(dt_get.data.harga_barang)
            HitungNominal()
            // alert('Button Edit ' + id)
        } else if (act == 'hapus') {
            var dt_get = getJSON('<?= base_url() ?>load/barang/getbarang.php', {
                id: id
            });
            $('.card-titleT').html('Hapus ' + title)
            $('#btnSubmit').text('Hapus');
            $('#action').val('hapus')
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#form-data').hide();
            $('#id').val(dt_get.data.id_barang)
            $('#tambahForm .card-body').prepend('<p id="hapus-notif">Apakah Anda yakin ingin menghapus : <strong>' + dt_get.data.kode_barang + '(' + dt_get.data.nama_barang + ')</strong></p>');
            // alert('Button Hapus ' + id)

        } else if (act == 'uprint') {
            $('#modalp .modal-header .modal-title').text('Cetak Laporan Stok Barang');
            $('#modalp .modal-dialog').addClass('modal-lg');

            $('#modalp .modal-body').html(
                '<embed src="<?php echo base_url(); ?>cetak/pdf-barang-gudang.php" width="100%" height="500" type="application/pdf">');
            $('#modalp').modal('show');

        }
    }


    //Btn Simpan
    $('#btnSubmit').on('click', function(e) {
        e.preventDefault();
        var datatosend = $('#form-data').serialize();

        $.ajax('<?= base_url() ?>load/barang/simpanubah.php', {
            dataType: 'json',
            type: 'POST',
            data: datatosend,
            cache: false,
            success: function(data) {
                if (data.status == 'success') {
                    // $('#modal').modal('hide');
                    showNotif('Data berhasil diperbarui.', 'success', false);
                    $('#tambahForm').hide()
                    $('#tampil').show()
                    $('#id').val('')
                    location.reload();
                    // $('#example2').DataTable().ajax.reload();
                } else {
                    $.each(data, function(key, value) {
                        if (value == 'failed' || typeof(value) == 'undefined' || value == '') {
                            return true;
                        }
                        setBorderColor('#' + key, 'border-color', 'red', 5000);
                        showNotif('Data gagal diperbarui.', 'danger', false);
                        setHelpBlockRed(key, value);
                    });
                }
            }
        });
    });

    function HitungNominal() {
        $('#rpsaldo').html(to_rupiah($('#hrgbrg').val()));
    }
</script>