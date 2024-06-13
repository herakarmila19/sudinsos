<?php if (session()->getFlashdata('pesan_tambah')) : ?>
    <div class="card-header">
        <div class="alert alert-success alert-dismissible mb-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i><?= session()->getFlashdata('pesan_tambah') ?>
        </div>
    </div>
<?php elseif (session()->getFlashdata('pesan_ubah')) : ?>
    <div class="card-header">
        <div class="alert alert-warning alert-dismissible mb-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i><?= session()->getFlashdata('pesan_ubah') ?>
        </div>
    </div>
<?php elseif (session()->getFlashdata('pesan_hapus')) : ?>
    <div class="card-header">
        <div class="alert alert-danger alert-dismissible mb-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i><?= session()->getFlashdata('pesan_hapus') ?>
        </div>
    </div>
<?php elseif (session()->getFlashdata('pesan_validasi')) : ?>
    <div class="card-header">
        <div class="alert alert-danger alert-dismissible mb-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-exclamation-triangle"></i><?= session()->getFlashdata('pesan_validasi') ?>
        </div>
    </div>
<?php endif ?>