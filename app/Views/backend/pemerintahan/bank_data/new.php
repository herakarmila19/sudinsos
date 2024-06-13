<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Bank Data
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
                    <h1>Tambah Bank Data</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/bank-data') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama') ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('nama') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <select name="jenis" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="" selected disabled>Pilih Jenis</option>
                                            <option value="Pasar">Pasar</option>
                                            <option value="Hotel">Hotel</option>
                                            <option value="Data">Data</option>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('jenis') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Wilayah / Keterangan</label>
                                        <input type="text" name="wilayah" class="form-control <?= ($validation->hasError('wilayah')) ? 'is-invalid' : ''; ?>" value="<?= old('wilayah') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('wilayah') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat / Link URL</label>
                                        <textarea name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"><?= old('alamat') ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('alamat') ?>
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
                    <a href="<?= base_url('admin/bank-data') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>