<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Versi</b> 1.0
    </div>
    <strong>
        Hak Cipta &copy;
        <?= date('Y') ?> -
        <a href="https://adminlte.io">AdminLTE.io</a> -
        <a href="https://selatan.jakarta.go.id">Sudin Kominfotik Jakarta Selatan</a>
    </strong>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script src="<?= base_url('public/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('public/adminlte') ?>/dist/js/adminlte.min.js"></script>

<!-- SECTION Render Section JS -->
<?= $this->renderSection('add-js') ?>

</body>

</html>