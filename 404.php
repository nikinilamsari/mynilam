<div class="content-wrapper" style="min-height: 1604.8px;">
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
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Maaf, Halaman yang anda cari tidak ada.</h3>

                <p>
                    Kita tidak dapat menemukan halaman yang anda cari.
                    Mungkin, kamu ingin <a href="../../index.html">kembali ke dashboard</a>
                </p>

                <form class="search-form">
                    <div class="input-group">
                        <input type="text" id="shlm" name="halaman" class="form-control" autocomplete="off" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" id='btnSubmit' class="btn btn-warning"><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
<script>
    $('#btnSubmit').click(function(e) {
        e.preventDefault();
        var isihal = $('#shlm').val()
        window.location.href = "<?= base_url() ?>?halaman=" + isihal;
    })
</script>