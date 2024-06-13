<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Perangkat Kelurahan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Perangkat Kelurahan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="tabs-box faq-tabs">
            <div class="tabs-content">
                <div class="tab-buttons">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6" onclick="scrollTab1()">
                            <div class="btn-inner tab-btn" data-tab="#tab-1">
                                <span class="icon flaticon-maps-and-flags"></span>
                                <span class="txt">Profil Lurah</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" onclick="scrollTab2()">
                            <div class="btn-inner tab-btn" data-tab="#tab-2">
                                <span class="icon flaticon-layers"></span>
                                <span class="txt">Struktur Organisasi</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" onclick="scrollTab3()">
                            <div class="btn-inner tab-btn" data-tab="#tab-3">
                                <span class="icon flaticon-line-chart"></span>
                                <span class="txt">Tugas & Fungsi</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" onclick="scrollTab4()">
                            <div class="btn-inner tab-btn" data-tab="#tab-4">
                                <span class="icon flaticon-briefcase"></span>
                                <span class="txt">LMK</span>
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
                <?= $this->include("frontend/_include/pemerintahan/perangkat_kelurahan/profil_lurah.php") ?>
                <?= $this->include("frontend/_include/pemerintahan/perangkat_kelurahan/struktur_organisasi.php") ?>
                <?= $this->include("frontend/_include/pemerintahan/perangkat_kelurahan/tugas_fungsi.php") ?>
                <?= $this->include("frontend/_include/pemerintahan/perangkat_kelurahan/lmk.php") ?>

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
</script>
<?= $this->endSection() ?>