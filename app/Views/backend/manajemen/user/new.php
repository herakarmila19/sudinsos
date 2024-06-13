<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Data User
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
                    <h1>Tambah Data User</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/user') ?>" method="post" enctype="multipart/form-data">
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
                                        <label>Hak Akses</label>
                                        <select name="hak_akses" class="form-control">
                                            <option value="" selected disabled>Pilih Hak Akses</option>
                                            <!-- <option value="User">User</option> -->
                                            <option value="Admin">Admin</option>
                                            <!-- <option value="Kecamatan">Kecamatan</option> -->
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('hak_akses') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('email') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('username') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" value="<?= old('password') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('password') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Confirm</label>
                                        <input type="password" name="password_confirm" class="form-control <?= ($validation->hasError('password_confirm')) ? 'is-invalid' : ''; ?>" value="<?= old('password_confirm') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('password_confirm') ?>
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
                    <a href="<?= base_url('admin/user') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>