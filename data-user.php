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
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $sql = "SELECT * FROM tb_user ";
                        foreach (cari_array($conn, $sql) as $key) :
                            $no++;
                        ?>
                            <tr>
                                <td align="center"><?= $no; ?></td>
                                <td align="center"><button class="btn btn-warning btn-sm" onclick="show('edit',<?= $key['id_user'] ?>)"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-danger btn-sm" onclick="show('hapus',<?= $key['id_user'] ?>)"><i class="fas fa-trash-alt"></i></button></td>
                                <td><?= $key['username'] ?></td>
                                <td><?= $key['password'] ?></td>
                                <td><?= $key['nama'] ?></td>
                                <td><?= $key['role'] ?></td>

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
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username">
                        <span class="help-block" id="help_username"></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="pass" id="pass" class="form-control" placeholder="Masukkan Password">
                        <span class="help-block" id="help_pass"></span>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
                        <span class="help-block" id="help_nama"></span>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <!-- <input type="text" name="id_supp" id="id_supp" class="form-control" placeholder="Masukkan Id Supplier"> -->
                        <select name="role" class="form-control select" id="role">
                            <option value="">-PILIH ROLE-</option>
                            <option value="admin">ADMIN</option>
                            <option value="owner">OWNER</option>
                           
                        </select>
                        <span class="help-block" id="help_role"></span>
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
<script>
    var title = 'Data User'
    $('title').html(title)


    // $('#btnTmb').click(function(e) {})
    $('#btnBack').click(function(e) {
        e.preventDefault()
        $('#tambahForm').hide()
        $('#tampil').show()
        $('#id').val('')
        $('#username').val('')
        $('#pass').val('')
        $('#nama').val('')
        $('#role').val('')
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
            $('#username').val('')
            $('#pass').val('')
            $('#nama').val('')
            $('#role').val('')
            $('#action').val('tambah')
            $('#btnSubmit').text('Simpan');
        } else if (act == 'edit') {
            var dt_get = getJSON('<?= base_url() ?>load/data-user/getuser.php', {
                id: id
            });
            console.log(dt_get);
            $('.card-titleT').html('Edit ' + title)
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#action').val('edit')
            $('#btnSubmit').text('Edit');
            $('#id').val(dt_get.data.id_user)
            $('#username').val(dt_get.data.username)
            $('#pass').val(dt_get.data.password)
            $('#nama').val(dt_get.data.nama)
            $('#role').val(dt_get.data.role)
            // alert('Button Edit ' + id)
        } else if (act == 'hapus') {
            var dt_get = getJSON('<?= base_url() ?>load/data-user/getuser.php', {
                id: id
            });
            $('.card-titleT').html('Hapus ' + title)
            $('#btnSubmit').text('Hapus');
            $('#action').val('hapus')
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#form-data').hide();
            $('#id').val(dt_get.data.id_user)
            $('#tambahForm .card-body').prepend('<p id="hapus-notif">Apakah Anda yakin ingin menghapus : <strong>' + dt_get.data.id_user + '(' + dt_get.data.username + ')</strong></p>');
            // alert('Button Hapus ' + id)

        }
    }


    //Btn Simpan
    $('#btnSubmit').on('click', function(e) {
        e.preventDefault();
        var datatosend = $('#form-data').serialize();

        $.ajax('<?= base_url() ?>load/data-user/simpanubah.php', {
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

    
</script>