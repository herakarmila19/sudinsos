<section class="instagram-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <h2>Info Grafis dan Kegiatan</h2>
            <div class="lower-text" style="margin-top: -10px;">Tampilkan postingan Instagram melalui CMS</div>
        </div>
        <div class="row clearfix">
            <div class="instagram-block col-lg-6 col-md-12 col-sm-12">
                <div class="instagram-card">
                    <div class="instagram-header">
                        <h3>Infografis</h3>
                    </div>
                    <div class="instagram-content">
                        <?php if (!empty($infografis) && !empty($infografis['isi_konten'])) : ?>
                            <?= str_replace('[BASE_URL]', rtrim(base_url(), '/'), $infografis['isi_konten']) ?>
                        <?php else : ?>
                            <div class="instagram-carousel owl-theme owl-carousel">
                                <div class="instagram-slide">
                                    <div class="instagram-embed-wrapper">
                                        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/C4FjPNzrft8/?img_index=1" data-instgrm-version="14" data-instgrm-captioned>
                                            <a href="https://www.instagram.com/p/C4FjPNzrft8/?img_index=1"></a>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="instagram-slide">
                                    <div class="instagram-embed-wrapper">
                                        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/C5XgYA0LOZa/?img_index=1" data-instgrm-version="14" data-instgrm-captioned>
                                            <a href="https://www.instagram.com/p/C5XgYA0LOZa/?img_index=1"></a>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="instagram-slide">
                                    <div class="instagram-embed-wrapper">
                                        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/C8eGKwsyTJH/?img_index=1" data-instgrm-version="14" data-instgrm-captioned>
                                            <a href="https://www.instagram.com/p/C8eGKwsyTJH/?img_index=1"></a>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="instagram-block col-lg-6 col-md-12 col-sm-12">
                <div class="instagram-card">
                    <div class="instagram-header">
                        <h3>Kegiatan</h3>
                    </div>
                    <div class="instagram-content">
                        <?php if (!empty($kegiatan) && !empty($kegiatan['isi_konten'])) : ?>
                            <div class="instagram-embed-wrapper">
                                <?= str_replace('[BASE_URL]', rtrim(base_url(), '/'), $kegiatan['isi_konten']) ?>
                            </div>
                        <?php else : ?>
                            <div class="instagram-placeholder">Konten Kegiatan belum tersedia. Silakan tambahkan embed Instagram di CMS.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.instagram-section {
    margin-top: 40px;
    margin-bottom: 40px;
}
.instagram-card {
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-radius: 16px;
    box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.05);
    padding: 22px;
    min-height: 420px;
    display: flex;
    flex-direction: column;
}
.instagram-header {
    margin-bottom: 18px;
}
.instagram-header h3 {
    font-size: 22px;
    font-weight: 700;
    margin: 0;
}
.instagram-content {
    flex: 1;
    min-height: 360px;
    display: block;
    padding: 12px 0;
}
.instagram-carousel {
    width: 100%;
}

.instagram-slide {
    display: block !important;
    width: 100%;
    min-height: 360px;
}

.instagram-embed-wrapper {
    width: 100%;
    display: block;
}

.instagram-embed-wrapper blockquote.instagram-media {
    max-width: 100% !important;
    width: 100% !important;
    min-height: 360px !important;
    margin: 0 auto !important;
    border: none !important;
}

.instagram-embed-wrapper iframe {
    max-width: 100% !important;
    width: 100% !important;
    min-height: 360px !important;
    border: none;
    border-radius: 12px;
}

.instagram-embed-wrapper img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    object-fit: cover;
}
.instagram-placeholder {
    color: #777;
    font-size: 14px;
    line-height: 1.6;
    padding: 28px 18px;
    background: #f9f9f9;
    border-radius: 12px;
    text-align: center;
}
@media (max-width: 767px) {
    .instagram-card {
        min-height: auto;
        margin-bottom: 20px;
    }
    .instagram-content {
        min-height: auto;
        padding: 20px 0;
    }
}
</style>

<script>
// Memproses Instagram embed setelah jQuery dan Instagram script siap
document.addEventListener('DOMContentLoaded', function() {
    function initInstagramCarousel() {
        if (typeof jQuery === 'undefined' || typeof jQuery().owlCarousel !== 'function') {
            setTimeout(initInstagramCarousel, 100);
            return;
        }

        $('.instagram-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            items: 1,
            responsive: {
                0: { items: 1 },
                600: { items: 1 },
                1000: { items: 1 }
            }
        });
    }

    function processInstagramEmbeds() {
        if (window.instgrm && window.instgrm.Embeds && typeof window.instgrm.Embeds.process === 'function') {
            window.instgrm.Embeds.process();
        } else {
            setTimeout(processInstagramEmbeds, 200);
        }
    }

    initInstagramCarousel();
    processInstagramEmbeds();
});
</script>