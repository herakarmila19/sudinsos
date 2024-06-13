<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Pelayanan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Pelayanan</h2>
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
                                            <?php if ($pelayanan != null) : ?>
                                            <?= $pelayanan['isi_konten'] ?>
                                            <?php else : ?>
                                            <div class="service-details"
                                                style="margin: 0px 20px 0px 20px; overflow-x: auto;">
                                                <table id="table-style">
                                                    <tr>
                                                        <th>Data Tidak Tersedia</th>
                                                    </tr>
                                                </table>
                                            </div>
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

<script>
    function scrollTab1() {
        document.getElementById("tab-1").scrollIntoView({
            behavior: "smooth"
        });
    }
</script>
<?= $this->endSection() ?>