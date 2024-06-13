<section class="news-section">
    <div class="auto-container">
        <div class="sec-title with-separator">
            <h2>Info Terkini</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
                    class="cir c-3"></span></div>
        </div>

        <?php if ($beritaData != null) : ?>
        <div class="carousel-box" style="margin-top: -30px;">
            <div class="news-carousel owl-theme owl-carousel">
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

                foreach ($beritaData as $data) :
                    $detailKategori = $kategori = new App\Models\CustomModel();
                    $detailKategori = $detailKategori->whereCustom('detail_berita_kategori', 'id_news', $data['id_berita']);
                    if (!empty($detailKategori->id_kategori)) {
                        $kategori = $kategori->whereCustom('kategori_berita', 'id_kategori', $detailKategori->id_kategori);
                    } else {
                        $kategori = 'Tidak Terkategori';
                    }
                ?>
                <div class="news-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <img src="<?= $data['thumbnail'] == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $data['thumbnail']) ? base_url('upload/thumbnail/' . $data['thumbnail']) : base_url('upload/default/berita-kosong.png')) ?>"
                                    alt="<?= $data['slug'] ?>">
                            </figure>
                            <div class="hover-box">
                                <div class="link zoom-link">
                                    <a href="<?= $data['thumbnail'] == null ? base_url('upload/default/berita-kosong.png') : (file_exists('upload/thumbnail/' . $data['thumbnail']) ? base_url('upload/thumbnail/' . $data['thumbnail']) : base_url('upload/default/berita-kosong.png')) ?>"
                                        class="lightbox-image"><span class="icon flaticon-zoom-in"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-box">
                            <div class="upper-info">
                                <h4><a
                                        href="<?= base_url('berita/detail/' . $data['slug']) ?>"><?= $data['judul'] ?></a>
                                </h4>
                                <div class="cat-info"><span
                                        class="fa fa-folder"></span><?= $kategori == 'Tidak Terkategori' ? 'Tidak Terkategori' : $kategori->nama_kategori ?>
                                </div>
                            </div>
                            <div class="meta-info clearfix">
                                <div class="author-info clearfix">
                                    <div class="author-icon"><span class="flaticon-calendar-1"></span></div>
                                    <!-- <div class="author-title">
                                            < ?php
                                            $penulis = empty(explode(';', $data['penulis'])[0]) ? 'Kosong' : explode(';', $data['penulis'])[0];
                                            $editor = empty(explode(';', $data['penulis'])[1]) ? 'Kosong' : explode(';', $data['penulis'])[1];
                                            $fotografer = empty(explode(';', $data['penulis'])[2]) ? 'Kosong' : explode(';', $data['penulis'])[2];
                                            ?>
                                            Penulis : < ?= $penulis ?>
                                            <br>
                                            Editor : < ?= $editor ?>
                                            <br>
                                            Fotografer : < ?= $fotografer ?>
                                        </div> -->
                                    <div class="date" style="padding-top: 10px;">
                                        <?= namaHari(date('D', strtotime($data['publish_date']))) ?>,
                                        <?= date('d', strtotime($data['publish_date'])) ?>
                                        <?= namaBulan(date('M', strtotime($data['publish_date']))) ?>
                                        <?= date('Y', strtotime($data['publish_date'])) ?></div>
                                </div>
                                <div class="comments-info">
                                    <span class="fa fa-eye"></span> <?= $data['pembaca'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php else : ?>
        <div class="service-details" style="margin: 0px 20px 0px 20px; overflow-x: auto;">
            <table id="table-style">
                <tr>
                    <th>Data Tidak Tersedia</th>
                </tr>
            </table>
        </div>
        <?php endif; ?>
    </div>
</section>