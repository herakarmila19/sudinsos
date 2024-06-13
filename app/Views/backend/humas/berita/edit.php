<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Ubah Data Berita
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
                    <h1>Ubah Data Berita</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/berita/' . $beritaData->id_berita) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <?php
                                $penulis = empty(explode(';', $beritaData->penulis)[0]) ? 'Kosong' : explode(';', $beritaData->penulis)[0];
                                $editor = empty(explode(';', $beritaData->penulis)[1]) ? 'Kosong' : explode(';', $beritaData->penulis)[1];
                                $fotografer = empty(explode(';', $beritaData->penulis)[2]) ? 'Kosong' : explode(';', $beritaData->penulis)[2];
                                ?>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Penulis</label>
                                        <input type="text" name="penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" value="<?= $penulis ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('penulis') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Editor</label>
                                        <input type="text" name="editor" class="form-control <?= ($validation->hasError('editor')) ? 'is-invalid' : ''; ?>" value="<?= $editor ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('editor') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fotografer</label>
                                        <input type="text" name="fotografer" class="form-control <?= ($validation->hasError('fotografer')) ? 'is-invalid' : ''; ?>" value="<?= $fotografer ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('fotografer') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Berita</label>
                                        <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" value="<?= $beritaData->judul ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('judul') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" rows="2" required><?= $beritaData->deskripsi ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('deskripsi') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Isi Konten</label>
                                        <textarea id="summernote" name="isi_konten" class="form-control <?= ($validation->hasError('isi_konten')) ? 'is-invalid' : ''; ?>" required><?= $beritaData->isi_konten ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('isi_konten') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" name="kategori" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="<?= $kategoriData == 'Tidak Terkategori' ? 'Tidak Terkategori' : $kategoriData->id_kategori ?>" selected><?= $kategoriData == 'Tidak Terkategori' ? 'Tidak Terkategori' : $kategoriData->nama_kategori ?></option>
                                            <option value="" disabled>Pilih Kategori</option>
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
                                            <option value="<?= $beritaData->publish ?>" selected><?= $beritaData->publish == 0 ? 'Draft' : 'Publish' ?></option>
                                            <option value="Pilih" disabled>Pilih</option>
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
                                        <img src="<?= $beritaData->thumbnail == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $beritaData->thumbnail) ? base_url('upload/thumbnail/' . $beritaData->thumbnail) : base_url('upload/default/berita-kosong.png')) ?>" alt="<?= $beritaData->slug ?>" class="img-thumbnail img-preview">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" name="thumbnailLama" value="<?= $beritaData->thumbnail ?>">
                                                <input type="file" name="thumbnail" class="custom-file-input <?= ($validation->hasError('thumbnail')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()">
                                                <label class="custom-file-label"><?= $beritaData->thumbnail ?></label>
                                            </div>
                                        </div>
                                        <p class="text-danger">
                                            <?= $validation->getError('thumbnail') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Diubah</label>
                                        <input type="text" name="modified_date" class="form-control" value="<?= ($beritaData->modified_date == NULL ? 'Belum Pernah Diubah' : (date('d M Y, H i', strtotime($beritaData->modified_date)))) ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Publish</label>
                                        <input type="text" name="publish_date" class="form-control" value="<?= $beritaData->publish_date == NULL ? 'Belum Dipublish' : date('d M Y, H i', strtotime($beritaData->publish_date)) ?>" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <a href="<?= base_url('admin/berita/' . $beritaData->id_berita) ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>