<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <?= $_SESSION['nama'] ?> <i class="fas fa-angle-down ml-2"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <?php if (session()->get('hak_akses') == 'Admin') : ?>
                    <a href="<?= base_url('admin/logout') ?>" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                <?php else : ?>
                    <a href="<?= base_url('kecamatan/logout') ?>" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                <?php endif; ?>
            </div>
        </li>
    </ul>
</nav>