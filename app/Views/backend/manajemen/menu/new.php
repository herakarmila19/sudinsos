<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Data Menu
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<link rel="stylesheet" href="<?= base_url('public/adminlte/plugins/summernote/summernote-bs4.min.css') ?>">
<style>
    .note-group-select-from-files {
        display: none;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script src="<?= base_url('public/adminlte/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script src="<?= base_url('public/adminlte/plugins/summernote/plugin/image/summernote-image-attributes.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
            },
            imageAttributes: {
                icon: '<i class="note-icon-pencil"/>',
                removeEmpty: false, // true = remove attributes | false = leave empty if present
                disableUpload: true // true = don't display Upload Options | Display Upload Options
            },
            height: "600px",
        });
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Menu</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/menu') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul Menu</label>
                                        <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" value="<?= old('judul') ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('judul') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" name="url" class="form-control <?= ($validation->hasError('url')) ? 'is-invalid' : ''; ?>" value="<?= old('url') ?>" required placeholder="Contoh: biografi-walikota">
                                        <p class="text-danger">
                                            <?= $validation->getError('url') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Isi Konten</label>
                                        <textarea id="summernote" rows="4" name="isi_konten" class="form-control <?= ($validation->hasError('isi_konten')) ? 'is-invalid' : ''; ?>" required><?= old('isi_konten') ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('isi_konten') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
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
                    <a href="<?= base_url('admin/menu') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>