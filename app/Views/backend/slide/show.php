<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Detail Data Slide
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<link rel="stylesheet" href="<?= base_url('public/adminlte/plugins/sweetalert2/sweetalert2.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script src="<?= base_url('public/adminlte/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
    $(".swal-confirm").click(function(e) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data ini akan dihapus secara permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya, Saya Yakin',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Berhasil',
                    'Data ini sudah terhapus',
                    'success'
                );
                $('#confirm').submit();
            }
        })
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Slide</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control" value="<?= $slideData->judul ?>" autofocus disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="jabatan" class="form-control" value="<?= $slideData->deskripsi ?>" disabled>
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
                                            <input type="file" name="gambar" class="custom-file-input" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()" disabled>
                                            <label class="custom-file-label"><?= $slideData->gambar ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input type="text" name="created_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($slideData->created_date)) ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Diubah</label>
                                    <input type="text" name="modified_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($slideData->modified_date)) ?>" disabled>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('admin/slide/' . $slideData->id) ?>" method="post" id="confirm">
                    <a href="<?= base_url('admin/slide') ?>" class="btn btn-secondary mb-3">Kembali</a>

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <a value="Hapus" class="btn btn-danger float-right swal-confirm">Hapus</a>

                    <a href="<?= base_url('admin/slide/' . $slideData->id . '/edit') ?>">
                        <input type="button" value="Ubah" class="btn btn-info float-right mr-2">
                    </a>

                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>