<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('') ?>" class="brand-link">
        <img src="<?= base_url('public/assets/images/logo/jakarta-selatan.png') ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            Portal Jaksel
        </span>
    </a>

    <div class="sidebar">
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
                    <a href="<?= base_url('admin/menu') ?>" class="nav-link <?= $uri->getSegment(2) == 'menu' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Menu
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

            </ul>
        </nav>        
    </div>
</aside>