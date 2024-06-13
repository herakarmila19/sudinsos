<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('') ?>" class="brand-link">
        <img src="<?= base_url('public/assets/images/logo/jakarta-selatan.png') ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            Portal Jaksel
        </span>
    </a>

    <div class="sidebar">

        <?php if ($_SESSION['hak_akses'] == 'Admin') : ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <?php $uri = service('uri'); ?>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $uri->getSegment(2) == 'dashboard' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/slide') ?>" class="nav-link <?= $uri->getSegment(2) == 'slide' ? 'active' : '' ?>">
                            <i class="nav-icon fab fa-slideshare"></i>
                            <p>
                                Slide
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/visi-misi') ?>" class="nav-link <?= $uri->getSegment(2) == 'visi-misi' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                                Visi & Misi
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">MANAJEMEN</li>

                    <?php if ($_SESSION['username'] == 'erlan') : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/user') ?>" class="nav-link <?= $uri->getSegment(2) == 'user' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/menu') ?>" class="nav-link <?= $uri->getSegment(2) == 'menu' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Menu
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">PEMERINTAHAN</li>

                    <!-- <li class="nav-item">
                        <a href="< ?= base_url('admin/pejabat') ?>" class="nav-link < ?= $uri->getSegment(2) == 'pejabat' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-city"></i>
                            <p>
                                Pejabat
                            </p>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a href="<?= base_url('admin/prestasi-kerja') ?>" class="nav-link <?= $uri->getSegment(2) == 'prestasi-kerja' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-trophy"></i>
                            <p>
                                Prestasi Kerja
                            </p>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="< ?= base_url('admin/bank-data') ?>" class="nav-link < ?= $uri->getSegment(2) == 'bank-data' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Bank Data
                            </p>
                        </a>
                    </li> -->

                    <li class="nav-header">HUMAS</li>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/banner') ?>" class="nav-link <?= $uri->getSegment(2) == 'banner' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Banner
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/berita') ?>" class="nav-link <?= $uri->getSegment(2) == 'berita' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Berita
                            </p>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="< ?= base_url('admin/agenda') ?>" class="nav-link < ?= $uri->getSegment(2) == 'agenda' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Agenda
                            </p>
                        </a>
                    </li> -->

                    <li class="nav-header">MEDIA</li>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/file') ?>" class="nav-link <?= $uri->getSegment(2) == 'file' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                File
                            </p>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="< ?= base_url('admin/album') ?>" class="nav-link < ?= $uri->getSegment(2) == 'album' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                Foto Album
                            </p>
                        </a>
                    </li> -->

                    <!-- <li class="nav-item">
                        <a href="< ?= base_url('admin/video') ?>" class="nav-link < ?= $uri->getSegment(2) == 'video' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-video"></i>
                            <p>
                                Video
                            </p>
                        </a>
                    </li> -->

                    <!-- <li class="nav-item">
                        <a href="< ?= base_url('admin/regulasi') ?>" class="nav-link < ?= $uri->getSegment(2) == 'regulasi' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Regulasi
                            </p>
                        </a>
                    </li> -->

                </ul>
            </nav>
        <?php else : ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <?php $uri = service('uri'); ?>

                    <li class="nav-item">
                        <a href="<?= base_url('kecamatan') ?>" class="nav-link <?= $uri->getSegment(1) == 'kecamatan' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Camat & Lurah
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
        <?php endif; ?>
    </div>
</aside>