<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Ubah Data Regulasi
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<!-- Empty -->
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script>
    function dokumenPreview() {
        const dokumen = document.querySelector('.custom-file-input');
        const dokumenLabel = document.querySelector('.custom-file-label');
        const dokumenPreview = document.querySelector('.dokumen-preview');

        dokumenLabel.textContent = dokumen.files[0].name;

        const fileImg = new FileReader();
        fileImg.readAsDataURL(dokumen.files[0]);
        fileImg.onload = function(e) {
            dokumenPreview.src = e.target.result;
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
                    <h1>Ubah Data Regulasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/regulasi/' . $regulasiData->id_regulasi) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Regulasi</label>
                                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" value="<?= $regulasiData->title ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('title') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File Sebelumnya</label>
                                        <div class="input-group">
                                            <a href="<?= base_url('upload/regulasi/' . $regulasiData->path_regulasi) ?>" class="form-control btn btn-primary" target="_blank">Download</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload File Baru</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="hidden" name="path_regulasiLama" value="<?= $regulasiData->path_regulasi ?>">
                                                <input type="file" name="path_regulasi" class="custom-file-input <?= ($validation->hasError('path_regulasi')) ? 'is-invalid' : ''; ?>" onchange="dokumenPreview()">
                                                <label class="custom-file-label">Pilih File Baru</label>
                                            </div>
                                        </div>
                                        <p class="text-danger">
                                            <?= $validation->getError('path_regulasi') ?>
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
                    <a href="<?= base_url('admin/regulasi/' . $regulasiData->id_regulasi) ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>