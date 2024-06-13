<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Ubah Data Slide
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<!-- Empty -->
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
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
                    <h1>Ubah Data Slide</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/slide/' . $slideData->id) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" value="<?= $slideData->judul ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('judul') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" value="<?= $slideData->deskripsi ?>" placeholder="Contoh: Walikota / Plt. Lurah Ragunan" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('deskripsi') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <img src="<?= base_url('upload/slide/' . $slideData->gambar) ?>" class="img-thumbnail img-preview">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" name="gambarLama" id="gambarDefault" hidden value="<?= $slideData->gambar ?>">
                                                <input type="file" name="gambar" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()">
                                                <label class="custom-file-label"><?= $slideData->gambar ?></label>
                                            </div>
                                        </div>
                                        <p class="text-danger">
                                            <?= $validation->getError('gambar') ?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <a href="<?= base_url('admin/slide/' . $slideData->id) ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>