<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('seo') ?>
<meta property="og:image" content="<?= $beritaData['thumbnail'] == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $beritaData['thumbnail']) ? base_url('upload/thumbnail/' . $beritaData['thumbnail']) : base_url('upload/default/berita-kosong.png')) ?>">
<meta name="description" content="<?= $beritaData['deskripsi'] ?>">
<meta name="keywords" content="<?= str_replace('-', ', ', $beritaData['slug']) ?>">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
<?= $beritaData['judul'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
    <meta content="<?= $beritaData['thumbnail'] == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $beritaData['thumbnail']) ? base_url('upload/thumbnail/' . $beritaData['thumbnail']) : base_url('upload/default/berita-kosong.png')) ?>" itemprop="url" />
</div>

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

$detailKategori = $kategori = new App\Models\CustomModel();
$detailKategori = $detailKategori->whereCustom('detail_berita_kategori', 'id_news', $beritaData['id_berita']);
if (!empty($detailKategori->id_kategori)) {
    $kategori = $kategori->whereCustom('kategori_berita', 'id_kategori', $detailKategori->id_kategori);
} else {
    $kategori = 'Tidak Terkategori';
}
?>

<section class="blog-banner">
    <div class="banner-inner" style="background-color: #222222;">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="meta-info clearfix">
                    <span class="fa fa-folder"></span><?= $kategori == 'Tidak Terkategori' ? 'Tidak Terkategori' : $kategori->nama_kategori ?> &ensp;/&ensp; <span class="fa fa-eye"></span> Dibaca <?= $beritaData['pembaca'] ?>
                </div>
                <h1><?= $beritaData['judul'] ?></h1>
                <div class="author-info">
                    <h6 style="text-decoration: none;">
                        <?php
                        $penulis = empty(explode(';', $beritaData['penulis'])[0]) ? 'Kosong' : explode(';', $beritaData['penulis'])[0];
                        $editor = empty(explode(';', $beritaData['penulis'])[1]) ? 'Kosong' : explode(';', $beritaData['penulis'])[1];
                        $fotografer = empty(explode(';', $beritaData['penulis'])[2]) ? 'Kosong' : explode(';', $beritaData['penulis'])[2];
                        ?>
                        Penulis : <?= $penulis ?> / Editor : <?= $editor ?> / Fotografer : <?= $fotografer ?>
                    </h6>
                </div>
                <div class="other-info clearfix">
                    <div class="date"><span><?= namaHari(date('D', strtotime($beritaData['publish_date']))) ?>, <?= date('d', strtotime($beritaData['publish_date'])) ?> <?= namaBulan(date('M', strtotime($beritaData['publish_date']))) ?> <?= date('Y', strtotime($beritaData['publish_date'])) ?></span></div>
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
                            <div class="main-image-box">
                                <figure class="image">
                                    <img src="<?= $beritaData['thumbnail'] == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $beritaData['thumbnail']) ? base_url('upload/thumbnail/' . $beritaData['thumbnail']) : base_url('upload/default/berita-kosong.png')) ?>" alt="<?= $beritaData['slug'] ?>">
                                </figure>
                            </div>
                            <p>
                                <?= $beritaData['isi_konten'] ?>
                            </p>
                        </div>

                        <div class="share-post">
                            <strong>Sebarkan Berita ini Kepada yang Lain</strong>
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
                            <form method="get" action="<?= base_url('berita/pencarian') ?>">
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
                                            <div class="post-date"><?= namaHari(date('D', strtotime($data['publish_date']))) ?>, <?= date('d', strtotime($data['publish_date'])) ?> <?= namaBulan(date('M', strtotime($data['publish_date']))) ?> <?= date('Y', strtotime($data['publish_date'])) ?></div>
                                            <h5 class="title"><a href="<?= base_url('berita/detail/' . $data['slug']) ?>"><?= $data['judul'] ?></a></h5>
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
            "*<?= $beritaData['judul'] ?>*\n\n" +
            "<?= $beritaData['deskripsi'] ?>...\n\n" +
            "Selengkapnya: " + window.location.href +
            "\n\n#Berita Selatan" +
            "\n#<?= namaHari(date('D', strtotime($beritaData['publish_date']))) ?>, <?= date('d', strtotime($beritaData['publish_date'])) ?> <?= namaBulan(date('M', strtotime($beritaData['publish_date']))) ?> <?= date('Y', strtotime($beritaData['publish_date'])) ?>";
        informasi.focus();
        informasi.select();
        document.execCommand('copy');
        informasi.parentNode.removeChild(informasi);
        Swal.fire({
            icon: "success",
            title: "Berita berhasil disalin",
            showConfirmButton: false,
            timer: 2000
        });
    }
</script>
<?= $this->endSection() ?>