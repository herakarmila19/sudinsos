<section class="testimonials-section">
    <div class="auto-container">
        <div class="carousel-box">
            <div class="testimonial-carousel owl-theme owl-carousel">

                <?php foreach ($visiMisiData as $data) : ?>
                    <div class="slide-item">
                        <div class="inner">
                            <div class="info clearfix">
                                <div class="author-thumb"><img src="<?= base_url('upload/visi_misi/' . $data['gambar']) ?>"></div>
                                <div class="name"><?= $data['nama'] ?></div>
                                <div class="designation"><?= $data['jabatan'] ?></div>
                            </div>
                            <div class="text">
                                <?= $data['visi_misi'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

</section>