<?= $this->extend('backend/layout/index') ?>

<?= $this->section('title') ?>
Tambah Data Pejabat
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<!-- Empty -->
<?= $this->endSection() ?>

<?= $this->section('add-js') ?>
<script>
    function imgPreview() {
        const img = document.querySelector('.custom-file-input');
        const imgLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        imgLabel.textContent = img.files[0].name;

        const fileImg = new FileReader();
        fileImg.readAsDataURL(img.files[0]);
        fileImg.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Pejabat</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/pejabat') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama') ?>" autofocus required>
                                        <p class="text-danger">
                                            <?= $validation->getError('nama') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan / Tahun Menjabat</label>
                                        <input type="text" name="jabatan" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" value="<?= old('jabatan') ?>" placeholder="Contoh: Walikota / Plt. Lurah Ragunan / 1966 - 1968" required>
                                        <p class="text-danger">
                                            <?= $validation->getError('jabatan') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" name="kategori" required>
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <option value="Walikota Terdahulu">Walikota Terdahulu</option>
                                            <option value="Pejabat Teras">Pejabat Teras</option>
                                            <option value="ESELON III">ESELON III</option>
                                            <option value="Camat - Cilandak">Camat - Cilandak</option>
                                            <option value="Lurah Cilandak Barat - Cilandak">Lurah Cilandak Barat - Cilandak</option>
                                            <option value="Lurah Cipete Selatan - Cilandak">Lurah Cipete Selatan - Cilandak</option>
                                            <option value="Lurah Gandaria Selatan - Cilandak">Lurah Gandaria Selatan - Cilandak</option>
                                            <option value="Lurah Lebak Bulus - Cilandak">Lurah Lebak Bulus - Cilandak</option>
                                            <option value="Lurah Pondok Labu - Cilandak">Lurah Pondok Labu - Cilandak</option>
                                            <option value="Camat - Jagakarsa">Camat - Jagakarsa</option>
                                            <option value="Lurah Ciganjur - Jagakarsa">Lurah Ciganjur - Jagakarsa</option>
                                            <option value="Lurah Cipedak - Jagakarsa">Lurah Cipedak - Jagakarsa</option>
                                            <option value="Lurah Jagakarsa - Jagakarsa">Lurah Jagakarsa - Jagakarsa</option>
                                            <option value="Lurah Lenteng Agung - Jagakarsa">Lurah Lenteng Agung - Jagakarsa</option>
                                            <option value="Lurah Srengseng Sawah - Jagakarsa">Lurah Srengseng Sawah - Jagakarsa</option>
                                            <option value="Lurah Tanjung Barat - Jagakarsa">Lurah Tanjung Barat - Jagakarsa</option>
                                            <option value="Camat - Kebayoran Baru">Camat - Kebayoran Baru</option>
                                            <option value="Lurah Cipete Utara - Kebayoran Baru">Lurah Cipete Utara - Kebayoran Baru</option>
                                            <option value="Lurah Gandaria Utara - Kebayoran Baru">Lurah Gandaria Utara - Kebayoran Baru</option>
                                            <option value="Lurah Gunung - Kebayoran Baru">Lurah Gunung - Kebayoran Baru</option>
                                            <option value="Lurah Kramat Pela - Kebayoran Baru">Lurah Kramat Pela - Kebayoran Baru</option>
                                            <option value="Lurah Melawai - Kebayoran Baru">Lurah Melawai - Kebayoran Baru</option>
                                            <option value="Lurah Petogogan - Kebayoran Baru">Lurah Petogogan - Kebayoran Baru</option>
                                            <option value="Lurah Pulo - Kebayoran Baru">Lurah Pulo - Kebayoran Baru</option>
                                            <option value="Lurah Rawa Barat - Kebayoran Baru">Lurah Rawa Barat - Kebayoran Baru</option>
                                            <option value="Lurah Selong - Kebayoran Baru">Lurah Selong - Kebayoran Baru</option>
                                            <option value="Lurah Senayan - Kebayoran Baru">Lurah Senayan - Kebayoran Baru</option>
                                            <option value="Camat - Kebayoran Lama">Camat - Kebayoran Lama</option>
                                            <option value="Lurah Cipulir - Kebayoran Lama">Lurah Cipulir - Kebayoran Lama</option>
                                            <option value="Lurah Grogol Selatan - Kebayoran Lama">Lurah Grogol Selatan - Kebayoran Lama</option>
                                            <option value="Lurah Grogol Utara - Kebayoran Lama">Lurah Grogol Utara - Kebayoran Lama</option>
                                            <option value="Lurah Kebayoran Lama Selatan - Kebayoran Lama">Lurah Kebayoran Lama Selatan - Kebayoran Lama</option>
                                            <option value="Lurah Kebayoran Lama Utara - Kebayoran Lama">Lurah Kebayoran Lama Utara - Kebayoran Lama</option>
                                            <option value="Lurah Pondok Pinang - Kebayoran Lama">Lurah Pondok Pinang - Kebayoran Lama</option>
                                            <option value="Lurah Bangka - Mampang Prapatan">Lurah Bangka - Mampang Prapatan</option>
                                            <option value="Camat - Mampang Prapatan">Camat - Mampang Prapatan</option>
                                            <option value="Lurah Kuningan Barat - Mampang Prapatan">Lurah Kuningan Barat - Mampang Prapatan</option>
                                            <option value="Lurah Mampang Prapatan - Mampang Prapatan">Lurah Mampang Prapatan - Mampang Prapatan</option>
                                            <option value="Lurah Pela Mampang - Mampang Prapatan">Lurah Pela Mampang - Mampang Prapatan</option>
                                            <option value="Lurah Tegal Parang - Mampang Prapatan">Lurah Tegal Parang - Mampang Prapatan</option>
                                            <option value="Camat - Pancoran">Camat - Pancoran</option>
                                            <option value="Lurah Cikoko - Pancoran">Lurah Cikoko - Pancoran</option>
                                            <option value="Lurah Duren Tiga - Pancoran">Lurah Duren Tiga - Pancoran</option>
                                            <option value="Lurah Kalibata - Pancoran">Lurah Kalibata - Pancoran</option>
                                            <option value="Lurah Pancoran - Pancoran">Lurah Pancoran - Pancoran</option>
                                            <option value="Lurah Pengadegan - Pancoran">Lurah Pengadegan - Pancoran</option>
                                            <option value="Lurah Rawajati - Pancoran">Lurah Rawajati - Pancoran</option>
                                            <option value="Camat - Pasar Minggu">Camat - Pasar Minggu</option>
                                            <option value="Lurah Cilandak Timur - Pasar Minggu">Lurah Cilandak Timur - Pasar Minggu</option>
                                            <option value="Lurah Jati Padang - Pasar Minggu">Lurah Jati Padang - Pasar Minggu</option>
                                            <option value="Lurah Kebagusan - Pasar Minggu">Lurah Kebagusan - Pasar Minggu</option>
                                            <option value="Lurah Pasar Minggu - Pasar Minggu">Lurah Pasar Minggu - Pasar Minggu</option>
                                            <option value="Lurah Pejaten Barat - Pasar Minggu">Lurah Pejaten Barat - Pasar Minggu</option>
                                            <option value="Lurah Pejaten Timur - Pasar Minggu">Lurah Pejaten Timur - Pasar Minggu</option>
                                            <option value="Lurah Ragunan - Pasar Minggu">Lurah Ragunan - Pasar Minggu</option>
                                            <option value="Camat - Pesanggrahan">Camat - Pesanggrahan</option>
                                            <option value="Lurah Bintaro - Pesanggrahan">Lurah Bintaro - Pesanggrahan</option>
                                            <option value="Lurah Pesanggrahan - Pesanggrahan">Lurah Pesanggrahan - Pesanggrahan</option>
                                            <option value="Lurah Petukangan Selatan - Pesanggrahan">Lurah Petukangan Selatan - Pesanggrahan</option>
                                            <option value="Lurah Petukangan Utara - Pesanggrahan">Lurah Petukangan Utara - Pesanggrahan</option>
                                            <option value="Lurah Ulujami - Pesanggrahan">Lurah Ulujami - Pesanggrahan</option>
                                            <option value="Camat - Setiabudi">Camat - Setiabudi</option>
                                            <option value="Lurah Guntur - Setiabudi">Lurah Guntur - Setiabudi</option>
                                            <option value="Lurah Karet Kuningan - Setiabudi">Lurah Karet Kuningan - Setiabudi</option>
                                            <option value="Lurah Karet Semanggi - Setiabudi">Lurah Karet Semanggi - Setiabudi</option>
                                            <option value="Lurah Karet - Setiabudi">Lurah Karet - Setiabudi</option>
                                            <option value="Lurah Kuningan Timur - Setiabudi">Lurah Kuningan Timur - Setiabudi</option>
                                            <option value="Lurah Menteng Atas - Setiabudi">Lurah Menteng Atas - Setiabudi</option>
                                            <option value="Lurah Pasar Manggis - Setiabudi">Lurah Pasar Manggis - Setiabudi</option>
                                            <option value="Lurah Setiabudi - Setiabudi">Lurah Setiabudi - Setiabudi</option>
                                            <option value="Camat - Tebet">Camat - Tebet</option>
                                            <option value="Lurah Bukit Duri - Tebet">Lurah Bukit Duri - Tebet</option>
                                            <option value="Lurah Kebon Baru - Tebet">Lurah Kebon Baru - Tebet</option>
                                            <option value="Lurah Manggarai Selatan - Tebet">Lurah Manggarai Selatan - Tebet</option>
                                            <option value="Lurah Manggarai - Tebet">Lurah Manggarai - Tebet</option>
                                            <option value="Lurah Menteng Dalam - Tebet">Lurah Menteng Dalam - Tebet</option>
                                            <option value="Lurah Tebet Barat - Tebet">Lurah Tebet Barat - Tebet</option>
                                            <option value="Lurah Tebet Timur - Tebet">Lurah Tebet Timur - Tebet</option>
                                        </select>
                                        <p class="text-danger">
                                            <?= $validation->getError('kategori') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <img src="<?= base_url('public/assets/images/logo/jakarta-selatan.png') ?>" class="img-thumbnail img-preview">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="foto" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" accept="image/png, image/jpg, image/jpeg" onchange="imgPreview()">
                                                <label class="custom-file-label">Pilih Foto Jika Sudah Ada</label>
                                            </div>
                                        </div>
                                        <p class="text-danger">
                                            Jika Foto belum ada maka Logo Jakarta Selatan akan dijadikan sebagai foto default
                                            <?= '<br><br>' . $validation->getError('foto') ?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="<?= base_url('admin/pejabat') ?>" class="btn btn-secondary mb-3">Batal</a>
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>