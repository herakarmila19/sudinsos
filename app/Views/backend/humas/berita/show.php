<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Detail Data Berita
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<link rel="stylesheet" href="<?= base_url('public/adminlte/plugins/sweetalert2/sweetalert2.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/plugins/summernote/summernote-bs4.min.css">
<style>
    .note-group-select-from-files {
        display: none;
    }
</style>
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
<script src="<?= base_url('public/adminlte') ?>/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            height: "500px",
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
                    <h1>Detail Data Berita</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">

                        <?php
                        $penulis = empty(explode(';', $beritaData->penulis)[0]) ? 'Kosong' : explode(';', $beritaData->penulis)[0];
                        $editor = empty(explode(';', $beritaData->penulis)[1]) ? 'Kosong' : explode(';', $beritaData->penulis)[1];
                        $fotografer = empty(explode(';', $beritaData->penulis)[2]) ? 'Kosong' : explode(';', $beritaData->penulis)[2];
                        ?>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text" name="penulis" class="form-control" value="<?= $penulis ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Editor</label>
                                    <input type="text" name="editor" class="form-control" value="<?= $editor ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fotografer</label>
                                    <input type="text" name="fotografer" class="form-control" value="<?= $fotografer ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul Berita</label>
                                    <input type="text" name="judul" class="form-control" value="<?= $beritaData->judul ?>" autofocus disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="2" disabled><?= $beritaData->deskripsi ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Isi Konten</label>
                                    <textarea id="summernote" name="isi_konten" class="form-control"><?= $beritaData->isi_konten ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" class="form-control" value="<?= $kategoriData == 'Tidak Terkategori' ? 'Tidak Terkategori' : $kategoriData->nama_kategori ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" name="publish" class="form-control" value="<?= ($beritaData->publish == 0 ? 'Draft' : 'Publish') ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <img src="<?= $beritaData->thumbnail == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $beritaData->thumbnail) ? base_url('upload/thumbnail/' . $beritaData->thumbnail) : base_url('upload/default/berita-kosong.png')) ?>" alt="<?= $beritaData->slug ?>" class="img-thumbnail img-preview">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="text" name="thumbnail" class="form-control" value="<?= $beritaData->thumbnail ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input type="text" name="created_date" class="form-control" value="<?= date('d M Y, H:i', strtotime($beritaData->created_date)) ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Publish</label>
                                    <input type="text" name="publish_date" class="form-control" value="<?= $beritaData->publish_date == NULL ? 'Belum Dipublish' : date('d M Y, H:i', strtotime($beritaData->publish_date)) ?>" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('admin/berita/' . $beritaData->id_berita) ?>" method="post" id="confirm">
                    <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary mb-3">Kembali</a>

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <a value="Hapus" class="btn btn-danger float-right swal-confirm">Hapus</a>

                    <a href="<?= base_url('admin/berita/' . $beritaData->id_berita . '/edit') ?>">
                        <input type="button" value="Ubah" class="btn btn-info float-right mr-2">
                    </a>

                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>