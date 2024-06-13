<div class="tab" id="tab-4">
    <div class="row clearfix">
        <div class="tab-col col-lg-12 col-md-12 col-sm-12">
            <div class="inner">
                <div class="accordion-box">
                    <div class="accordion">
                        <div class="acc-content">
                            <div class="content">
                                <section class="history-section" style="padding-bottom: 50px;">
                                    <div class="auto-container">
                                        <div class="sec-title with-separator centered" style="margin-top: -50px;">
                                            <h2>Demografi</h2>
                                            <div class="separator"><span class="cir c-1"></span><span
                                                    class="cir c-2"></span><span class="cir c-3"></span></div>
                                        </div>

                                        <?php if ($demografi != null) : ?>
                                        <div class="table-responsive">
                                            <?= $demografi['isi_konten'] ?>
                                        </div>
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