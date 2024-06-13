<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Ubah Data Video
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
                    <h1>Ubah Data Video</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/video/' . $videoData->id_video) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Video</label>
                                        <input type="text" name="judul_video" class="form-control <?= ($validation->hasError('judul_video')) ? 'is-invalid' : ''; ?>" value="<?= $videoData->judul_video ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('judul_video') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Link Video Embed</label>
                                        <textarea rows="4" name="deskripsi" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" required><?= explode('embed-', $videoData->path_video)[1] ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('deskripsi') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea rows="4" name="path_video" class="form-control <?= ($validation->hasError('path_video')) ? 'is-invalid' : ''; ?>" required><?= $videoData->deskripsi ?></textarea>
                                        <p class="text-danger">
                                            <?= $validation->getError('path_video') ?>
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
                    <a href="<?= base_url('admin/video/' . $videoData->id_video) ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>