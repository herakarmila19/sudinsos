<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Video - Berita Selatan
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<style>
    .image-box,
    .image,
    iframe {
        width: 100%;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="portfolio-section portfolio-mixitup">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2><?= $videoData['judul_video'] ?></h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">
                <?= namaHari(date('D', strtotime($videoData['created_date']))) ?>,
                <?= date('d', strtotime($videoData['created_date'])) ?>
                <?= namaBulan(date('F', strtotime($videoData['created_date']))) ?>
                <?= date('Y', strtotime($videoData['created_date'])) ?>
            </div>
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

                $tmp1 = explode("embed/", $videoData['path_video']);
                $tmp2 = substr($tmp1[1], 0, 11);

                $video = explode('embed-', $videoData['path_video']);
                ?>

                <div class="gallery-block mix all tour industry col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image-box">
                            <figure class="image" width="100%">
                                <?= $video[1] ?>
                            </figure>
                        </div>
                        <div class="lower-box px-0" style="text-align: justify;">
                            <h5><?= $videoData['deskripsi'] ?></h5>
                            <br>
                            <h5><b>Dilihat : <?= $videoData['pembaca'] ?> Pengunjung</b></h5>
                        </div>

                        <div class="share-post">
                            <strong>Sebarkan Video ini Kepada yang Lain</strong>
                            <ul class="links clearfix">
                                <li class="linkedin" onclick="tombolSalin()"><a href=" #"><span class="icon fa fa-share-alt"></span><span class="txt">Share</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('public/assets/js/mixitup.js') ?> "></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function tombolSalin() {
        var informasi = document.body.appendChild(document.createElement("textarea"));
        informasi.value =
            "<?= $videoData['judul_video'] ?>\n\n" +
            "Selengkapnya: " + window.location.href +
            "\n\nDibuat pada: <?= namaHari(date('D', strtotime($videoData['created_date']))) ?>, <?= date('d', strtotime($videoData['created_date'])) ?> <?= namaBulan(date('F', strtotime($videoData['created_date']))) ?> <?= date('Y', strtotime($videoData['created_date'])) ?>\n" +
            "\n#Sudin Kominfotik Jakarta Selatan";
        informasi.focus();
        informasi.select();
        document.execCommand('copy');
        informasi.parentNode.removeChild(informasi);
        Swal.fire({
            icon: "success",
            title: "Video berhasil disalin",
            showConfirmButton: false,
            timer: 2000
        });
    }
</script>
<?= $this->endSection() ?>