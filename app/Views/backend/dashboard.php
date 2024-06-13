<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<!-- Kosong -->
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<!-- Kosong -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Manajemen</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Pengunjung</span>
                                            <span class="info-box-number"><?= number_format($totalPengunjung->jumlah) ?></span>
                                        </div>
                                    </div>
                                </div>                                

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-primary"><i class="far fa-folder-open"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Menu</span>
                                            <span class="info-box-number"><?= number_format($totalMenu) ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i class="far fa-newspaper"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Berita</span>
                                            <span class="info-box-number"><?= number_format($totalBerita) ?></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>