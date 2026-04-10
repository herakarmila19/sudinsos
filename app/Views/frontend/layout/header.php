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
        /* Kustomisasi Warna Header & Footer */
        .main-header .header-upper {
            background-color: #FEBA01 !important;
        }

        .main-footer-two, 
        .main-footer-two .footer-bottom {
            background-color: #E04F5E !important;
        }

        /* Kontras Header */
        .main-menu .navigation > li > a {
            color: #FFFFFF !important; /* Ubah ke putih */
            font-weight: 700 !important;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5); /* Tambahkan shadow agar terbaca di kuning */
        }

        .main-menu .navigation > li:hover > a,
        .main-menu .navigation > li.current > a,
        .sticky-header .main-menu .navigation > li:hover > a,
        .sticky-header .main-menu .navigation > li.current > a {
            color: #003366 !important; /* Berubah jadi gelap saat hover agar kontras */
            text-shadow: none;
        }

        /* Memastikan panah dropdown ikut berubah warna */
        .main-menu .navigation > li.dropdown:hover > a:before,
        .main-menu .navigation > li.dropdown.current > a:before {
            color: #003366 !important;
        }

        .main-menu .navigation > li.dropdown > a:before {
            color: #FFFFFF !important;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        /* Kontras Footer */
        .main-footer-two .footer-widget h4,
        .main-footer-two .widget-content,
        .main-footer-two .widget-content a,
        .main-footer-two .num-links li,
        .main-footer-two .copyright,
        .main-footer-two .footer-bottom .inner .copyright a, 
        .main-footer-two .upper-logo-box .logo a span {
            color: #FFFFFF !important;
            opacity: 1 !important;
        }

        /* Kustomisasi Mobile Menu Navbar */
        .mobile-menu .navigation li > a {
            color: #FFFFFF !important; /* Putih agar kontras di background gelap */
            font-weight: 500 !important;
        }

        .mobile-menu .navigation li.current > a,
        .mobile-menu .navigation li > a:hover {
            color: #FEBA01 !important;
        }

        /* Responsive Header 1 Baris */
        @media only screen and (max-width: 767px) {
            .header-upper .inner-container {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                padding: 10px 15px !important;
            }

            .logo-box {
                flex: 1 !important;
                padding: 0 !important;
                margin: 0 !important;
                float: none !important;
            }

            .logo-box .logo img {
                max-height: 40px !important; /* Perkecil sedikit agar muat */
                margin-right: 8px !important;
            }

            .nav-outer {
                float: none !important;
                margin: 0 !important;
                padding: 0 !important;
                display: flex !important;
                align-items: center !important;
            }

            .mobile-nav-toggler {
                margin: 0 !important;
                padding: 5px !important;
            }

            .other-links {
                display: none !important; /* Sembunyikan tombol kontak di row utama mobile agar tidak penuh */
            }

            .search-btn {
                display: none !important;
            }
        }

        /* Kustomisasi Button Kontak */
        .btn-kontak {
            background-color: #0052B5 !important;
            color: #ffffff !important;
            border-radius: 6px !important;
            padding: 8px 24px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            display: inline-block;
        }
        .btn-kontak:hover {
            background-color: #FEB605 !important;
            color: #ffffff !important;
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
                            <div class="logo d-flex align-items-center" id="logo_webadmin_jaksel">
                                <img src="<?= base_url('public/assets/images/logo/jaksel-putih.png') ?>" alt="Logo Jakarta Selatan" style="max-height: 50px; margin-right: 15px;">
                                <img src="<?= base_url('upload/seeder/logo-diskominfotik.png') ?>" alt="Logo Diskominfotik" style="max-height: 50px;">
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
                                        <li class="dropdown <?= $uri->getSegment(1) == 'profil' ? 'current' : '' ?>"><a href="<?= base_url("profil") ?>" id="profil">Profil</a>
                                            <ul>
                                                <li><a href="<?= base_url("profil/struktur-organisasi") ?>">Struktur Organisasi</a></li>
                                                <li><a href="<?= base_url("profil/tugas-fungsi") ?>">Tugas dan Fungsi</a></li>
                                                <li><a href="<?= base_url("profil/kinerja") ?>">Kinerja</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown <?= $uri->getSegment(1) == 'seksi' ? 'current' : '' ?>"><a href="<?= base_url("seksi") ?>" id="seksi">Seksi</a>
                                            <ul>
                                                <li><a href="<?= base_url("seksi/tata-usaha") ?>">Tata Usaha</a></li>
                                                <li><a href="<?= base_url("seksi/komunikasi-informasi-publik") ?>">Komunikasi dan Informasi Publik</a></li>
                                                <li><a href="<?= base_url("seksi/aplikasi-siber-statistik") ?>">Aplikasi, Siber dan Statistik</a></li>
                                                <li><a href="<?= base_url("seksi/infrastruktur-digital") ?>">Infrastruktur Digital</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="https://selatan.jakarta.go.id/ekinerja-pjlp" target="_blank" id="pjlp">PJLP</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Contact Button -->
                        <div class="other-links clearfix d-flex align-items-center" style="margin-right: 20px; height: 100px;">
                            <div class="link-box">
                                <a href="https://wa.me/6285811502279" target="_blank" class="theme-btn btn-kontak"><span class="txt">Kontak</span></a>
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
                    <div class="nav-logo d-flex align-items-center">
                        <a href="<?= base_url('/') ?>"><img src="<?= base_url('public/assets/images/logo/jaksel-putih.png') ?>" alt="Logo Jakarta Selatan" style="max-height: 50px; margin-right: 10px;"></a>
                        <a href="<?= base_url('/') ?>"><img src="<?= base_url('upload/seeder/logo-diskominfotik.png') ?>" alt="Logo Diskominfotik" style="max-height: 50px;"></a>
                    </div>
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