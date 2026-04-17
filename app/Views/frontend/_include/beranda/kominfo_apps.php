<section class="apps-section">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Kominfo Apps</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
        </div>
        <div class="apps-carousel owl-theme owl-carousel">
            <?php if (!empty($kominfo_apps)) : ?>
                <?php foreach ($kominfo_apps as $app) : ?>
                    <div class="apps-box">
                        <div class="apps-inner">
                            <a href="<?= $app['link_aplikasi'] ?>" target="_blank">
                                <img src="<?= base_url('upload/aplikasi/' . $app['icon_aplikasi']) ?>" alt="<?= $app['nama_aplikasi'] ?>">
                                <div class="apps-title"><?= $app['nama_aplikasi'] ?></div>
                                <?php if (!empty($app['deskripsi'])) : ?>
                                    <div class="apps-tooltip"><?= nl2br($app['deskripsi']) ?></div>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="apps-empty">
                    <p>Aplikasi belum tersedia. Silakan tambahkan aplikasi di CMS.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.apps-section {
    padding: 40px 0;
}

.apps-carousel {
    margin-top: 30px;
    display: flex !important;
}

.apps-box {
    padding: 15px;
    text-align: center;
    min-height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.apps-inner {
    width: 100%;
    transition: all 0.3s ease;
}

.apps-inner a {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s ease;
    position: relative;
}

.apps-inner a:hover {
    transform: translateY(-5px);
}

.apps-inner img {
    width: 120px;
    height: 120px;
    object-fit: contain;
    margin-bottom: 12px;
    transition: filter 0.3s ease;
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
}

.apps-inner a:hover img {
    filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
}

.apps-tooltip {
    position: absolute;
    left: 50%;
    bottom: -72px;
    transform: translateX(-50%);
    width: 220px;
    padding: 10px 12px;
    background: rgba(0, 0, 0, 0.85);
    color: #fff;
    font-size: 12px;
    line-height: 1.4;
    border-radius: 8px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.2s ease, visibility 0.2s ease;
    z-index: 2;
    text-align: center;
}

.apps-inner a:hover .apps-tooltip {
    opacity: 1;
    visibility: visible;
}

.apps-title {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    line-height: 1.4;
    word-wrap: break-word;
    max-width: 150px;
    margin: 0 auto;
}

.apps-empty {
    text-align: center;
    padding: 40px 20px;
    color: #999;
    font-size: 14px;
}

/* Owl Carousel Adjustments */
.owl-carousel.apps-carousel .owl-item {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

@media (max-width: 768px) {
    .apps-inner img {
        width: 90px;
        height: 90px;
    }

    .apps-title {
        font-size: 13px;
    }

    .apps-box {
        min-height: 150px;
    }
}

@media (max-width: 576px) {
    .apps-inner img {
        width: 70px;
        height: 70px;
    }

    .apps-title {
        font-size: 12px;
    }

    .apps-box {
        padding: 10px;
        min-height: 120px;
    }
}
</style>
