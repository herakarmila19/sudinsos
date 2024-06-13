<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Berita
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<link rel="stylesheet"
    href="<?= base_url('public/adminlte') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?= base_url('public/adminlte') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?= base_url('public/adminlte') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('api/berita'); ?>",
            "type": "POST",
        },
        initComplete: function() {
            var api = this.api();
            new $.fn.dataTable.Buttons(api, {
                buttons: [{
                    text: 'Tambah Data',
                    action: function(e, dt, node, conf) {
                        window.location.href =
                            '<?= base_url('admin/berita/new') ?>';
                    }
                }, ],
            });
            api.buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');
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
                    <h1>Berita</h1>
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
                            <th>Tanggal Dibuat</th>
                            <th>Status</th>
                            <!-- <th>Tanggal Publish</th> -->
                            <th>Fitur</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>