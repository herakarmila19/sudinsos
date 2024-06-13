<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Data Banner
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<!-- Empty -->
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script>
    $(document).ready(function() {
        $(".tempat").on("change", function() {
            if ($(this).val() == "1") {
                $("select[name='position']").html(
                    "<option value='1'>1</option>"
                );
            } else {
                $("select[name='position']").html(
                    "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>"
                );
            }
        });
    });

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
                    <h1>Tambah Data Banner</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/banner') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Banner</label>
                                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" value="<?= old('title') ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('title') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="desc" class="form-control <?= ($validation->hasError('desc')) ? 'is-invalid' : ''; ?>" value="<?= old('desc') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('desc') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mulai</label>
                                        <input type="date" name="publish_date" class="form-control <?= ($validation->hasError('publish_date')) ? 'is-invalid' : ''; ?>" value="<?= old('publish_date') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('publish_date') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Selesai</label>
                                        <input type="date" name="end_date" class="form-control <?= ($validation->hasError('end_date')) ? 'is-invalid' : ''; ?>" value="<?= old('end_date') ?>" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('end_date') ?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <select name="place" class="form-control tempat <?= ($validation->hasError('place')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="1">Pop Up</option>
                                            <!-- <option value="" selected disabled>Pilih Tempat</option>
                                            <option value="1">Pop Up</option>
                                            <option value="2">Static</option> -->
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('place') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Posisi</label>
                                        <select name="position" class="form-control <?= ($validation->hasError('position')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="1">1</option>
                                            <!-- <option value="" selected disabled>Pilih Posisi</option> -->
                                            <!-- < ?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <option value="< ?= $i ?>">< ?= $i ?></option>
                                            < ?php endfor; ?> -->
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('position') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Link Source</label>
                                        <input type="text" name="source" class="form-control" value="<?= old('source') ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" onchange="dokumenPreview()" accept="image/png, image/jpg, image/jpeg" required>
                                                <label class="custom-file-label">Pilih Gambar</label>
                                            </div>
                                            <img src="<?= base_url('public/assets/images/logo/jakarta-selatan.png') ?>" class="dokumen-preview" width="100%">
                                        </div>
                                        <p class="text-danger">
                                            <?= $validation->getError('image') ?>
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
                    <a href="<?= base_url('admin/banner') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>