<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Pencarian - Berita Selatan
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Pencarian - Berita Selatan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="sidebar-page-container pt-2">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Side-->
                    <div class="content-side col-lg-8 col-md-12 col-sm-12">
                        <div class="content-inner">
                            <div class="blog-posts">
                                <div class="row clearfix">

                                    <?php
                                    $uri = service('uri');

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

                                    if (!empty($beritaData)) :
                                        foreach ($beritaData as $data) :
                                            $detailKategori = $kategori = new App\Models\CustomModel();
                                            $detailKategori = $detailKategori->whereCustom('detail_berita_kategori', 'id_news', $data['id_berita']);
                                            if (!empty($detailKategori->id_kategori)) {
                                                $kategori = $kategori->whereCustom('kategori_berita', 'id_kategori', $detailKategori->id_kategori);
                                            } else {
                                                $kategori = 'Tidak Terkategori';
                                            }
                                    ?>
                                            <div class="news-block col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image">
                                                            <img src="<?= $data['thumbnail'] == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $data['thumbnail']) ? base_url('upload/thumbnail/' . $data['thumbnail']) : base_url('upload/default/berita-kosong.png')) ?>" alt="<?= $data['slug'] ?>">
                                                        </figure>
                                                        <div class="hover-box">
                                                            <div class="link zoom-link">
                                                                <a href="<?= $data['thumbnail'] == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $data['thumbnail']) ? base_url('upload/thumbnail/' . $data['thumbnail']) : base_url('upload/default/berita-kosong.png')) ?>" class="lightbox-image"><span class="icon flaticon-zoom-in"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <div class="upper-info">
                                                            <h4><a href="<?= base_url('berita-selatan/detail/' . $data['slug']) ?>"><?= $data['judul'] ?></a></h4>
                                                            <div class="cat-info"><span class="fa fa-folder"></span><?= $kategori == 'Tidak Terkategori' ? 'Tidak Terkategori' : $kategori->nama_kategori ?></div>
                                                        </div>
                                                        <div class="meta-info clearfix">
                                                            <div class="author-info clearfix">
                                                                <div class="author-icon"><span class="flaticon-calendar-1"></span></div>
                                                                <div class="author-title">
                                                                    <?php
                                                                    $penulis = empty(explode(';', $data['penulis'])[0]) ? 'Kosong' : explode(';', $data['penulis'])[0];
                                                                    $editor = empty(explode(';', $data['penulis'])[1]) ? 'Kosong' : explode(';', $data['penulis'])[1];
                                                                    $fotografer = empty(explode(';', $data['penulis'])[2]) ? 'Kosong' : explode(';', $data['penulis'])[2];
                                                                    ?>
                                                                    Penulis : <?= $penulis ?>
                                                                    <br>
                                                                    Editor : <?= $editor ?>
                                                                    <br>
                                                                    Fotografer : <?= $fotografer ?>
                                                                </div>
                                                                <div class="date"><?= namaHari(date('D', strtotime($data['publish_date']))) ?>, <?= date('d', strtotime($data['publish_date'])) ?> <?= namaBulan(date('M', strtotime($data['publish_date']))) ?> <?= date('Y', strtotime($data['publish_date'])) ?></div>
                                                            </div>
                                                            <div class="comments-info">
                                                                <span class="fa fa-eye"></span> <?= $data['pembaca'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="news-block col-md-12 col-sm-12" style="background-color: #222222; color: white;">
                                            <div class="inner-box">
                                                <div class="lower-box text-center">
                                                    <h4>Mohon Maaf, Berita Selatan yang Anda cari tidak ditemukan</h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <!-- Pagination -->
                            <?php
                            echo $pager->links('pencarian', 'template_pager');
                            ?>

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
                                                    <div class="post-date"><?= namaHari(date('D', strtotime($data['publish_date']))) ?>, <?= date('d', strtotime($data['publish_date'])) ?> <?= namaBulan(date('M', strtotime($data['publish_date']))) ?> <?= date('Y', strtotime($data['publish_date'])) ?></div>
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
    </div>
</section>

<?= $this->endSection() ?>