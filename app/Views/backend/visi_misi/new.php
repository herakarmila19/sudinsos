<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Data Visi & Misi
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
                    <h1>Tambah Data Visi & Misi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/visi-misi') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama') ?>" autofocus required placeholder="Munjirin, S.Sos, M.Si">
                                        <p class="text-danger">
                                            <?= $validation->getError('nama') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" value="<?= old('jabatan') ?>" required placeholder="Walikota Jakarta Selatan">
                                        <p class="text-danger">
                                            <?= $validation->getError('jabatan') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Visi & Misi</label>
                                        <input type="text" name="visi_misi" class="form-control <?= ($validation->hasError('visi_misi')) ? 'is-invalid' : ''; ?>" value="<?= old('visi_misi') ?>" required placeholder="Kota Administrasi Jakarta Selatan yang berbudaya, berorientasi pada pelayanan publik dan berwawasan lingkungan.">
                                        <p class="text-danger">
                                            <?= $validation->getError('visi_misi') ?>
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
                                        <label>Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()">
                                                <label class="custom-file-label">Pilih Gambar</label>
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
            <div class="row">
                <div class="col-12">
                    <a href="<?= base_url('admin/visi-misi') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>