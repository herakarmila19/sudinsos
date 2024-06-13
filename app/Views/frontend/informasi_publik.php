<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Informasi Publik
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- LINK Include -->
<?php
function namaBulan($input)
{
    if ($input == 'January') {
        $output = 'Januari';
    } elseif ($input == 'February') {
        $output = 'Februari';
    } elseif ($input == 'March') {
        $output = 'Maret';
    } elseif ($input == 'April') {
        $output = 'April';
    } elseif ($input == 'May') {
        $output = 'Mei';
    } elseif ($input == 'June') {
        $output = 'Juni';
    } elseif ($input == 'July') {
        $output = 'Juli';
    } elseif ($input == 'August') {
        $output = 'Agustus';
    } elseif ($input == 'September') {
        $output = 'September';
    } elseif ($input == 'October') {
        $output = 'Oktober';
    } elseif ($input == 'November') {
        $output = 'November';
    } elseif ($input == 'December') {
        $output = 'Desember';
    }

    return $output;
};

function diperbaharui()
{
    $tanggal_diperbaharui =
        date('d') . ' ' .
        namaBulan(date('F')) . ' ' .
        date('Y');

    return $tanggal_diperbaharui;
}
?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Informasi Publik</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">
                Diperbaharui : <?= diperbaharui() ?>
            </div>
        </div>

        <div class="tabs-box faq-tabs">
            <div class="tabs-content">
                <div class="tab-buttons" style="margin-top: -20px;">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab1()">
                            <div class="btn-inner tab-btn" data-tab="#tab-1">
                                <span class="icon flaticon-checklist"></span>
                                <span class="txt">Informasi Berkala</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab2()">
                            <div class="btn-inner tab-btn" data-tab="#tab-2">
                                <span class="icon flaticon-mail"></span>
                                <span class="txt">Informasi Serta Merta</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6" onclick="scrollTab3()">
                            <div class="btn-inner tab-btn" data-tab="#tab-3">
                                <span class="icon flaticon-checklist-1"></span>
                                <span class="txt">Informasi Setiap Saat</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LINK Include -->
                <?= $this->include("frontend/_include/informasi_publik/berkala.php") ?>
                <?= $this->include("frontend/_include/informasi_publik/serta_merta.php") ?>
                <?= $this->include("frontend/_include/informasi_publik/setiap_saat.php") ?>

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
</script>
<?= $this->endSection() ?>