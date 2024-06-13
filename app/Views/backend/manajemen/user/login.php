<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Halaman Administrator - Situs Web Resmi Pemerintah Kota Administrasi Jakarta Selatan</title>

    <link rel="shortcut icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/adminlte/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Halaman Administrator</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Situs Web Resmi Pemerintah Kota Administrasi Jakarta Selatan</p>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-danger alert-dismissible mb-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fas fa-exclamation-triangle"></i><?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-at"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <?php $captcha = rand(pow(10, 6 - 1), pow(10, 6) - 1); ?>
                        <input type="text" name="captcha_code" class="form-control" value="<?= $captcha ?>" hidden>
                        <input type="text" class="form-control" value="<?= $captcha ?>" disabled>
                        <input type="text" name="captcha_confirm" class="form-control" placeholder="Captcha" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-barcode"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <a href="<?= base_url('') ?>" class="btn btn-danger btn-block">
                                Kembali
                            </a>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-0 mt-3" style="text-align: center;">
                    Hak Cipta &copy;
                    <?= date('Y') ?> -
                    <a href="https://adminlte.io">AdminLTE.io</a> -
                    <a href="https://selatan.jakarta.go.id" target="_blank">Sudin Kominfotik Jakarta Selatan</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('public/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('public/adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>