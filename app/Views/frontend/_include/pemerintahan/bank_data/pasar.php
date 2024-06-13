<div class="tab" id="tab-1">
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
                                            <h2>Pasar Jakarta Selatan</h2>
                                            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                                            <div class="lower-text">
                                                Diperbaharui : <?= diperbaharui($pasarDataCreatedDate['created_date'], $pasarDataModifiedDate['modified_date']) ?>
                                            </div>
                                        </div>

                                        <div class="service-details" style="margin: 0px 20px 0px 20px; overflow-x: auto;">
                                            <table id="table-style" class="table-data">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Wilayah</th>
                                                        <th>Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pasarData as $no => $data) : ?>
                                                        <tr>
                                                            <td><?= $no + 1 ?></td>
                                                            <td><?= $data['nama'] ?></td>
                                                            <td><?= $data['wilayah'] ?></td>
                                                            <td><?= $data['alamat'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
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
</div>