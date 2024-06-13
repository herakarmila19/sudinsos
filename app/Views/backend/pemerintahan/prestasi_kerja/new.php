<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Prestasi Kerja
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<!-- Empty -->
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<!-- Empty -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Prestasi Kerja</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/prestasi-kerja') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan"
                                            class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>"
                                            value="<?= old('keterangan') ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('keterangan') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <select name="tahun"
                                            class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>"
                                            required>
                                            <option value="" selected disabled>Pilih Tahun</option>
                                            <?php
                                                $currentYear = date("Y");
                                                for ($year = $currentYear; $year >= 2000; $year--) {
                                                    echo "<option value=\"$year\">$year</option>";
                                                }
                                            ?>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('tahun') ?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="<?= base_url('admin/prestasi-kerja') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>