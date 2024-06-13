<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('public/assets/css/slider.css') ?>" rel="stylesheet">
<style>
@media (max-width: 600px) {
    .testimonials-section .slide-item .info {
        padding: 0px !important;
        margin-bottom: 10px !important;
        text-align: center !important;
    }

    .testimonials-section .slide-item .author-thumb {
        position: relative !important;
        margin: auto !important;
    }

    .testimonials-section .slide-item .info .name {
        padding-top: 20px !important;
    }
}
</style>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?php if (!empty($bannerData)) : ?>
<script>
window.onload = function() {
    $("#breakingnews").click();
}
</script>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="search-btn search-btn-one" hidden>
    <button type="button" class="theme-btn search-toggler" id="breakingnews">
    </button>
</div>

<?php if (!empty($bannerData)) : ?>
<div id="search-popup" class="search-popup">
    <div class="close-search theme-btn"><span class="flaticon-targeting-cross"></span></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">

            <div class="slideshow-container">

                <?php foreach ($bannerData as $no => $data) : ?>
                <div class="mySlides">
                    <a href="<?= $data['source'] ?>" target="_blank">
                        <img src="<?= base_url('upload/banner/' . $data['image']) ?>">
                    </a>
                </div>
                <?php endforeach; ?>

            </div>
            <br>

            <div style="text-align:center">
                <?php foreach ($bannerData as $no => $data) : ?>
                <span class="dot"></span>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
<?php endif ?>

<!-- LINK Include -->
<?= $this->include("frontend/_include/beranda/slide.php") ?>
<?= $this->include("frontend/_include/beranda/visi_misi.php") ?>
<?= $this->include("frontend/_include/beranda/selamat_datang.php") ?>
<?= $this->include("frontend/_include/beranda/info_terkini.php") ?>
<?= $this->include("frontend/_include/beranda/partner_wilayah.php") ?>

<!-- START WIDGET -->
<?= $this->include("frontend/_include/widget/gpr_widget.php") ?>
<?= $this->include("frontend/_include/widget/disabilitas_widget.php") ?>
<!-- END WIDGET -->

<?= $this->endSection() ?>