<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Layanan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Layanan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span
                    class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="tabs-box faq-tabs">
            <div class="tabs-content">
                <div class="tab-buttons">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6" onclick="scrollTab1()">
                            <div class="btn-inner tab-btn" data-tab="#tab-1">
                                <span class="icon flaticon-maps-and-flags"></span>
                                <span class="txt">Standar Pelayanan</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" onclick="scrollTab2()">
                            <div class="btn-inner tab-btn" data-tab="#tab-2">
                                <span class="icon flaticon-layers"></span>
                                <span class="txt">Pelayanan PTSP</span>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $this->include("frontend/_include/pemerintahan/layanan/standar_pelayanan.php") ?>
                <?= $this->include("frontend/_include/pemerintahan/layanan/pelayanan_ptsp.php") ?>

            </div>
        </div>
    </div>
</section>

<script>
function scrollTab1() {
    document.getElementById("tab-1").scrollIntoView({
        behavior: "smooth"
    });
}

function scrollTab2() {
    document.getElementById("tab-2").scrollIntoView({
        behavior: "smooth"
    });
}

function scrollTab3() {
    document.getElementById("tab-3").scrollIntoView({
        behavior: "smooth"
    });
}

function scrollTab4() {
    document.getElementById("tab-4").scrollIntoView({
        behavior: "smooth"
    });
}
</script>
<?= $this->endSection() ?>