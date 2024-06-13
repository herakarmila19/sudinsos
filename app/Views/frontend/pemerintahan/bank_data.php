<?= $this->extend('frontend/layout/index') ?>

<?= $this->section('title') ?>
Bank Data Pemerintahan
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('public/assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="faqs-section" style="margin-top: -30px;">
    <div class="auto-container">
        <div class="sec-title with-separator centered">
            <h2>Bank Data Pemerintahan</h2>
            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
            <div class="lower-text">Kota Administrasi Jakarta Selatan</div>
        </div>

        <div class="tabs-box faq-tabs">
            <div class="tabs-content">
                <div class="tab-buttons">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12" onclick="scrollTab1()">
                            <div class="btn-inner tab-btn" data-tab="#tab-1">
                                <span class="icon flaticon-placeholder-3"></span>
                                <span class="txt">Pasar</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" onclick="scrollTab2()">
                            <div class="btn-inner tab-btn" data-tab="#tab-2">
                                <span class="icon flaticon-building"></span>
                                <span class="txt">Hotel</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12" onclick="scrollTab3()">
                            <div class="btn-inner tab-btn" data-tab="#tab-3">
                                <span class="icon flaticon-shape"></span>
                                <span class="txt">Data Lain</span>
                            </div>
                        </div>
                    </div>
                </div>

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

                function diperbaharui($created_date, $modified_date)
                {
                    if ($created_date <= $modified_date) {
                        $tanggal_diperbaharui = $modified_date;
                    } else {
                        $tanggal_diperbaharui = $created_date;
                    }

                    $tanggal_diperbaharui =
                        date('d', strtotime($tanggal_diperbaharui)) . ' ' .
                        namaBulan(date('F', strtotime($tanggal_diperbaharui))) . ' ' .
                        date('Y', strtotime($tanggal_diperbaharui));

                    return $tanggal_diperbaharui;
                }
                ?>
                <?= $this->include("frontend/_include/pemerintahan/bank_data/pasar.php") ?>
                <?= $this->include("frontend/_include/pemerintahan/bank_data/hotel.php") ?>
                <?= $this->include("frontend/_include/pemerintahan/bank_data/data_lain.php") ?>

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

<?= $this->section('js') ?>
<script src="<?= base_url('public/assets/js/jquery.dataTables.min.js') ?> "></script>
<script>
    $(document).ready(function() {
        $('.table-data').DataTable({
            "language": {
                "url": "<?= base_url('public/assets/js/id.json') ?>",
            }
        });
    });
</script>
<?= $this->endSection() ?>