<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Video - Berita Selatan
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="portfolio-section portfolio-mixitup">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Video Selatan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>
        <div class="mixit-gallery filter-gallery">
            <div class="filter-list row clearfix">


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

                function namaHari($input)
                {
                    if ($input == 'Sun') {
                        $output = 'Ahad';
                    } elseif ($input == 'Mon') {
                        $output = 'Senin';
                    } elseif ($input == 'Tue') {
                        $output = 'Selasa';
                    } elseif ($input == 'Wed') {
                        $output = 'Rabu';
                    } elseif ($input == 'Thu') {
                        $output = 'Kamis';
                    } elseif ($input == 'Fri') {
                        $output = 'Jum\'at';
                    } elseif ($input == 'Sat') {
                        $output = 'Sabtu';
                    }

                    return $output;
                };

                foreach ($videoData as $data) :
                    if (strpos($data['path_video'], "embed/") !== false) {
                        $tmp1 = explode("embed/", $data['path_video']);
                        $tmp2 = substr($tmp1[1], 0, 11);
                    } else {
                        $tmp2 = '';
                    }
                ?>
                    <div class="gallery-block mix all tour industry col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image-box">
                                <figure class="image">
                                    <figure class="image">
                                        <img src="https://img.youtube.com/vi/<?= $tmp2; ?>/sddefault.jpg" alt="<?= $data['judul_video'] ?>">
                                    </figure>
                                    <div class="zoom-btn">
                                        <a class="lightbox-image zoom-link" href="https://img.youtube.com/vi/<?= $tmp2; ?>/sddefault.jpg" data-fancybox="gallery"><span class="icon flaticon-zoom-in"></span></a>
                                    </div>
                                </figure>
                            </div>
                            <div class="lower-box">
                                <h5><a target="_blank" href="<?= base_url('berita-selatan/galeri/video/' . $data['id_video']) ?>"><?= $data['judul_video'] ?></a></h5>
                                <h6>
                                    <?= namaHari(date('D', strtotime($data['created_date']))) ?>,
                                    <?= date('d', strtotime($data['created_date'])) ?>
                                    <?= namaBulan(date('F', strtotime($data['created_date']))) ?>
                                    <?= date('Y', strtotime($data['created_date'])) ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <?= $pager->links('video', 'template_pager'); ?>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('public/assets/js/mixitup.js') ?> "></script>
<?= $this->endSection() ?>