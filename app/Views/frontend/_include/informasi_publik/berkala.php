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
                                            <h2>Daftar Informasi Berkala</h2>
                                            <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                                        </div>

                                        <div class="service-details" style="margin: 0px 20px 0px 20px;">                                
                                            <div class="download-links">
                                                <ul>
                                                    <?php $data = 0; if ($data == 0) : ?>                                        
                                                        <li><a href="#" class="clearfix"><span class="icon fa fa-window-close"></span><span class="ttl">Data belum tersedia</span><span class="info">[ Kosong ]</span></a></li>
                                                    <?php else: ?>    
                                                        <li>
                                                            <a href="#" class="clearfix">
                                                                <span class="icon fa fa-file"></span>
                                                                <span class="ttl">Nama File</span>
                                                                <span class="info">DD-MM-YYYY [ Download ]</span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
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
</div>