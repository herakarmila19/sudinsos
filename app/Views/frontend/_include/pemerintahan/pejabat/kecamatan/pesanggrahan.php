<div class="row clearfix">
    <div class="tab-col col-lg-12 col-md-12 col-sm-12">
        <div class="inner">
            <div class="accordion-box">
                <!--Block-->
                <div class="accordion">
                    <div class="acc-content">
                        <div class="content">
                            <section class="history-section" style="margin-bottom: -50px">
                                <div class="auto-container">
                                    <div class="sec-title with-separator centered" style="margin-top: -40px;">
                                        <h2>Kecamatan Pesanggrahan</h2>
                                        <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                                        <div class="lower-text">
                                            Diperbaharui : <?= diperbaharui($pesanggrahanDataCreatedDate['created_date'], $pesanggrahanDataModifiedDate['modified_date']) ?>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <?php foreach ($pesanggrahanData as $data) : ?>
                                            <div class="team-block col-lg-3 col-md-3 col-sm-4">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image">
                                                            <?php if ($data['foto'] == '-') : ?>
                                                                <img src="<?= base_url('upload/pejabat/kosong.png') ?>">
                                                            <?php else : ?>
                                                                <img src="<?= base_url('upload/pejabat/' . $data['foto']) ?>">
                                                            <?php endif; ?>
                                                        </figure>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h4><a><?= $data['nama'] ?></a></h4>
                                                        <div class="designation"><?= $data['jabatan'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

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