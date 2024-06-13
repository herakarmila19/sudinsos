<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Data Berita
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/plugins/summernote/summernote-bs4.min.css">
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script src="<?= base_url('public/adminlte') ?>/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            height: "500px",
        });
    });
</script>
<script>
    function imgPreview() {
        const img = document.querySelector('.custom-file-input');
        const imgLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        imgLabel.textContent = img.files[0].name;

        const fileImg = new FileReader();
        fileImg.readAsDataURL(img.files[0]);
        fileImg.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Berita</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/berita') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Penulis</label>
                                        <input type="text" name="penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" value="<?= old('penulis') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('penulis') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Editor</label>
                                        <input type="text" name="editor" class="form-control <?= ($validation->hasError('editor')) ? 'is-invalid' : ''; ?>" value="<?= old('editor') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('editor') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fotografer</label>
                                        <input type="text" name="fotografer" class="form-control <?= ($validation->hasError('fotografer')) ? 'is-invalid' : ''; ?>" value="<?= old('fotografer') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('fotografer') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Berita</label>
                                        <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" value="<?= old('judul') ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('judul') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" rows="2" required><?= old('deskripsi') ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('deskripsi') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Isi Konten</label>
                                        <textarea id="summernote" name="isi_konten" class="form-control <?= ($validation->hasError('isi_konten')) ? 'is-invalid' : ''; ?>" required><?= old('isi_konten') ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('isi_konten') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" name="kategori" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            <option value="3">KESEJAHTERAAN RAKYAT</option>
                                            <option value="4">PEMERINTAHAN</option>
                                            <option value="1">PEREKONOMIAN DAN PEMBANGUNAN</option>
                                            <option value="540">SOSIAL BUDAYA</option>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('kategori') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="publish" name="publish" class="form-control <?= ($validation->hasError('publish')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="Pilih" selected disabled>Pilih</option>
                                            <option value="0">Draft</option>
                                            <option value="1">Publish</option>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('publish') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <img src="<?= base_url('public/assets/images/logo/jakarta-selatan.png') ?>" class="img-thumbnail img-preview">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="thumbnail" class="custom-file-input <?= ($validation->hasError('thumbnail')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()" required>
                                                <label class="custom-file-label">Pilih Gambar</label>
                                            </div>
                                        </div>
                                        <p class="text-danger">
                                            <?= $validation->getError('thumbnail') ?>
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
                    <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>