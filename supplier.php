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
                <button class="btn btn-warning" onclick="show('tambah',null);"><i class="fa fa-plus"></i> Tambah</button>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 40px;">No</th>
                            <th style="width: 70px;">Aksi</th>
                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $sql = "SELECT * FROM tb_supplier";
                        foreach (cari_array($conn, $sql) as $key) :
                            $no++;
                        ?>
                            <tr>
                                <td align="center"><?= $no; ?></td>
                                <td align="center"><button class="btn btn-warning btn-sm" onclick="show('edit',<?= $key['id_supplier'] ?>)"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-danger btn-sm" onclick="show('hapus',<?= $key['id_supplier'] ?>)"><i class="fas fa-trash-alt"></i></button></td>
                                <td><?= $key['kode_supplier'] ?></td>
                                <td><?= $key['nama_supplier'] ?></td>
                                <td><?= $key['alamat_supplier'] ?></td>
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
                        <label>Kode Supplier</label>
                        <input type="text" name="kdsupp" id="kdsupp" class="form-control" placeholder="Masukkan Kode Supplier">
                        <span class="help-block" id="help_kdsupp"></span>
                    </div>
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="nmsupp" id="nmsupp" class="form-control" autocomplete="off" placeholder="Masukkan  Nama Supplier">
                        <span class="help-block" id="help_nmsupp"></span>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" style="resize:none" name="alamat" id="alamat" cols="30" rows="5"></textarea>
                        <span class="help-block" id="help_alamat"></span>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button id="btnBack" class="btn btn-default">Kembali</button>
                <button id="btnSubmit" name="btnSubmit" class="btn btn-warning float-right">Simpan</button>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                Footer
            </div> -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<script>
    var title = 'Data Supplier'
    $('title').html(title)


    // $('#btnTmb').click(function(e) {})
    $('#btnBack').click(function(e) {
        e.preventDefault()
        $('#tambahForm').hide()
        $('#tampil').show()
        $('#id').val('')
        $('#kdsupp').val('')
        $('#nmsupp').val('')
        $('#alamat').val('')
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
            $('#kdsupp').val('')
            $('#nmsupp').val('')
            $('#alamat').val('')
            $('#action').val('tambah')
            $('#btnSubmit').text('Simpan');
        } else if (act == 'edit') {
            var dt_get = getJSON('<?= base_url() ?>load/supplier/getsupplier.php', {
                id: id
            });
            $('.card-titleT').html('Edit ' + title)
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#action').val('edit')
            $('#btnSubmit').text('Edit');
            $('#id').val(dt_get.data.id_supplier)
            $('#kdsupp').val(dt_get.data.kode_supplier)
            $('#nmsupp').val(dt_get.data.nama_supplier)
            $('#alamat').val(dt_get.data.alamat_supplier)
            // alert('Button Edit ' + id)
        } else if (act == 'hapus') {
            var dt_get = getJSON('<?= base_url() ?>load/supplier/getsupplier.php', {
                id: id
            });
            $('.card-titleT').html('Hapus ' + title)
            $('#btnSubmit').text('Hapus');
            $('#action').val('hapus')
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#form-data').hide();
            $('#id').val(dt_get.data.id_supplier)
            $('#tambahForm .card-body').prepend('<p id="hapus-notif">Apakah Anda yakin ingin menghapus : <strong>' + dt_get.data.kode_supplier + '(' + dt_get.data.nama_supplier + ')</strong></p>');
            // alert('Button Hapus ' + id)

        }
    }


    //Btn Simpan
    $('#btnSubmit').on('click', function(e) {
        e.preventDefault();
        var datatosend = $('#form-data').serialize();

        $.ajax('<?= base_url() ?>load/supplier/simpanubah.php', {
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
                            showNotif('Data gagal diperbarui.', 'danger', false);

                            return true;
                        }
                        setBorderColor('#' + key, 'border-color', 'red', 5000);
                        setHelpBlockRed(key, value);
                    });
                }
            }
        });
    });
</script>