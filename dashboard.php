<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?= base_url() ?>assets/img/logo/umk.png" alt="AdminLTELogo" height="160" width="160">
    <!-- <img class="animation__wobble" src="<?= base_url() ?>assets/img/gambar/mangats.png" alt="AdminLTELogo" height="160" width="160"> -->
    <br>
    <span> Mohon tunggu sebentar..</span>
</div>

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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hai, <?= $data_nama ?> </h3>

                <!-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div> -->
            </div>
            <div class="card-body">
                Selamat datang di Sistem Informasi pendataan barang
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
    var title = 'Dashboard'
    $('title').html(title)
</script>