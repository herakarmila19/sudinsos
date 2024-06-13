<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Detail Bank Data
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
                    <h1>Detail Bank Data</h1>
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
                                    <input type="text" name="nama" class="form-control" value="<?= $bankData->nama ?>" autofocus disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" name="jenis" class="form-control" value="<?= $bankData->jenis ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Wilayah / Keterangan</label>
                                    <input type="text" name="wilayah" class="form-control" value="<?= $bankData->wilayah ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat / Link URL</label>
                                    <textarea name="alamat" class="form-control" disabled><?= $bankData->alamat ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input type="text" name="created_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($bankData->created_date)) ?>" disabled>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('admin/bank-data/' . $bankData->id) ?>" method="post" id="confirm">
                    <a href="<?= base_url('admin/bank-data') ?>" class="btn btn-secondary mb-3">Kembali</a>

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <a value="Hapus" class="btn btn-danger float-right swal-confirm">Hapus</a>

                    <a href="<?= base_url('admin/bank-data/' . $bankData->id . '/edit') ?>">
                        <input type="button" value="Ubah" class="btn btn-info float-right mr-2">
                    </a>

                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>