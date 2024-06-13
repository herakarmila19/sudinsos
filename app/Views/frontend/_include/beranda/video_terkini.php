<section class="highlights-section">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Video Terkini</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
        </div>
        <div class="carousel-outer">
            <div class="hi-carousel owl-theme owl-carousel" style="margin-top: -20px;">

                <?php foreach ($videoData as $data) :
                    if (strpos($data['path_video'], "embed/") !== false) {
                        $tmp1 = explode("embed/", $data['path_video']);
                        $tmp2 = substr($tmp1[1], 0, 11);
                    } else {
                        $tmp2 = '';
                    }
                ?>
                    <div class="hi-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a target="_blank" href="<?= base_url('berita-selatan/galeri/video/' . $data['id_video']) ?>"><img src="https://img.youtube.com/vi/<?= $tmp2; ?>/sddefault.jpg" alt="<?= $data['judul_video'] ?>"></a></figure>
                                <div class="image-cap clearfix pt-3 pb-1">
                                    <p>
                                        <a target="_blank" href="<?= base_url('berita-selatan/galeri/video/' . $data['id_video']) ?>" style="color: white !important;">
                                            <?= $data['judul_video'] ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>