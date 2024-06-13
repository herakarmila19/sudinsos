<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Wilayah Pemerintahan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Wilayah Pemerintahan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">
                Kota Administrasi Jakarta Selatan
            </div>
        </div>

        <div class="tabs-box faq-tabs">
            <div class="tabs-content">
                <div class="tab-buttons">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12" onclick="scrollTab1()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'kota-administrasi-jakarta-selatan' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-government"></span>
                                <span class="txt">Kota Administrasi Jakarta Selatan</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab2()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'tebet' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-leaf"></span>
                                <span class="txt">Tebet</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab3()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'setiabudi' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-building"></span>
                                <span class="txt">Setiabudi</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab4()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'mampang-prapatan' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-traffic-light"></span>
                                <span class="txt">Mampang Prapatan</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab5()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'pasar-minggu' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-balance"></span>
                                <span class="txt">Pasar Minggu</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab6()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'kebayoran-lama' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-museum-1"></span>
                                <span class="txt">Kebayoran Lama</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab7()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'cilandak' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-nature"></span>
                                <span class="txt">Cilandak</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab8()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'kebayoran-baru' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-museum"></span>
                                <span class="txt">Kebayoran Baru</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab9()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'pancoran' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-save"></span>
                                <span class="txt">Pancoran</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab10()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'jagakarsa' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-sheriff-badge"></span>
                                <span class="txt">Jagakarsa</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6" onclick="scrollTab11()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'pesanggrahan' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-real-estate"></span>
                                <span class="txt">Pesanggrahan</span>
                            </div>
                        </div>
						<div class="col-lg-12 col-md-12 col-sm-12" onclick="scrollTab12()">
                            <div class="btn-inner tab-btn <?= $wilayah == 'peta-penanaman-pohon' ? 'active-btn' : '' ?>">
                                <span class="icon flaticon-maps-and-flags"></span>
                                <span class="txt">Peta Penanaman Pohon</span>
                            </div>
                        </div>
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
        <div class="service-details row" id="scroll">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php if ($wilayah == 'kota-administrasi-jakarta-selatan') : ?>
                    <h3>Kota Administrasi Jakarta Selatan</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($kota['created_date'], $kota['modified_date']) ?>
                    </p>
                    <?= $kota['isi_konten'] ?>
                <?php elseif ($wilayah == 'tebet') : ?>
                    <h3>Kecamatan Tebet</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($tebet['created_date'], $tebet['modified_date']) ?>
                    </p>
                    <?= $tebet['isi_konten'] ?>
                <?php elseif ($wilayah == 'setiabudi') : ?>
                    <h3>Kecamatan Setiabudi</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($setiabudi['created_date'], $setiabudi['modified_date']) ?>
                    </p>
                    <?= $setiabudi['isi_konten'] ?>
                <?php elseif ($wilayah == 'mampang-prapatan') : ?>
                    <h3>Kecamatan Mampang Prapatan</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($mampangPrapatan['created_date'], $mampangPrapatan['modified_date']) ?>
                    </p>
                    <?= $mampangPrapatan['isi_konten'] ?>
                <?php elseif ($wilayah == 'pasar-minggu') : ?>
                    <h3>Kecamatan Pasar Minggu</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($pasarMinggu['created_date'], $pasarMinggu['modified_date']) ?>
                    </p>
                    <?= $pasarMinggu['isi_konten'] ?>
                <?php elseif ($wilayah == 'kebayoran-lama') : ?>
                    <h3>Kecamatan Kebayoran Lama</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($kebayoranLama['created_date'], $kebayoranLama['modified_date']) ?>
                    </p>
                    <?= $kebayoranLama['isi_konten'] ?>
                <?php elseif ($wilayah == 'cilandak') : ?>
                    <h3>Kecamatan Cilandak</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($cilandak['created_date'], $cilandak['modified_date']) ?>
                    </p>
                    <?= $cilandak['isi_konten'] ?>
                <?php elseif ($wilayah == 'kebayoran-baru') : ?>
                    <h3>Kecamatan Kebayoran Baru</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($kebayoranBaru['created_date'], $kebayoranBaru['modified_date']) ?>
                    </p>
                    <?= $kebayoranBaru['isi_konten'] ?>
                <?php elseif ($wilayah == 'pancoran') : ?>
                    <h3>Kecamatan Pancoran</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($pancoran['created_date'], $pancoran['modified_date']) ?>
                    </p>
                    <?= $pancoran['isi_konten'] ?>
                <?php elseif ($wilayah == 'jagakarsa') : ?>
                    <h3>Kecamatan Jagakarsa</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($jagakarsa['created_date'], $jagakarsa['modified_date']) ?>
                    </p>
                    <?= $jagakarsa['isi_konten'] ?>
                <?php elseif ($wilayah == 'pesanggrahan') : ?>
                    <h3>Kecamatan Pesanggrahan</h3>
                    <p>
                        Diperbaharui : <?= diperbaharui($pesanggrahan['created_date'], $pesanggrahan['modified_date']) ?>
                    </p>
                    <?= $pesanggrahan['isi_konten'] ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

<script>
    function scrollTab1() {
        location.href = "<?= base_url('pemerintahan/wilayah/kota-administrasi-jakarta-selatan#scroll') ?>";
    }

    function scrollTab2() {
        location.href = "<?= base_url('pemerintahan/wilayah/tebet#scroll') ?>";
    }

    function scrollTab3() {
        location.href = "<?= base_url('pemerintahan/wilayah/setiabudi#scroll') ?>";
    }

    function scrollTab4() {
        location.href = "<?= base_url('pemerintahan/wilayah/mampang-prapatan#scroll') ?>";
    }

    function scrollTab5() {
        location.href = "<?= base_url('pemerintahan/wilayah/pasar-minggu#scroll') ?>";
    }

    function scrollTab6() {
        location.href = "<?= base_url('pemerintahan/wilayah/kebayoran-lama#scroll') ?>";
    }

    function scrollTab7() {
        location.href = "<?= base_url('pemerintahan/wilayah/cilandak#scroll') ?>";
    }

    function scrollTab8() {
        location.href = "<?= base_url('pemerintahan/wilayah/kebayoran-baru#scroll') ?>";
    }

    function scrollTab9() {
        location.href = "<?= base_url('pemerintahan/wilayah/pancoran#scroll') ?>";
    }

    function scrollTab10() {
        location.href = "<?= base_url('pemerintahan/wilayah/jagakarsa#scroll') ?>";
    }

    function scrollTab11() {
        location.href = "<?= base_url('pemerintahan/wilayah/pesanggrahan#scroll') ?>";
    }

	function scrollTab12() {
        window.open("https://selatan.jakarta.go.id/modul/pklh/pohon/index.php");
    }
</script>
<?= $this->endSection() ?>