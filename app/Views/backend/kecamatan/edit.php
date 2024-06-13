<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Ubah Data Camat & Lurah
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

    function imgDefault() {
        document.querySelector('.img-preview').src = '<?= base_url('public/assets/images/logo/jakarta-selatan.png') ?>';
        const imgLabel = document.querySelector('.custom-file-label');
        imgLabel.textContent = 'Foto Default';
        document.getElementById("fotoDefault").value = '-';

        $(".custom-file-input").remove();
        $(".custom-file").append('<input type="file" name="foto" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()">');
    }
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Data Camat & Lurah</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('kecamatan/' . $kecamatanData->id) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= $kecamatanData->nama ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('nama') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" value="<?= $kecamatanData->jabatan ?>" placeholder="Contoh: Camat Tebet / Lurah Bukit Duri / Plt. Lurah Ragunan" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('jabatan') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="text" name="kategori" class="form-control" value="<?= $kecamatanData->kategori ?>" hidden>
                                        <input type="text" class="form-control" value="<?= $kecamatanData->kategori ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <img src="<?= $kecamatanData->foto == '-' ? base_url('public/assets/images/logo/jakarta-selatan.png') : base_url('upload/pejabat/' . $kecamatanData->foto) ?>" class="img-thumbnail img-preview">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" name="fotoLama" id="fotoDefault" hidden value="<?= $kecamatanData->foto ?>">
                                                <input type="file" name="foto" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()">
                                                <label class="custom-file-label"><?= $kecamatanData->foto == '-' ? 'Foto Default Karena Sebelumnya Tidak Diupload' : $kecamatanData->foto ?></label>
                                            </div>
                                        </div>
                                        <p class="text-danger">
                                            Jika Foto belum ada maka Logo Jakarta Selatan akan dijadikan sebagai foto default
                                            <br><br>
                                            <?= $validation->getError('foto') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a class="btn btn-danger" onclick="imgDefault()">Gunakan Foto Default</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <a href="<?= base_url('kecamatan') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>