<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Data Album
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<link rel="stylesheet" href="<?= base_url('public/adminlte/plugins/sweetalert2/sweetalert2.min.css') ?>">
<style>
    .no-border {
        border: 0px !important;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script src="<?= base_url('public/adminlte/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        function hapus() {
            $(".delete_foto").on("click", function() {
                $(this).parent(".form-group").parent(".col-md-12").parent(".row").remove();
            });
        }

        var hit = $(".add_album .row").length;
        $(".add_foto").on("click", function() {
            if ($(".add_album .row").length < 4) {
                hit = hit + 1;
                $(".add_album").append('<div class="row"><div class="col-md-12"><div class="form-group"><label>Judul Foto</label><input type="text" name="judul_foto[' + hit +
                    ']" class="form-control <?= ($validation->hasError('judul_foto')) ? 'is-invalid' : ''; ?>" value="<?= old('judul_foto') ?>" required><p class="text-danger"><?= $validation->getError('judul_foto') ?></p></div></div><div class="col-md-12"><div class="form-group"><label>Deskripsi Foto</label><textarea rows="3" type="text" name="deskripsi_foto[' + hit +
                    ']" class="form-control <?= ($validation->hasError('deskripsi_foto')) ? 'is-invalid' : ''; ?>" required><?= old('deskripsi_foto') ?></textarea><p class="text-danger"><?= $validation->getError('deskripsi_foto') ?></p></div></div><div class="col-md-12"><div class="form-group"><label>Upload Gambar</label><input type="file" name="path_foto[' + hit +
                    ']" class="form-control no-border <?= ($validation->hasError('path_foto')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" required><p class="text-danger"><?= $validation->getError('path_foto') ?></p></div></div><div class="col-md-12"><div class="form-group"><div class="btn btn-danger delete_foto">Hapus foto di atas</div></div></div><div class="col-md-12 mb-2"><div class="progress progress-xxs"><div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div></div></div></div></div>');
                hapus();
            } else {
                Swal.fire(
                    'Error',
                    'Maksimal Hanya 5 Foto',
                    'error'
                )
            }
        });

        hapus();
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Album</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/album') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sampul</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Album</label>
                                        <input type="text" name="judul_album" class="form-control <?= ($validation->hasError('judul_album')) ? 'is-invalid' : ''; ?>" value="<?= old('judul_album') ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('judul_album') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Album</label>
                                        <textarea rows="3" type="text" name="deskripsi_album" class="form-control <?= ($validation->hasError('deskripsi_album')) ? 'is-invalid' : ''; ?>" required><?= old('deskripsi_album') ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('deskripsi_album') ?>
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="btn btn-info add_foto">Tambah Foto</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Foto</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label>Judul Foto</label><input type="text" name="judul_foto[]" class="form-control <?= ($validation->hasError('judul_foto')) ? 'is-invalid' : ''; ?>" value="<?= old('judul_foto') ?>" required>
                                        <p class="text-danger"><?= $validation->getError('judul_foto') ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"><label>Deskripsi Foto</label><textarea rows="3" type="text" name="deskripsi_foto[]" class="form-control <?= ($validation->hasError('deskripsi_foto')) ? 'is-invalid' : ''; ?>" required><?= old('deskripsi_foto') ?></textarea>
                                        <p class="text-danger"><?= $validation->getError('deskripsi_foto') ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"><label>Upload Gambar dan sebagai Sampul Album</label>
                                        <input type="file" name="path_foto[]" class="form-control no-border <?= ($validation->hasError('path_foto')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" required>
                                        <p class="text-danger"><?= $validation->getError('path_foto') ?></p>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="btn btn-danger delete_foto">Hapus foto di atas</div>
                                    </div>
                                </div> -->
                                <div class="col-md-12 mb-2">
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="add_album">

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a href="<?= base_url('admin/album') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>