<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
PPID Kelurahan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>PPID Kelurahan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="tabs-box faq-tabs">
            <div class="tabs-content">
                <div class="tab-buttons">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab1()">
                            <div class="btn-inner tab-btn" data-tab="#tab-1">
                                <span class="icon flaticon-target"></span>
                                <span class="txt">Form Permohonan Informasi Publik</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab2()">
                            <div class="btn-inner tab-btn" data-tab="#tab-2">
                                <span class="icon flaticon-layers"></span>
                                <span class="txt">Struktur Organisasi PPID</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab3()">
                            <div class="btn-inner tab-btn" data-tab="#tab-3">
                                <span class="icon flaticon-shield"></span>
                                <span class="txt">Tugas dan Fungsi PPID</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab4()">
                            <div class="btn-inner tab-btn" data-tab="#tab-4">
                                <span class="icon flaticon-information"></span>
                                <span class="txt">Prosedur Pelayanan Informasi</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab5()">
                            <div class="btn-inner tab-btn" data-tab="#tab-5">
                                <span class="icon flaticon-line-chart"></span>
                                <span class="txt">Waktu dan Biaya Layanan Informasi</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab6()">
                            <div class="btn-inner tab-btn" data-tab="#tab-6">
                                <span class="icon flaticon-university"></span>
                                <span class="txt">Daftar Informasi Publik</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab7()">
                            <div class="btn-inner tab-btn" data-tab="#tab-7">
                                <span class="icon flaticon-promotion"></span>
                                <span class="txt">Laporan Pelayanan PPID</span>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $this->include("frontend/_include/ppid_kecamatan/form_permohonan_informasi_publik.php") ?>
                <?= $this->include("frontend/_include/ppid_kecamatan/struktur_organisasi_ppid.php") ?>
                <?= $this->include("frontend/_include/ppid_kecamatan/tugas_fungsi_ppid.php") ?>
                <?= $this->include("frontend/_include/ppid_kecamatan/prosedur_pelayanan_informasi.php") ?>
                <?= $this->include("frontend/_include/ppid_kecamatan/waktu_biaya_layanan_informasi.php") ?>
                <?= $this->include("frontend/_include/ppid_kecamatan/daftar_informasi_publik.php") ?>
                <?= $this->include("frontend/_include/ppid_kecamatan/laporan_pelayanan_ppid.php") ?>

            </div>
        </div>
    </div>
</section>

<script>
    function scrollTab1() {
        document.getElementById("tab-1").scrollIntoView({
            behavior: "smooth"
        });
    }

    function scrollTab2() {
        document.getElementById("tab-2").scrollIntoView({
            behavior: "smooth"
        });
    }

    function scrollTab3() {
        document.getElementById("tab-3").scrollIntoView({
            behavior: "smooth"
        });
    }

    function scrollTab4() {
        document.getElementById("tab-4").scrollIntoView({
            behavior: "smooth"
        });
    }

    function scrollTab5() {
        document.getElementById("tab-5").scrollIntoView({
            behavior: "smooth"
        });
    }

    function scrollTab6() {
        document.getElementById("tab-6").scrollIntoView({
            behavior: "smooth"
        });
    }

    function scrollTab7() {
        document.getElementById("tab-7").scrollIntoView({
            behavior: "smooth"
        });
    }
</script>
<?= $this->endSection() ?>