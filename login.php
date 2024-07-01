<?php
session_start();
error_reporting(0); //error reporting disabled
session_destroy();
include 'config/conf.php';
include 'config/base.php';
include 'config/function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/pewe/css/adminlte.min.css">
    <style>
        .card {
            box-shadow: 1px 1px 15px 9px rgb(0 0 0 / 13%), 8px -6px 15px 3px rgb(0 0 0 / 20%) !important;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-warning">
            <div class="card-header text-center">
                <img width="70px" src="<?= base_url() ?>/assets/img/logo/umk.png" alt="">
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button name="btnLogin" type="submit" class="btn btn-default btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <?php
    include "config/conf.php";
    if (isset($_POST['btnLogin'])) {
        $sql_login = "SELECT * FROM tb_user WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] . "'";
        $query_login = mysqli_query($conn, $sql_login);
        $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
        $jumlah_login = mysqli_num_rows($query_login);

        if ($jumlah_login >= 1) {
            session_start();
            $_SESSION["ses_username"]   = $data_login["username"];
            $_SESSION["ses_nama"]       = $data_login["nama"];
            $_SESSION["ses_role"]        = $data_login["role"];

            echo "<script>alert('Login Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        } else {
            echo "<script>alert('Login Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        }
    }
    ?>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/pewe/js/adminlte.min.js"></script>
</body>

</html>