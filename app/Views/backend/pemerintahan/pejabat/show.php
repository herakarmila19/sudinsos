<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Detail Data Pejabat
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
                    <h1>Detail Data Pejabat</h1>
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $pejabatData->nama ?>" autofocus disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="<?= $pejabatData->jabatan ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" class="form-control" value="<?= $pejabatData->kategori ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <img src="<?= $pejabatData->foto == '-' ? base_url('public/assets/images/logo/jakarta-selatan.png') : base_url('upload/pejabat/' . $pejabatData->foto) ?>" class="img-thumbnail img-preview">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()" disabled>
                                            <label class="custom-file-label"><?= $pejabatData->foto == '-' ? 'Foto Default Karena Sebelumnya Tidak Diupload' : $pejabatData->foto ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input type="text" name="created_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($pejabatData->created_date)) ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Diubah</label>
                                    <input type="text" name="modified_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($pejabatData->modified_date)) ?>" disabled>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('admin/pejabat/' . $pejabatData->id) ?>" method="post" id="confirm">
                    <a href="<?= base_url('admin/pejabat') ?>" class="btn btn-secondary mb-3">Kembali</a>

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <a value="Hapus" class="btn btn-danger float-right swal-confirm">Hapus</a>

                    <a href="<?= base_url('admin/pejabat/' . $pejabatData->id . '/edit') ?>">
                        <input type="button" value="Ubah" class="btn btn-info float-right mr-2">
                    </a>

                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>