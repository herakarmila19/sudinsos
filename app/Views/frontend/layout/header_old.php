<!DOCTYPE html>
<html lang="en">

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

    <!-- Icon Flag -->
    <link rel="shortcut icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">

    <!-- Responsive Settings -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
                            <div class="logo">
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
                                        <li class="<?= $uri->getSegment(1) == '' ? 'current' : '' ?>"><a href="<?= base_url("/") ?>">Beranda</a></li>
                                        <li class="dropdown <?= $uri->getSegment(1) == 'pemerintahan' ? 'current' : '' ?>"><a>Pemerintahan</a>
                                            <ul>
                                                <li><a href="<?= base_url('pemerintahan/profil') ?>">Profil</a></li>
                                                <li><a href="<?= base_url('pemerintahan/pejabat/kota-administrasi-jakarta-selatan') ?>">Pejabat</a></li>
                                                <li><a href="<?= base_url('pemerintahan/wilayah/kota-administrasi-jakarta-selatan') ?>">Wilayah</a></li>
                                                <li><a href="<?= base_url('pemerintahan/bank-data') ?>">Bank Data</a></li>
                                                <li><a href="<?= base_url('pemerintahan/agenda') ?>">Agenda</a></li>
                                                <li><a href="<?= base_url('pemerintahan/regulasi') ?>">Regulasi</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown <?= $uri->getSegment(1) == 'berita-selatan' ? 'current' : '' ?>"><a href="#">Berita Selatan</a>
                                            <ul>
                                                <li><a href="<?= base_url('berita-selatan') ?>">Semua Berita</a></li>
                                                <li class="dropdown"><a href="#">Kategori</a>
                                                    <ul>
                                                        <li><a href="<?= base_url('berita-selatan/kategori/kesejahteraan-rakyat') ?>">Kesejahteraan Rakyat</a></li>
                                                        <li><a href="<?= base_url('berita-selatan/kategori/pemerintahan') ?>">Pemerintahan</a></li>
                                                        <li><a href="<?= base_url('berita-selatan/kategori/perekonomian-dan-pembangunan') ?>">Perekonomian dan Pembangunan</a></li>
                                                        <li><a href="<?= base_url('berita-selatan/kategori/sosial-budaya') ?>">Sosial Budaya</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"><a href="#">Galeri</a>
                                                    <ul>
                                                        <li><a href="<?= base_url('berita-selatan/galeri/foto') ?>">Foto</a></li>
                                                        <li><a href="<?= base_url('berita-selatan/galeri/video') ?>">Video</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="dropdown <?= $uri->getSegment(1) == 'ppid' ? 'current' : '' ?>"><a href="#">PPID Jak-Sel</a>
                                            <ul>

                                                <li><a href="<?= base_url('ppid/profil') ?>">Profil</a></li>
                                                <li><a href="<?= base_url('ppid/alur-mekanisme') ?>">Alur Mekanisme</a></li>
                                                <li><a href="http://ppid.jakarta.go.id/daftar-informasi-publik?skpd=walikota-kota-administrasi-jakarta-selatan" target="_blank">Daftar Informasi Publik</a></li>
                                                <li><a href="https://corona.jakarta.go.id/id/peta-persebaran" target="_blank">Data Corona</a></li>
                                                <li><a href="https://ppid.jakarta.go.id/" target="_blank">PPID Provinsi DKI Jakarta</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?= $uri->getSegment(1) == 'informasi-publik' ? 'current' : '' ?>"><a href="<?= base_url('informasi-publik') ?>">Informasi Publik</a></li>

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
                                    <li><a href="https://twitter.com/kotajaksel" target="_blank" class="has-tooltip"><span class="fab fa-twitter"></span>
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
                            <li><a href="https://twitter.com/kotajaksel" target="_blank" class="has-tooltip"><span class="fab fa-twitter"></span>
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