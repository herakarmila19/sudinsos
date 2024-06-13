<!-- LINK Header -->
<?= $this->include("backend/layout/header.php") ?>

<!-- LINK Navbar -->
<?= $this->include("backend/layout/navbar.php") ?>

<!-- LINK Sidebar -->
<?= $this->include("backend/layout/sidebar.php") ?>

<!-- SECTION Render Section Content -->
<?= $this->renderSection('content') ?>

<!-- LINK Footer -->
<?= $this->include("backend/layout/footer.php") ?>