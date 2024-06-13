<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Manajemen Menu
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
<link rel="stylesheet" href="<?= base_url('public/adminlte/plugins/sweetalert2/sweetalert2.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('public/adminlte/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
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
                            window.location.href = '<?= base_url('admin/menu/new') ?>';
                        }
                    }, ],
                });
                api.buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');
            }
        });

        var get_link = $('.trigger-btn').on("click", function() {
            var link = $(this).attr("data-href");
            $('.tmp_link').attr("href", "#");
            $('.tmp_link').attr("href", link);
        });

        var cpy = $('.cpy').on("click", function() {
            var link_cpy = $(this).attr("data-link");
            $(".tmp_cpy").val("");
            $(".tmp_cpy").val(link_cpy);
            /* Select the text field */
            $(".tmp_cpy").css("display", "block");
            $(".tmp_cpy").focus();
            $(".tmp_cpy").select();
            /* Copy the text inside the text field */
            document.execCommand("copy");
            $(".tmp_cpy").css("display", "none");

            Swal.fire(
                'Berhasil',
                'Link URL berhasil disalin',
                'success'
            )
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
                    <h1>Manajemen Menu</h1>
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
                            <th>Link</th>
                            <th>Status</th>
                            <th>Tanggal Dibuat</th>
                            <th>Fitur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menuData as $no => $data) : ?>
                            <tr>
                                <td><?= $no + 1 ?></td>
                                <td><?= $data->judul ?></td>
                                <td>
                                    <div class="btn btn-sm btn-info cpy" data-link="
                                    <?php
                                    if (str_contains($data->judul, 'Pemerintahan -') or str_contains($data->judul, 'PPID JakSel -')) {
                                        echo base_url($data->url);
                                    } else {
                                        echo base_url('menu/' . $data->url);
                                    }
                                    ?>
                                    ">Copy</div>
                                    <input type="text" style="display: none;position: absolute;z-index: 0;" value="" class="tmp_cpy" />
                                </td>
                                <td><?= ($data->publish == 0 ? 'Draft' : 'Publish') ?></td>
                                <td><?= date('d M Y', strtotime($data->created_date)) ?></td>
                                <td><a href="<?= base_url('admin/menu/' . $data->id_menu) ?>">Detail</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>