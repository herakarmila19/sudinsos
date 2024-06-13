<div class="tab" id="tab-6">
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
                                            <h2>Prestasi Kerja</h2>
                                            <div class="separator"><span class="cir c-1"></span><span
                                                    class="cir c-2"></span><span class="cir c-3"></span></div>
                                        </div>

                                        <?php if ($prestasiKerjaData != null) : ?>
                                        <div class="service-details"
                                            style="margin: 0px 20px 0px 20px; overflow-x: auto;">
                                            <table id="table-style">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Keterangan</th>
                                                    <th>Tahun</th>
                                                </tr>
                                                <?php foreach ($prestasiKerjaData as $no => $data) : ?>
                                                <tr>
                                                    <td><?= $no + 1 ?></td>
                                                    <td style="text-align: left;"><?= $data['keterangan'] ?></td>
                                                    <td style="text-align: left;"><?= $data['tahun'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                        <?php else: ?>
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