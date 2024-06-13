<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Detail Data Agenda
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
                    <h1>Detail Data Agenda</h1>
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
                                    <label>Nama Acara</label>
                                    <input type="text" name="nama_acara" class="form-control" value="<?= $agendaData->nama_acara ?>" autofocus disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Acara</label>
                                    <input type="text" name="tanggal_acara" class="form-control" value="<?= date('d M Y', strtotime($agendaData->tanggal_acara)) ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Jam</label>
                                    <input type="text" name="jam_acara" class="form-control" value="<?= $agendaData->jam_acara ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Menit</label>
                                    <input type="text" name="menit_acara" class="form-control" value="<?= $agendaData->menit_acara ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea rows="2" name="deskripsi_acara" class="form-control" disabled><?= $agendaData->deskripsi_acara ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pejabat</label>
                                    <input type="text" name="pejabat" class="form-control" value="<?= $agendaData->pejabat ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" value="<?= $agendaData->lokasi ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <?php foreach ($kategoriData as $data) : ?>
                                        <?php if ($agendaData->id_kategori_agenda == $data->id) : ?>
                                            <input type="text" name="id_kategori_agenda" class="form-control" value="<?= $data->nama_media ?>" disabled>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" name="publish" class="form-control" value="<?= ($agendaData->publish == '0' ? 'Draft' : 'Publish') ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input type="text" name="created_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($agendaData->created_date)) ?>" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('admin/agenda/' . $agendaData->id_agenda) ?>" method="post" id="confirm">
                    <a href="<?= base_url('admin/agenda') ?>" class="btn btn-secondary mb-3">Kembali</a>

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <a value="Hapus" class="btn btn-danger float-right swal-confirm">Hapus</a>

                    <a href="<?= base_url('admin/agenda/' . $agendaData->id_agenda . '/edit') ?>">
                        <input type="button" value="Ubah" class="btn btn-info float-right mr-2">
                    </a>

                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>