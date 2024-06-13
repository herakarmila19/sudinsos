<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Profil PPID Jak-Sel
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Profil PPID Jak-Sel</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Pejabat Pengelola Informasi dan Dokumentasi (PPID) Sekretariat Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="tabs-box faq-tabs">
            <div class="tabs-content">
                <div class="tab-buttons">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-4 col-sm-6" onclick="scrollTab1()">
                            <div class="btn-inner tab-btn" data-tab="#tab-1">
                                <span class="icon flaticon-information"></span>
                                <span class="txt">Tentang</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6" onclick="scrollTab2()">
                            <div class="btn-inner tab-btn" data-tab="#tab-2">
                                <span class="icon flaticon-sheriff-badge"></span>
                                <span class="txt">Dasar Hukum</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6" onclick="scrollTab3()">
                            <div class="btn-inner tab-btn" data-tab="#tab-3">
                                <span class="icon flaticon-layers"></span>
                                <span class="txt">Struktur Organisasi</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6" onclick="scrollTab4()">
                            <div class="btn-inner tab-btn" data-tab="#tab-4">
                                <span class="icon flaticon-leaf"></span>
                                <span class="txt">Visi & Misi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-buttons" style="margin-top: -40px;">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab5()">
                            <div class="btn-inner tab-btn" data-tab="#tab-5">
                                <span class="icon flaticon-checklist"></span>
                                <span class="txt">Maklumat Informasi</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab6()">
                            <div class="btn-inner tab-btn" data-tab="#tab-6">
                                <span class="icon flaticon-checklist-1"></span>
                                <span class="txt">Standard Operating Procedure</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab7()">
                            <div class="btn-inner tab-btn" data-tab="#tab-7">
                                <span class="icon flaticon-contact"></span>
                                <span class="txt">Kontak</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LINK Include -->
                <?php
                function namaBulan($input)
                {
                    if ($input == 'January') {
                        $output = 'Januari';
                    } elseif ($input == 'February') {
                        $output = 'Februari';
                    } elseif ($input == 'March') {
                        $output = 'Maret';
                    } elseif ($input == 'April') {
                        $output = 'April';
                    } elseif ($input == 'May') {
                        $output = 'Mei';
                    } elseif ($input == 'June') {
                        $output = 'Juni';
                    } elseif ($input == 'July') {
                        $output = 'Juli';
                    } elseif ($input == 'August') {
                        $output = 'Agustus';
                    } elseif ($input == 'September') {
                        $output = 'September';
                    } elseif ($input == 'October') {
                        $output = 'Oktober';
                    } elseif ($input == 'November') {
                        $output = 'November';
                    } elseif ($input == 'December') {
                        $output = 'Desember';
                    }

                    return $output;
                };

                function diperbaharui($created_date, $modified_date)
                {
                    if ($created_date <= $modified_date) {
                        $tanggal_diperbaharui = $modified_date;
                    } else {
                        $tanggal_diperbaharui = $created_date;
                    }

                    $tanggal_diperbaharui =
                        date('d', strtotime($tanggal_diperbaharui)) . ' ' .
                        namaBulan(date('F', strtotime($tanggal_diperbaharui))) . ' ' .
                        date('Y', strtotime($tanggal_diperbaharui));

                    return $tanggal_diperbaharui;
                }
                ?>
                <?= $this->include("frontend/_include/ppid/profil/tentang.php") ?>
                <?= $this->include("frontend/_include/ppid/profil/dasar_hukum.php") ?>
                <?= $this->include("frontend/_include/ppid/profil/struktur_organisasi.php") ?>
                <?= $this->include("frontend/_include/ppid/profil/visi_misi.php") ?>
                <?= $this->include("frontend/_include/ppid/profil/maklumat_informasi.php") ?>
                <?= $this->include("frontend/_include/ppid/profil/standard_operating_procedure.php") ?>
                <?= $this->include("frontend/_include/ppid/profil/kontak.php") ?>

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