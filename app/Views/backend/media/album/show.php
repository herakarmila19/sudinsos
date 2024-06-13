<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Detail Data Album
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
                    <h1>Detail Data Album</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sampul</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul Album</label>
                                    <input type="text" name="judul_album" class="form-control" value="<?= $albumData->judul_album ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi Album</label>
                                    <textarea rows="6" name="deskripsi_album" class="form-control" disabled><?= nl2br($albumData->deskripsi_album) ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input type="text" name="created_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($albumData->created_date)) ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cover Album</label>
                                    <img src="<?= base_url('upload/foto/' . $albumData->path_album) ?>" width="100%">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Foto</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <?php foreach ($fotoData as $no => $data) : ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?= $data->judul_foto ?></label>
                                        <textarea rows="3" name="deskripsi_foto" class="form-control" disabled><?= nl2br($data->deskripsi_foto) ?></textarea>
                                        <img src="<?= base_url('upload/foto/' . $data->path_foto) ?>" width="100%">
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('admin/album/' . $albumData->id_album) ?>" method="post" id="confirm">
                    <a href="<?= base_url('admin/album') ?>" class="btn btn-secondary mb-3">Kembali</a>

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <a value="Hapus" class="btn btn-danger float-right swal-confirm">Hapus</a>

                    <a href="<?= base_url('admin/album/' . $albumData->id_album . '/edit') ?>">
                        <input type="button" value="Ubah" class="btn btn-info float-right mr-2">
                    </a>

                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>