<!DOCTYPE html>
<html lang="en" id="effectweb">

<head>
    <meta charset="utf-8">

    <!-- SEO -->
    <?= $this->renderSection('seo') ?>

    <!-- SECTION Render Section Title -->
    <title>
        <?= $this->renderSection('title') ?> - Situs Web Resmi Pemerintah Kota Administrasi Jakarta Selatan
    </title>

    <!-- Stylesheets -->
    <link href="<?= base_url('public/assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/responsive.css') ?>" rel="stylesheet">

    <!-- SECTION Render Section CSS -->
    <?= $this->renderSection('css') ?>

    <!-- Script SpeechVoice -->
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=N0bzbTAK"></script>

    <!-- Icon Flag -->
    <link rel="shortcut icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">

    <!-- Responsive Settings -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <style>
        .img-twitter-x {
            padding: 4px;
            margin: 0 auto;
            background: url("<?php echo base_url('public/assets/images/icons/twitter-x.png'); ?>");
            display: block;
            width: 20px;
            height: 20px;
            position: relative;
            background-size: 15px 15px;
            background-repeat: no-repeat;
            background-position: center;
        }

        .has-tooltip:hover .img-twitter-x {
            padding: 4px;
            margin: 0 auto;
            background: url("<?php echo base_url('public/assets/images/icons/twitter-x-white.png'); ?>");
            display: block;
            width: 20px;
            height: 20px;
            position: relative;
            background-size: 15px 15px;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="icon"></div>
        </div>

        <!-- Main Header -->
        <header class="main-header header-style-one">
            <!-- LINK Navbar Upper -->
            <?php
            $uri = service('uri');
            ?>

            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container clearfix">

                        <!-- Logo Atas Kiri -->
                        <div class="logo-box clearfix">
                            <div class="logo" id="logo_webadmin_jaksel">
                                <img src="<?= base_url('public/assets/images/logo/jaksel-hijau.png') ?>">
                            </div>
                            <div class="search-btn search-btn-one" style="padding-left: 80px;"></div>
                        </div>

                        <!-- Nav -->
                        <div class="nav-outer clearfix">
                            <!-- Mobile Navigation Toggler -->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="<?= $uri->getSegment(1) == '' ? 'current' : '' ?>"><a href="<?= base_url("/") ?>" id="beranda">Beranda</a></li>
                                        <li class="<?= $uri->getSegment(1) == 'profil' ? 'current' : '' ?>"><a href="<?= base_url("profil") ?>" id="profil">Profil Sudinsos</a></li>
                                        <li class="<?= $uri->getSegment(1) == 'pelayanan' ? 'current' : '' ?>"><a href="<?= base_url("pelayanan") ?>" id="pelayanan">Pelayanan</a></li>
                                        <li class="<?= $uri->getSegment(1) == 'berita' ? 'current' : '' ?>"><a href="<?= base_url("berita") ?>" id="berita">Berita</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Social Links -->
                        <div class="other-links clearfix" style="margin-right: 20px;">
                            <div class="social-links-one">
                                <ul class="clearfix">
                                    <li><a href="https://facebook.com/PemkotJakartaSelatan" target="_blank" class="has-tooltip"><span class="fab fa-facebook-f"></span>
                                            <div class="c-tooltip">
                                                <div class="tooltip-inner">Facebook</div>
                                            </div>
                                        </a></li>
                                    <li><a href="https://twitter.com/kotajaksel" target="_blank" class="has-tooltip img-twitter-x"><span class="img-twitter-x"></span>
                                            <div class="c-tooltip">
                                                <div class="tooltip-inner">Twitter</div>
                                            </div>
                                        </a></li>
                                    <li><a href="https://www.youtube.com/KominfotikJaksel" target="_blank" class="has-tooltip"><span class="fab fa-youtube"></span>
                                            <div class="c-tooltip">
                                                <div class="tooltip-inner">Youtube</div>
                                            </div>
                                        </a></li>
                                    <li><a href="https://www.instagram.com/kotajakartaselatan/" target="_blank" class="has-tooltip"><span class="fab fa-instagram"></span>
                                            <div class="c-tooltip">
                                                <div class="tooltip-inner">Instagram</div>
                                            </div>
                                        </a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- LINK Navbar For Mobile -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon flaticon-targeting-cross"></span></div>

                <nav class="menu-box">
                    <div class="nav-logo"><a href="<?= base_url('/') ?>"><img src="<?= base_url('public/assets/images/logo/jaksel-putih.png') ?>"></a></div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                    <!--Social Links-->
                    <div class="social-links">
                        <ul class="clearfix">
                            <li><a href="https://facebook.com/PemkotJakartaSelatan" target="_blank" class="has-tooltip"><span class="fab fa-facebook-f"></span>
                                    <div class="c-tooltip">
                                        <div class="tooltip-inner">Facebook</div>
                                    </div>
                                </a></li>
                            <li><a href="https://twitter.com/kotajaksel" target="_blank" class="has-tooltip">
                                    <!-- <span class="fab fa-twitter"></span> -->
                                    <img src="<?= base_url('public/assets/images/icons/twitter-x-white.png') ?>" width="15" height="15" alt="twitter-x-mobile" style="margin-top: -3px;">
                                    <div class="c-tooltip">
                                        <div class="tooltip-inner">Twitter</div>
                                    </div>
                                </a></li>
                            <li><a href="https://www.youtube.com/KominfotikJaksel" target="_blank" class="has-tooltip"><span class="fab fa-youtube"></span>
                                    <div class="c-tooltip">
                                        <div class="tooltip-inner">Youtube</div>
                                    </div>
                                </a></li>
                            <li><a href="https://www.instagram.com/kotajakartaselatan/" target="_blank" class="has-tooltip"><span class="fab fa-instagram"></span>
                                    <div class="c-tooltip">
                                        <div class="tooltip-inner">Instagram</div>
                                    </div>
                                </a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- End Main Header -->