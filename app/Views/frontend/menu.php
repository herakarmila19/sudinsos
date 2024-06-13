<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Menu
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
function namaBulan($input)
{
    if ($input == 'Jan') {
        $output = 'Jan';
    } elseif ($input == 'Feb') {
        $output = 'Februari';
    } elseif ($input == 'Mar') {
        $output = 'Mar';
    } elseif ($input == 'Apr') {
        $output = 'Apr';
    } elseif ($input == 'May') {
        $output = 'Mei';
    } elseif ($input == 'Jun') {
        $output = 'Jun';
    } elseif ($input == 'Jul') {
        $output = 'Jul';
    } elseif ($input == 'Aug') {
        $output = 'Agu';
    } elseif ($input == 'Sep') {
        $output = 'Sep';
    } elseif ($input == 'Oct') {
        $output = 'Okt';
    } elseif ($input == 'Nov') {
        $output = 'Nov';
    } elseif ($input == 'Dec') {
        $output = 'Des';
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
?>

<section class="blog-banner">
    <div class="banner-inner" style="background-color: #222222;">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="meta-info clearfix">
                    <span class="fa fa-folder"></span>Menu &ensp;
                </div>
                <h1><?= $menuData['judul'] ?></h1>
                <div class="author-info">
                    <h6>Penulis : Admin Kominfo JS</h6>
                </div>
                <div class="other-info clearfix">
                    <div class="date"><span><?= namaHari(date('D', strtotime($menuData['created_date']))) ?>, <?= date('d', strtotime($menuData['created_date'])) ?> <?= namaBulan(date('M', strtotime($menuData['created_date']))) ?> <?= date('Y', strtotime($menuData['created_date'])) ?></span></div>
                    <div class="tags"><a href="#">Berintegritas, Kolaboratif, Akuntabel, Inovatif, Berkeadilan</a></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="content-inner">
                    <div class="single-post">
                        <div class="post-details">
                            <p>
                                <?= $menuData['isi_konten'] ?>
                            </p>
                        </div>

                        <div class="share-post">
                            <strong>Sebarkan Menu ini Kepada yang Lain</strong>
                            <ul class="links clearfix">
                                <li class="linkedin" onclick="tombolSalin()"><a href=" #"><span class="icon fa fa-share-alt"></span><span class="txt">Share</span></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">

                    <div class="sidebar-widget search-box">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Pencarian Berita</h4>
                            </div>
                            <form method="get" action="<?= base_url('berita-selatan/pencarian') ?>">
                                <div class="form-group">
                                    <input type="search" name="pencarian" value="" placeholder="Kata kunci..." required>
                                    <button type="submit"><span class="icon flaticon-magnifying-glass"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--Tags-->
                    <!-- <div class="sidebar-widget popular-tags">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Tag</h4>
                            </div>
                            <ul class="tags-list clearfix">
                                <li><a>DKI Jakarta</a></li>
                                <li><a>Jakarta Selatan</a></li>
                                <li><a>Kota Administrasi Jakarta Selatan</a></li>
                                <li><a>Gubernur DKI Jakarta</a></li>
                                <li><a>Walikota Jakarta Selatan</a></li>
                                <li><a>Wakil Walikota Jakarta Selatan</a></li>
                            </ul>
                        </div>
                    </div> -->

                    <!--Posts-->
                    <div class="sidebar-widget recent-posts">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Berita Terbaru</h4>
                            </div>

                            <div class="recent-posts-box">

                                <?php foreach ($beritaDataTerbaru as $data) : ?>
                                    <div class="post">
                                        <div class="inner">
                                            <figure class="post-thumb">
                                                <img src="<?= $data['thumbnail'] == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $data['thumbnail']) ? base_url('upload/thumbnail/' . $data['thumbnail']) : base_url('upload/default/berita-kosong.png')) ?>" alt="<?= $data['slug'] ?>">
                                            </figure>
                                            <div class="post-date"><?= namaHari(date('D', strtotime($data['created_date']))) ?>, <?= date('d', strtotime($data['created_date'])) ?> <?= namaBulan(date('M', strtotime($data['created_date']))) ?> <?= date('Y', strtotime($data['created_date'])) ?></div>
                                            <h5 class="title"><a href="<?= base_url('berita-selatan/detail/' . $data['slug']) ?>"><?= $data['judul'] ?></a></h5>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>

                </aside>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function tombolSalin() {
        var informasi = document.body.appendChild(document.createElement("textarea"));
        informasi.value =
            "<?= $menuData['judul'] ?>\n\n" +
            "Selengkapnya: " + window.location.href +
            "\n\nDibuat pada: <?= namaHari(date('D', strtotime($menuData['created_date']))) ?>, <?= date('d', strtotime($menuData['created_date'])) ?> <?= namaBulan(date('M', strtotime($menuData['created_date']))) ?> <?= date('Y', strtotime($menuData['created_date'])) ?>\n" +
            "\n#Sudin Kominfotik Jakarta Selatan";
        informasi.focus();
        informasi.select();
        document.execCommand('copy');
        informasi.parentNode.removeChild(informasi);
        Swal.fire({
            icon: "success",
            title: "Menu berhasil disalin",
            showConfirmButton: false,
            timer: 2000
        });
    }
</script>
<?= $this->endSection() ?>