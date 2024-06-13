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
                                        <li class="dropdown <?= $uri->getSegment(1) == 'pemerintahan' ? 'current' : '' ?>">
                                            <a id="pemerintahan">Profil</a>
                                            <ul>
                                                <li><a href="<?= base_url('pemerintahan/profil') ?>" id="profil">Profil</a></li>
                                                <li><a href="<?= base_url('pemerintahan/perangkat-kelurahan') ?>" id="perangkat-kelurahan">Perangkat Kelurahan</a></li>
                                                <li><a href="<?= base_url('pemerintahan/layanan') ?>" id="layanan">Layanan</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown <?= $uri->getSegment(1) == 'berita-selatan' ? 'current' : '' ?>">
                                            <a href="#" id="berita_selatan">Berita</a>
                                            <ul>
                                                <li><a href="<?= base_url('berita-selatan') ?>" id="semua_berita">Semua
                                                        Berita</a></li>
                                                <li class="dropdown"><a href="#" id="kategori">Kategori</a>
                                                    <ul>
                                                        <li><a href="<?= base_url('berita-selatan/kategori/kesejahteraan-rakyat') ?>" id="kesejahteraan_rakyat">Kesejahteraan Rakyat</a></li>
                                                        <li><a href="<?= base_url('berita-selatan/kategori/pemerintahan') ?>" id="pemerintahan2">Pemerintahan</a></li>
                                                        <li><a href="<?= base_url('berita-selatan/kategori/perekonomian-dan-pembangunan') ?>" id="perekonomian_pembangunan">Perekonomian dan
                                                                Pembangunan</a></li>
                                                        <li><a href="<?= base_url('berita-selatan/kategori/sosial-budaya') ?>" id="sosial_budaya">Sosial Budaya</a></li>
                                                    </ul>
                                                </li>
                                                <!-- <li class="dropdown"><a href="#" id="galeri">Galeri</a>
                                                    <ul>
                                                        <li><a href="<?= base_url('berita-selatan/galeri/foto') ?>" id="foto">Foto</a></li>
                                                        <li><a href="<?= base_url('berita-selatan/galeri/video') ?>" id="video">Video</a></li>
                                                    </ul>
                                                </li> -->
                                            </ul>
                                        </li>

                                        <!-- <li class="dropdown <?= $uri->getSegment(1) == 'ppid' ? 'current' : '' ?>"><a href="#" id="ppid_jaksel">PPID Jak-Sel</a>
                                            <ul>

                                                <li><a href="<?= base_url('ppid/profil') ?>" id="ppid_jaksel_profil">Profil</a></li>
                                                <li><a href="<?= base_url('ppid/alur-mekanisme') ?>" id="alur_mekanisme">Alur Mekanisme</a></li>
                                                <li><a href="http://ppid.jakarta.go.id/daftar-informasi-publik?skpd=walikota-kota-administrasi-jakarta-selatan" target="_blank" id="daftar_informasi_publik">Daftar Informasi Publik</a></li>
                                                <li><a href="https://corona.jakarta.go.id/id/peta-persebaran" target="_blank" id="data_corona">Data Corona</a></li>
                                                <li><a href="https://ppid.jakarta.go.id/" target="_blank" id="ppid_prov_dki">PPID Provinsi DKI Jakarta</a></li>
                                            </ul>
                                        </li> -->

                                        <li class="<?= $uri->getSegment(1) == 'ppid-kelurahan' ? 'current' : '' ?>"><a href="<?= base_url('ppid-kelurahan') ?>" id="ppid_kelurahan">Maklumat Layanan</a></li>

                                        <!-- <li class="<?= $uri->getSegment(1) == 'informasi-publik' ? 'current' : '' ?>"><a href="<?= base_url('informasi-publik') ?>" id="informasi_publik">Informasi Publik</a></li> -->

                                        <!-- NOTE Hold -->
                                        <!-- <li class="dropdown"><a href="#">Informasi</a>
                                                    <ul>
                                                        <li><a href="http://ppid.jakarta.go.id/daftar-informasi-publik?skpd=walikota-kota-administrasi-jakarta-selatan" target="_blank">Daftar Informasi Publik</a></li>
                                                        <li><a href="https://corona.jakarta.go.id/id/peta-persebaran" target="_blank">Data Corona</a></li>
                                                        <li><a href="https://ppid.jakarta.go.id/" target="_blank">PPID Provinsi DKI Jakarta</a></li>
                                                    </ul>
                                                </li> -->
                                        <!-- <li class="dropdown"><a href="#">Relasi</a>
                                                    <ul>
                                                        <li><a href="https://sudinhubjaksel.com/" target="_blank">Perhubungan Jakarta Selatan</a></li>
                                                        <li><a href="https://ppid.jakarta.go.id/" target="_blank">PPID Jakarta</a></li>
                                                        <li><a href="https://data.jakarta.go.id/" target="_blank">Open Data</a></li>
                                                        <li><a href="https://bpbd.jakarta.go.id/" target="_blank">Badan Penanggulangan Bencana Daerah</a></li>
                                                        <li><a href="https://bptsp.jakarta.go.id/" target="_blank">Badan Pelayanan Terpadu Satu Pintu</a></li>
                                                        <li><a href="https://bkddki.jakarta.go.id/" target="_blank">Badan Kepegawaian Daerah</a></li>
                                                    </ul>
                                                </li> -->

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