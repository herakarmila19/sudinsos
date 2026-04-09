<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
<?= $menu['judul'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2><?= $menu['judul'] ?></h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="row clearfix">
            <div class="tab-col col-lg-12 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="accordion-box">
                        <div class="accordion">
                            <div class="acc-content">
                                <div class="content">
                                    <section class="history-section pt-0">
                                        <div class="auto-container">
                                            <?php if (empty($menu['isi_konten'])) : ?>
                                                <div class="alert alert-info text-center" style="margin-top:20px; padding:30px;">
                                                    Oopss! Informasi untuk halaman <b><?= $menu['judul'] ?></b> saat ini sedang dalam tahap penyiapan dan akan segera hadir.
                                                </div>
                                            <?php else : ?>
                                                <?= str_replace('[BASE_URL]', rtrim(base_url(), '/'), $menu['isi_konten']) ?>
                                            <?php endif; ?>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
