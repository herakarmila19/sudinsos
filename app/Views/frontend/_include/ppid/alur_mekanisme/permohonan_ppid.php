<div class="tab" id="tab-1">
    <div class="row clearfix">
        <div class="tab-col col-lg-12 col-md-12 col-sm-12">
            <div class="inner">
                <div class="accordion-box">
                    <!--Block-->
                    <div class="accordion">
                        <div class="acc-content">
                            <div class="content">
                                <section class="history-section" style="padding-bottom: 50px;">
                                    <div class="auto-container">
                                        <div class="sec-title with-separator centered" style="margin-top: -50px;">
                                            <h2>Permohonan PPID</h2>
                                            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                                            <div class="lower-text">
                                                Diperbaharui : <?= diperbaharui($permohonanPpid['created_date'], $permohonanPpid['modified_date']) ?>
                                            </div>
                                        </div>

                                        <?= $permohonanPpid['isi_konten'] ?>
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