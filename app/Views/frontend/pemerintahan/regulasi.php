<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Regulasi Pemerintahan
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<!-- Empty -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- Empty -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Regulasi Pemerintahan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="row clearfix">

            <div class="left-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="col-inner">

                    <div class="carousel-box">

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

                        if (!empty($regulasiData)) :
                            foreach ($regulasiData as $no => $data) :
                        ?>
                                <div class="event-block">
                                    <div class="inner-box">
                                        <div class="content-box">
                                            <div class="date-box">
                                                <div class="date">
                                                    <span class="day"><?= date('d', strtotime($data['created_date'])) ?></span>
                                                    <span class="month"><?= namaBulan(date('F', strtotime($data['created_date']))) ?>
                                                        <br><?= date('Y', strtotime($data['created_date'])) ?></span>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="cat-info">
                                                    <a>Dokumen: <?= $data['path_regulasi'] ?></a>
                                                </div>
                                                <h3><a><?= $data['title'] ?></a></h3>
                                                <div class="location">
                                                    Telah diunduh sebanyak <?= $data['didownload'] ?> Kali
                                                </div>
                                                <div class="read-more">
                                                    <a href="<?= base_url('pemerintahan/regulasi/' . $data['title']) ?>">
                                                        Unduh
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="service-details" style="margin: 0px 20px 0px 20px;">
                                <div class="download-links">
                                    <ul>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <span class="icon fa fa-window-close"></span>
                                                <span class="ttl">Data belum tersedia</span>
                                                <span class="info">[ Kosong ]</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Pagination -->
                        <?= $pager->links('regulasi', 'template_pager'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>