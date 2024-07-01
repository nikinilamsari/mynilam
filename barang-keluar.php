<style>
    .callout {
        border-radius: .25rem;
        box-shadow: 6px 7px 7px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 50%);
        background-color: #fff;
        border-left: 5px solid #e9ecef;
        margin-bottom: 1rem;
        padding: 1rem;
    }
</style>
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
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-warning" onclick="show('tambah',null);"><i class="fa fa-plus"></i> Tambah</button>

                    </div>
                    <div class="col-lg-6">
                        <button class="btn bg bg-purple float-right" style="margin-left:5px" onclick="show('uprint2',null)"><i class="fas fa-print"></i> Cetak Detail</button>
                        <button class="btn btn-default float-right" onclick="show('uprint',null);"><i class="fa fa-print"></i> Cetak</button>
                    </div>
                </div>
                <br>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 40px;">No</th>
                            <th style="width: 120px;">Aksi</th>
                            <th>Kode Barang Keluar</th>
                            <th>Tanggal Keluar</th>

                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $sql = "SELECT * FROM tb_barangkeluar";
                        foreach (cari_array($conn, $sql) as $key) :
                            $no++;
                        ?>
                            <tr>
                                <td align="center"><?= $no; ?></td>
                                <td align="center"> <button class="btn btn-primary btn-sm" onclick="show('detail',<?= $key['id_barangkeluar'] ?>)"><i class="fas fa-eye"></i></button> <button class="btn btn-danger btn-sm" onclick="show('hapus',<?= $key['id_barangkeluar'] ?>)"><i class="fas fa-trash-alt"></i></button></td>
                                <td><?= $key['kode_barangkeluar'] ?></td>
                                <td><?= $key['tgl_barangkeluar'] ?></td>
                                <td><?= $key['keterangan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card -->
        <div class="card col-6" id="tambahForm" style="display: none;">
            <div class="card-header">
                <h5 class="card-titleT"></h5>
            </div>
            <div class="card-body">
                <div class="bs-stepper" id="stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <!-- your steps here -->
                        <div class="step" data-target="#logins-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Data Keluar</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#information-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Masukkan List Barang</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <!-- your steps content here -->
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                            <form role="form" method="post" id="form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="hidden" name="id" id="id" value="">
                                        <input type="hidden" name="action" id="action" value="">
                                        <div class="form-group">
                                            <label>Kode Barang Keluar</label>
                                            <input type="text" name="kdbrgkel" id="kdbrgkel" class="form-control" placeholder="Masukkan Kode Barang Keluar">
                                            <span class="help-block" id="help_kdbrgkel"></span>
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" style="resize:none" name="ket" id="ket" cols="30" rows="5"></textarea>
                                            <span class="help-block" id="help_ket"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal:</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="tgl" id="tgl" class="form-control datetimepicker-input" data-target="#reservationdate">
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </form>
                            <button id="btnBack" class="btn btn-default">Kembali</button>
                            <button class="btn btn-warning float-right" onclick="check()">Next</button>
                        </div>
                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                            <a class="btn btn-success pull-left" id='BarisBaru' onclick="BarisBaru()"><i class="fa fa-plus"></i>
                                Tambah Baris</a>

                            <form role="form" method="post" id="form-datas">
                                <table class="table table-hover table-bordered table-striped mt-3" id='TabelTransaksi'>
                                    <thead>
                                        <tr>
                                            <th width="30px">#</th>
                                            <th>Nama Barang</th>
                                            <th width="70px">Jumlah</th>

                                            <th width="30px">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </form>
                            <button class="btn btn-primary" onclick="kembali()">Previous</button>
                            <button id="btnSubmit" class="btn btn-warning float-right">Submit</button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-default y" id="btnBack2">Kembali</button> <button class="btn btn-warning float-right y" id="btnHps">Hapus</button>
            </div>


        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="callout callout-success bg bg-green col-lg-5">
                        <span><b>Kode</b> : <span id="kdd"></span></span>
                        <br>
                        <span><b>Tanggal</b> : <span id="tgg"></span></span>


                    </div>
                    <!-- <div class="col-lg-7">
                            <button class="btn btn-default float-right"><i class="fas fa-print"></i> Print Detail</button>
                        </div> -->
                </div>
                <table class='table table-hover table-bordered table-striped mt-3' id="rinci">
                    <thead>
                        <tr>
                            <th style="width: 40px;">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    <tbody>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
    var title = 'Data Barang Keluar'
    $('title').html(title)
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    // $('#btnTmb').click(function(e) {})
    $('#btnBack').click(function(e) {
        e.preventDefault()
        $('#tambahForm').hide()
        $('#tampil').show()
        $('#id').val('')
        $('#kdbrg').val('')
        $('#form-data').show();
        $('#ket').val('')
        $('#hapus-notif').remove();
        $('#form-data').show();
        $('#stepper').show()
        $('#btnSubmit').text('Simpan');
        $('.y').hide();
    })
    $('#btnBack2').click(function(e) {
        e.preventDefault()
        $('#tambahForm').hide()
        $('#form-data').show();
        $('#tampil').show()
        $('#id').val('')
        $('#stepper').show()
        $('#kdbrg').val('')
        $('#ket').val('')
        $('#hapus-notif').remove();
        $('#form-data').show();
        $('#btnSubmit').text('Simpan');
        $('.y').hide();
    })

    function show(act, id) {
        if (act == 'tambah') {
            // e.preventDefault()
            $('#stepper').show()
            $('.card-titleT').html('Tambah ' + title)
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#form-data').show();
            $('#id').val('')
            $('#kdbrg').val('')
            $('#ket').val('')
            $('#action').val('tambah')
            $('#btnSubmit').text('Simpan');
            $('.y').hide();
        } else if (act == 'edit') {
            var dt_get = getJSON('<?= base_url() ?>load/barang/getbarang.php', {
                id: id
            });
            $('.card-titleT').html('Edit ' + title)
            $('#tambahForm').show()
            $('#form-data').show();
            $('#stepper').show()
            $('#tampil').hide()
            $('#action').val('edit')

            $('#btnSubmit').text('Edit');
            $('#id').val(dt_get.data.id_barang)
            $('#kdbrg').val(dt_get.data.kode_barang)
            $('#ket').val(dt_get.data.keterangan)
            HitungNominal()
            // alert('Button Edit ' + id)
            $('.y').hide();
        } else if (act == 'hapus') {
            var dt_get = getJSON('<?= base_url() ?>load/barang-keluar/getbarangkeluar.php', {
                id: id
            });
            // console.log(dt_get);
            // return;
            $('.card-titleT').html('Hapus ' + title)
            $('#btnSubmit').text('Hapus');
            $('#action').val('hapus')
            $('#tambahForm').show()
            $('#tampil').hide()
            $('#stepper').hide()
            $('#form-data').hide();
            $('#id').val(dt_get.data.id_barangkeluar)
            $('#tambahForm .card-body').prepend('<p id="hapus-notif">Apakah Anda yakin ingin menghapus : <strong>' + dt_get.data.kode_barangkeluar + '</strong></p>');
            $('.y').show();

            // alert('Button Hapus ' + id)

        } else if (act == 'detail') {
            var dt_get = getJSON('<?= base_url() ?>load/barang-keluar/detail.php', {
                id: id
            });

            $('#modal').modal('show')
            $('#modal .modal-header .modal-title').text('Detail ' + title);
            $('#modal .modal-dialog').addClass('modal-lg');
            var detail = ""
            $.each(dt_get.data, function(index, isi) {
                $('#modal #kdd').html(isi.kode_barang)
                $('#modal #tgg').html(isi.tgl_barangkeluar)

                detail += "<tr>"
                detail += "<td>" + (index + 1) + "</td>"
                detail += "<td>" + isi.kode_barang + "</td>"
                detail += "<td>" + isi.nama_barang + "</td>"
                detail += "<td>" + isi.jumlah_keluar + "</td>"
                detail += "</tr>"
                // console.log(indexInArray);
            });

            $('#modal #rinci tbody').html(detail);
        } else if (act == 'uprint') {
            $('#modalp .modal-header .modal-title').text('Cetak Laporan Barang Masuk');
            $('#modalp .modal-dialog').addClass('modal-lg');

            $('#modalp .modal-body').html(
                '<embed src="<?php echo base_url(); ?>cetak/pdf-barang-keluar.php" width="100%" height="500" type="application/pdf">');
            $('#modalp').modal('show');

        } else if (act == 'uprint2') {
            $('#modalp .modal-header .modal-title').text('Cetak Laporan Barang Masuk');
            $('#modalp .modal-dialog').addClass('modal-lg');

            $('#modalp .modal-body').html(
                '<embed src="<?php echo base_url(); ?>cetak/pdf-barang-keluar-det.php" width="100%" height="500" type="application/pdf">');
            $('#modalp').modal('show');
        }
    }


    //Btn Simpan
    $('#btnSubmit').on('click', function(e) {
        e.preventDefault();
        var datatosend = $('#form-data').serialize() + '&' + $('#form-datas').serialize();

        // console.log(datatosend);
        // return;

        $.ajax('<?= base_url() ?>load/barang-keluar/simpanubah.php', {
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

    //Btn Simpan
    $('#btnHps').on('click', function(e) {
        e.preventDefault();
        var datatosend = $('#form-data').serialize() + '&' + $('#form-datas').serialize();

        // console.log(datatosend);
        // return;

        $.ajax('<?= base_url() ?>load/barang-keluar/simpanubah.php', {
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





    function BarisBaru() {
        $('.barangs').empty()
        var dt_getbrg = getJSON('<?= base_url() ?>load/barang-keluar/getallbrg.php', {});


        var Nomor = $('#TabelTransaksi tbody tr').length + 1;
        var Baris = "<tr>";
        Baris += "<td>" + Nomor + "</td>";
        Baris += "<td><select name='barang[]' class='form-control select2 barangs' style='width: 100%;'>"
        "</select></div></td>";

        Baris += "<td><input type='text' class='form-control eachjml' name='jml[]' onkeypress='return check_int(event)' ><input type='hidden' class='form-control keterangann' name='keterangann[]'></td>";

        // Baris += "<td></td>";
        Baris += "<td><a class='btn btn-default hapus-baris'><i class='fa fa-times' style='color:red;'></i></a></td>";
        Baris += "</tr>";

        $('#TabelTransaksi tbody').append(Baris);


        $.each(dt_getbrg.data, function(indexInArray, valueOfElement) {
            $('.barangs').append(new Option(valueOfElement.kode_barang + ' - ' + valueOfElement.nama_barang, valueOfElement.id_barang))
        });


    }
    $(document).on('click', '.hapus-baris', function(e) {
        e.preventDefault();
        $(this).parent().parent().remove()

        var Nomor = 1;
        $('#TabelTransaksi tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html(Nomor);
            Nomor++;
        });

    });

    function check() {
        var kdkeluar = $('#kdbrgkel').val()
        var tgl = $('#tgl').val()
        var ket = $('#ket').val()


        if (kdkeluar.length != 0 &&
            tgl.length != 0) {
            stepper.next()
        } else {
            showNotif('Mohon isi data terlebih dahulu.', 'warning', false);
        }

    }

    function kembali() {
        $('#form-datas .hapus-baris').parent().parent().remove();
        $('#form-datas .barangs').empty()
        stepper.previous()
    }
</script>