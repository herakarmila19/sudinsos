<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Data Agenda
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
                    <h1>Tambah Data Agenda</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/agenda') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Acara</label>
                                        <input type="text" name="nama_acara" class="form-control <?= ($validation->hasError('nama_acara')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_acara') ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('nama_acara') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Acara</label>
                                        <input type="date" name="tanggal_acara" class="form-control <?= ($validation->hasError('tanggal_acara')) ? 'is-invalid' : ''; ?>" value="<?= old('tanggal_acara') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('tanggal_acara') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Jam</label>
                                        <select name="jam_acara" class="form-control <?= ($validation->hasError('jam_acara')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="0" selected>0</option>
                                            <?php for ($i = 1; $i <= 23; $i++) : ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('jam_acara') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Menit</label>
                                        <select name="menit_acara" class="form-control <?= ($validation->hasError('menit_acara')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="0" selected>0</option>
                                            <?php for ($i = 1; $i <= 59; $i++) : ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('menit_acara') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea rows="2" name="deskripsi_acara" class="form-control <?= ($validation->hasError('deskripsi_acara')) ? 'is-invalid' : ''; ?>" required><?= old('deskripsi_acara') ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('deskripsi_acara') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pejabat</label>
                                        <input type="text" name="pejabat" class="form-control <?= ($validation->hasError('pejabat')) ? 'is-invalid' : ''; ?>" value="<?= old('pejabat') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('pejabat') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" value="<?= old('lokasi') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('lokasi') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="id_kategori_agenda" class="form-control <?= ($validation->hasError('id_kategori_agenda')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            <?php foreach ($kategoriData as $data) : ?>
                                                <option value="<?= $data->id ?>"><?= $data->nama_media ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('id_kategori_agenda') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="publish" class="form-control <?= ($validation->hasError('publish')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="" selected disabled>Pilih Status</option>
                                            <option value="0">Draft</option>
                                            <option value="1">Publish</option>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('publish') ?>
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
                    <a href="<?= base_url('admin/agenda') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>