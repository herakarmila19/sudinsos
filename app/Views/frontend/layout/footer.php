<footer class="main-footer-two">
    <div class="auto-container">
        <div class="upper-logo-box text-center">
            <div class="logo">
                <img src="<?= base_url('public/assets/images/logo/jaksel-putih.png') ?>">
                <div class="mt-4">
                    <a href="https://facebook.com/PemkotJakartaSelatan" target="_blank"><span class="fab fa-facebook-f mr-4"></span></a>
                    <a href="https://twitter.com/kotajaksel" target="_blank">
						<!-- <span class="fab fa-twitter mr-4"></span> -->
						<img class="mr-4" src="<?= base_url('public/assets/images/icons/twitter-x-footer.png') ?>" width="14" height="14" alt="footer-twitter-x" style="margin-top: -2px;">
					</a>
                    <a href="https://www.youtube.com/KominfotikJaksel" target="_blank"><span class="fab fa-youtube mr-4"></span></a>
                    <a href="https://www.instagram.com/kotajakartaselatan/" target="_blank"><span class="fab fa-instagram"></span></a>
                </div>
            </div>
        </div>
    </div>

    <!--Widgets Section-->
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h4>Pelayanan Informasi</h4>
                        </div>
                        <div class="widget-content text">
                            Pelayanan sistem informasi Smart Goverment menjadi kebutuhan pemerintah untuk memberikan informasi cepat, efektif dan efisien.
                        </div>
                    </div>
                </div>
                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h4>Alamat</h4>
                        </div>
                        <div class="widget-content text">
                            <a href="https://goo.gl/maps/1nXvQyajCZfXauPe7" target="_blank" style="text-decoration:none; color: #999999">
                                Jl. Prapanca Raya No. 9, Jakarta Selatan, Indonesia 12170
                            </a>
                        </div>
                    </div>
                </div>
                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget num-widget">
                        <div class="widget-title">
                            <h4>Kontak</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="num-links">
                                <li>(021) 727-866-29</li>
                                <li>
                                    <a href="mailto:kominfotikjs@jakarta.go.id" target="_blank" style="text-decoration:none; color: #999999">
                                        kominfotikjs@jakarta.go.id
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h4>Jam Operasional</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="num-links">
                                <li>Senin - Jumat (07.30 - 16.00)</li>
                                <li>Sabtu - Minggu (Tutup)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner clearfix">
                <ul class="social-links clearfix">
                    <li> </li>
                </ul>
                <div class="copyright">Hak Cipta &copy; <?= date("Y"); ?>
                    <a>
                        Pemerintah Kota Administrasi Jakarta Selatan
                    </a>
                </div>
                <ul class="footer-links clearfix">
                    <li> </li>
                </ul>

            </div>
        </div>
    </div>

</footer>

</div>

<!-- Scroll to top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon flaticon-up-arrow-angle"></span></div>

<script src="<?= base_url('public/assets/js/jquery.js') ?> "></script>
<script src="<?= base_url('public/assets/js/popper.min.js') ?> "></script>
<script src="<?= base_url('public/assets/js/bootstrap.min.js') ?> "></script>
<script src="<?= base_url('public/assets/js/jquery-ui.js') ?> "></script>
<script src="<?= base_url('public/assets/js/jquery.fancybox.js') ?> "></script>
<script src="<?= base_url('public/assets/js/owl.js') ?> "></script>

<!-- SECTION Render Section JS -->
<?= $this->renderSection('js') ?>

<script src="<?= base_url('public/assets/js/scrollbar.js') ?> "></script>
<script src="<?= base_url('public/assets/js/appear.js') ?> "></script>
<script src="<?= base_url('public/assets/js/wow.js') ?> "></script>
<script src="<?= base_url('public/assets/js/custom-script.js') ?> "></script>
                    
<!-- GPR WIDGET -->
<script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
                    
<!-- SCRIPT DISABILITAS -->
<script src="<?= base_url('public/assets/js/disabilitas-script.js') ?> "></script>
</body>

</html>