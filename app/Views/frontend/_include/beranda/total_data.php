<section class="facts-section p-4">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Fact Column-->
            <div class="fact-column mb-0 col-lg-4 col-md-4 col-sm-12">
                <div class="inner">
                    <div class="fact-box m-0">
                        <span class="count-box"><?= number_format($totalBerita) ?></span>
                    </div>
                    <h4 class="fact-title">Total Berita</h4>
                </div>
            </div>
            <!--Fact Column-->
            <div class="fact-column mb-0 col-lg-4 col-md-4 col-sm-12">
                <div class="inner">
                    <div class="fact-box m-0">
                        <span class="count-box"><?= number_format($totalVideo) ?></span>
                    </div>
                    <h4 class="fact-title">Total Video</h4>
                </div>
            </div>
            <!--Fact Column-->
            <div class="fact-column mb-0 col-lg-4 col-md-4 col-sm-12">
                <div class="inner">
                    <div class="fact-box m-0">
                        <span class="count-box"><?= number_format($totalPengunjung->jumlah) ?></span>
                    </div>
                    <h4 class="fact-title">Total Pengunjung</h4>
                </div>
            </div>
        </div>
    </div>
</section>