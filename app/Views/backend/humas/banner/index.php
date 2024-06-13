<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Humas Banner
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
            initComplete: function() {
                var api = this.api();
                new $.fn.dataTable.Buttons(api, {
                    buttons: [{
                        text: 'Tambah Data',
                        action: function(e, dt, node, conf) {
                            window.location.href = '<?= base_url('admin/banner/new') ?>';
                        }
                    }, ],
                });
                api.buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');
            }
        });
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Humas Banner</h1>
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
                            <th>Judul</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Banner</th>
                            <th>Tempat</th>
                            <th>Tanggal Dibuat</th>
                            <th>Fitur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bannerData as $no => $data) : ?>
                            <tr>
                                <td><?= $no + 1 ?></td>
                                <td><?= $data->title ?></td>
                                <td><?= date('d M Y', strtotime($data->publish_date)) ?></td>
                                <td><?= date('d M Y', strtotime($data->end_date)) ?></td>
                                <td><a href="<?= base_url('upload/banner/' . $data->image) ?>" target="_blank">Lihat Gambar</a></td>
                                <td><?= ($data->place == 1 ? 'Pop Up' : 'Static') ?></td>
                                <td><?= date('d M Y', strtotime($data->created_date)) ?></td>
                                <td><a href="<?= base_url('admin/banner/' . $data->id_banner) ?>">Detail</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>