<div class="row clearfix">
    <div class="tab-col col-lg-12 col-md-12 col-sm-12">
        <div class="inner">
            <div class="accordion-box">
                <!--Block-->
                <div class="accordion">
                    <div class="acc-content">
                        <div class="content">
                            <section class="history-section">
                                <div class="auto-container" style="margin-bottom: -50px">
                                    <div class="sec-title with-separator centered" style="margin-top: -40px;">
                                        <h2>Walikota Terdahulu</h2>
                                        <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                                        <div class="lower-text">
                                            Diperbaharui : <?= diperbaharui($walikotaTerdahuluCreatedDate['created_date'], $walikotaTerdahuluModifiedDate['modified_date']) ?>
                                        </div>
                                    </div>

                                    <div class="members-col col-xl-12 col-lg-12 col-md-12" style="padding: 0px 50px 0px 50px;">
                                        <div class="row clearfix">

                                            <?php foreach ($walikotaTerdahulu as $no => $data) : ?>
                                                <div class="team-block-two col-lg-4 col-md-6 col-sm-12">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img src="<?= base_url('upload/pejabat/' . $data['foto']) ?>"></figure>
                                                        </div>
                                                        <div class="info">
                                                            <h4 style="color: black;"><?= $data['nama'] ?></h4>
                                                            <div class="designation"><?= $data['jabatan'] ?></div>
                                                        </div>
                                                        <div class="share-it">
                                                            <a class="share-btn"><?= ($no + 1 < 10) ? '0' . $no + 1 : $no + 1 ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>