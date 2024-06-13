<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Terjadi Kesalahan</title>
    <!-- Stylesheets -->
    <link href="<?= base_url('public/assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/style.css') ?>" rel="stylesheet">
    <!-- Responsive File -->
    <link href="<?= base_url('public/assets/css/responsive.css') ?>" rel="stylesheet">

    <link rel="shortcut icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">

    <!-- Responsive Settings -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="public/assets/js/respond.js"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">
        <!--Error Section-->
        <section class="error-section">
            <div class="auto-container">
                <div class="content">
                    <div class="big-text">
                        <span class="num">404</span>
                        <div class="med-text">Terjadi Kesalahan</div>
                    </div>
                    <h2>Halaman Tidak Ditemukan</h2>
                    <div class="text">Periksa kembali halaman yang ingin dituju</div>
                    <div class="link-box">
                        <a href="<?= base_url('/') ?>" class="theme-btn btn-style-one">
                            <span class="btn-title">Kembali Ke Beranda</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--End pagewrapper-->

    <script src="<?= base_url('public/assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery-ui.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery.fancybox.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/scrollbar.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/appear.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/wow.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/custom-script.js') ?>"></script>

</body>

</html>