<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Pejabat Pemerintahan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Pejabat Pemerintahan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="tabs-box faq-tabs">
            <div class="tabs-content">
                <div class="tab-buttons">
                    <div class="row clearfix">
                        <!-- <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab1()">
                            <div class="btn-inner tab-btn <?= $pejabat == 'walikota-terdahulu' ? 'active-btn' : '' ?>" data-tab="#tab-1">
                                <span class="icon flaticon-picture"></span>
                                <span class="txt">Walikota Terdahulu</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab2()">
                            <div class="btn-inner tab-btn <?= $pejabat == 'walikota' ? 'active-btn' : '' ?>" data-tab="#tab-2">
                                <span class="icon flaticon-government"></span>
                                <span class="txt">Walikota</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab3()">
                            <div class="btn-inner tab-btn <?= $pejabat == 'wakil-walikota' ? 'active-btn' : '' ?>" data-tab="#tab-3">
                                <span class="icon flaticon-city-hall"></span>
                                <span class="txt">Wakil Walikota</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab4()">
                            <div class="btn-inner tab-btn <?= $pejabat == 'pejabat-teras' ? 'active-btn' : '' ?>" data-tab="#tab-4">
                                <span class="icon flaticon-user"></span>
                                <span class="txt">Pejabat Teras</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab5()">
                            <div class="btn-inner tab-btn <?= $pejabat == 'eselon-iii' ? 'active-btn' : '' ?>" data-tab="#tab-5">
                                <span class="icon flaticon-user-1"></span>
                                <span class="txt">ESELON III</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab6()">
                            <div class="btn-inner tab-btn <?= $pejabat == 'camat-lurah' ? 'active-btn' : '' ?>" data-tab="#tab-6">
                                <span class="icon flaticon-user-3"></span>
                                <span class="txt">Camat & Lurah</span>
                            </div>
                        </div> -->

                        <!-- START CAMAT & WAKIL CAMAT -->
                        <div class="col-lg-6 col-md-6 col-sm-6" onclick="scrollTab7()">
                            <div class="btn-inner tab-btn <?= $pejabat == 'camat' ? 'active-btn' : '' ?>" data-tab="#tab-6">
                                <span class="icon flaticon-user-3"></span>
                                <span class="txt">Camat</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" onclick="scrollTab8()">
                            <div class="btn-inner tab-btn <?= $pejabat == 'wakil-camat' ? 'active-btn' : '' ?>" data-tab="#tab-6">
                                <span class="icon flaticon-user-3"></span>
                                <span class="txt">Wakil Camat</span>
                            </div>
                        </div>
                        <!-- END CAMAT & WAKIL CAMAT -->
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
                <div id="scroll">
                    <?php if ($pejabat == 'walikota-terdahulu') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/walikota_terdahulu.php") ?>
                    <?php elseif ($pejabat == 'walikota') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/walikota.php") ?>
                    <?php elseif ($pejabat == 'wakil-walikota') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/wakil_walikota.php") ?>
                    <?php elseif ($pejabat == 'pejabat-teras') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/pejabat_teras.php") ?>
                    <?php elseif ($pejabat == 'eselon-iii') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/eselon_iii.php") ?>
                    <?php elseif ($pejabat == 'camat-lurah') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/camat_lurah.php") ?>
                        <!-- Kecamatan -->
                    <?php elseif ($pejabat == 'kecamatan-tebet') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/tebet.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-setiabudi') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/setiabudi.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-mampang-prapatan') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/mampang_prapatan.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-pasar-minggu') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/pasar_minggu.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-kebayoran-lama') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/kebayoran_lama.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-cilandak') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/cilandak.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-kebayoran-baru') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/kebayoran_baru.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-pancoran') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/pancoran.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-jagakarsa') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/jagakarsa.php") ?>
                    <?php elseif ($pejabat == 'kecamatan-pesanggrahan') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/kecamatan/pesanggrahan.php") ?>

                        <!-- START CAMAT & WAKLI CAMAT -->
                    <?php elseif ($pejabat == 'camat') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/camat.php") ?>
                    <?php elseif ($pejabat == 'wakil-camat') : ?>
                        <?= $this->include("frontend/_include/pemerintahan/pejabat/wakil_camat.php") ?>
                    <?php endif; ?>
                    <!-- END CAMAT & WAKIL CAMAT -->
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    function scrollTab1() {
        location.href = "<?= base_url('pemerintahan/pejabat/walikota-terdahulu#scroll') ?>";
    }

    function scrollTab2() {
        location.href = "<?= base_url('pemerintahan/pejabat/walikota#scroll') ?>";
    }

    function scrollTab3() {
        location.href = "<?= base_url('pemerintahan/pejabat/wakil-walikota#scroll') ?>";
    }

    function scrollTab4() {
        location.href = "<?= base_url('pemerintahan/pejabat/pejabat-teras#scroll') ?>";
    }

    function scrollTab5() {
        location.href = "<?= base_url('pemerintahan/pejabat/eselon-iii#scroll') ?>";
    }

    function scrollTab6() {
        location.href = "<?= base_url('pemerintahan/pejabat/camat-lurah#scroll') ?>";
    }

    function scrollKecamatan1() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-tebet#scroll') ?>";
    }

    function scrollKecamatan2() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-setiabudi#scroll') ?>";
    }

    function scrollKecamatan3() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-mampang-prapatan#scroll') ?>";
    }

    function scrollKecamatan4() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-pasar-minggu#scroll') ?>";
    }

    function scrollKecamatan5() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-kebayoran-lama#scroll') ?>";
    }

    function scrollKecamatan6() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-cilandak#scroll') ?>";
    }

    function scrollKecamatan7() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-kebayoran-baru#scroll') ?>";
    }

    function scrollKecamatan8() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-pancoran#scroll') ?>";
    }

    function scrollKecamatan9() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-jagakarsa#scroll') ?>";
    }

    function scrollKecamatan10() {
        location.href = "<?= base_url('pemerintahan/pejabat/kecamatan-pesanggrahan#scroll') ?>";
    }

    //  START CAMAT & WAKIL CAMAT
    function scrollTab7() {
        location.href = "<?= base_url('pemerintahan/pejabat/camat#scroll') ?>";
    }

    function scrollTab8() {
        location.href = "<?= base_url('pemerintahan/pejabat/wakil-camat#scroll') ?>";
    }
    // END CAMAT & WAKIL CAMAT
</script>
<?= $this->endSection() ?>