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
                                        <h2>ESELON III</h2>
                                        <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                                        <div class="lower-text">
                                            Diperbaharui : <?= diperbaharui($eselonDataCreatedDate['created_date'], $eselonDataModifiedDate['modified_date']) ?>
                                        </div>
                                    </div>

                                    <div class="service-details" style="margin: 0px 20px 0px 20px; overflow-x: auto;">
                                        <table id="table-style">
                                            <tr>
                                                <th>No</th>
                                                <th>Jabatan</th>
                                                <th>Nama</th>
                                            </tr>
                                            <?php foreach ($eselonData as $no => $data) : ?>
                                                <tr>
                                                    <td><?= $no + 1 ?></td>
                                                    <td><?= $data['jabatan'] ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
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