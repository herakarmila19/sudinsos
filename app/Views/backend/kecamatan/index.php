<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Camat & Lurah
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<style>
    .btn.btn-secondary {
        background-color: #007bff;
        border: 2px solid #007bff;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script>
    $(function() {
        $('#tabel').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "responsive": true,
            "language": {
                "url": "<?= base_url('public/adminlte') ?>/plugins/datatables/id.json",
            },
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
                    <h1>Camat & Lurah</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">

            <?= $this->include('backend/layout/flashdata') ?>

            <div class="card-body">
                <table id="tabel" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Tanggal Diubah</th>
                            <th>Fitur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kecamatanData as $no => $data) : ?>
                            <tr>
                                <td><?= $no + 1 ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->kategori ?></td>
                                <td>
                                    <?php if ($data->foto == '-') : ?>
                                        <a href="<?= base_url('public/assets/images/logo/jakarta-selatan.png') ?>" target="_blank" style="color: red;">Belum Ada</a>
                                    <?php else : ?>
                                        <a href="<?= base_url('upload/pejabat/' . $data->foto) ?>" target="_blank">Lihat</a>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d M Y, H:i', strtotime($data->modified_date)) ?></td>
                                <td><a href="<?= base_url('kecamatan/' . $data->id . '/edit') ?>">Ubah</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>