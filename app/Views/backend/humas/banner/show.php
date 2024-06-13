<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Detail Data Banner
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
                    <h1>Detail Data Banner</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
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
                                    <input type="text" name="title" class="form-control" value="<?= $bannerData->title ?>" autofocus disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="desc" class="form-control" value="<?= $bannerData->desc ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mulai</label>
                                    <input type="text" name="publish_date" class="form-control" value="<?= date('d M Y', strtotime($bannerData->publish_date)) ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Selesai</label>
                                    <input type="text" name="end_date" class="form-control" value="<?= date('d M Y', strtotime($bannerData->end_date)) ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input type="text" name="created_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($bannerData->created_date)) ?>" disabled>
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
                                    <input type="text" name="place" class="form-control" value="<?= ($bannerData->place == 1 ? 'Pop Up' : 'Static') ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Posisi</label>
                                    <input type="text" name="position" class="form-control" value="<?= $bannerData->position ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Link Source</label>
                                    <input type="text" name="source" class="form-control" value="<?= $bannerData->source ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="text" name="image" class="form-control" value="<?= $bannerData->image ?>" disabled>
                                    <img src="<?= base_url('upload/banner/' . $bannerData->image) ?>" width="100%">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('admin/banner/' . $bannerData->id_banner) ?>" method="post" id="confirm">
                    <a href="<?= base_url('admin/banner') ?>" class="btn btn-secondary mb-3">Kembali</a>

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <a value="Hapus" class="btn btn-danger float-right swal-confirm">Hapus</a>

                    <a href="<?= base_url('admin/banner/' . $bannerData->id_banner . '/edit') ?>">
                        <input type="button" value="Ubah" class="btn btn-info float-right mr-2">
                    </a>

                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>