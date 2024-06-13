<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Ubah Data File
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
                    <h1>Ubah Data File</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/file/' . $fileData->id_files) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul File</label>
                                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" value="<?= $fileData->title ?>" autofocus required>
                                        <input type="text" name="type" class="form-control" value="<?= $fileData->type ?>" hidden>
                                        <p class="text-danger">
                                            <?= $validation->getError('title') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File Sebelumnya</label>
                                        <div class="input-group">
                                            <a href="<?= base_url('upload/files/' . $fileData->source) ?>" class="form-control btn btn-primary" target="_blank">Download</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload File Baru</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="hidden" name="sourceLama" value="<?= $fileData->source ?>">
                                                <input type="file" name="source" class="custom-file-input <?= ($validation->hasError('source')) ? 'is-invalid' : ''; ?>" onchange="dokumenPreview()">
                                                <label class="custom-file-label">Pilih File Baru</label>
                                            </div>
                                        </div>
                                        <p class="text-danger">
                                            <?= $validation->getError('source') ?>
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
                    <a href="<?= base_url('admin/file/' . $fileData->id_files) ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>