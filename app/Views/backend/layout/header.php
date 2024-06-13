<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SECTION Render Section Title -->
    <title>
        <?= $this->renderSection('title') ?> - Halaman Administrator - Situs Web Resmi Pemerintah Kota Administrasi Jakarta Selatan
    </title>

    <link rel="shortcut icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('public/assets/images/icons/icon-flag.png') ?>" type="image/x-icon">

    <!-- SECTION Render Section CSS -->
    <?= $this->renderSection('add-css') ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">