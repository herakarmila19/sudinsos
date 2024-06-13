<section class="banner-section-two">
    <div class="banner-carousel-two owl-theme owl-carousel">

        <?php if ($slideData != null) : ?>
        <?php foreach ($slideData as $no => $data) : ?>
        <div class="slide-item">
            <div class="image-layer" style="background-image: url(upload/slide/<?= $data['gambar'] ?>);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content clearfix">
                        <div class="inner" style="background: rgba(0, 0, 0, 0.4);">
                            <h1>
                                <?= $data['judul'] ?>
                            </h1>
                            <div class="text">
                                <?= $data['deskripsi'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <div class="slide-item">
            <div class="image-layer" style="background-image: url(upload/default/slide-kosong.jpeg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content clearfix">
                        <div class="inner" style="background: rgba(0, 0, 0, 0.4);">
                            <h1>
                                Sukses Jakarta Untuk Indonesia
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>