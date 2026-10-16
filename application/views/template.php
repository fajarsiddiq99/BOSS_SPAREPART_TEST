<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss Spare Part - Pusat Suku Cadang Alat Berat Terlengkap</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/' . rawurlencode('LOGO FIX BOSS SPAREPARTS.png')) ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/page-loader.css') ?>">
    <script>document.documentElement.classList.add('page-transitions-enabled');</script>
    <script src="<?= base_url('assets/js/page-loader.js') ?>" defer></script>
    <style>
        .hero { background: linear-gradient(135deg, #fd008b, #dc3545); color: white; padding: 100px 0; }
        .brand-badge { background: #f8f9fa; color: #000000; font-weight: 600; border-radius: 6px; padding: 10px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0,0); }
        .brand-slider { overflow: hidden; }
        .brand-slider-track { display: flex; width: max-content; animation: brand-slide 35s linear infinite; }
        .brand-slider-group { display: flex; align-items: center; gap: 1rem; padding-right: 1rem; }
        .brand-slide-item { display: flex; flex: 0 0 180px; height: 110px; align-items: center; justify-content: center; padding: 1rem; border-radius: .5rem; background: #fff; }
        .brand-slide-item img { max-width: 100%; max-height: 75px; object-fit: contain; }
        .article-card { width: 100%; max-width: 100%; min-width: 0; overflow: hidden; }
        .article-card-image { display: block; width: 100%; max-width: 100%; height: 220px; object-fit: contain; background-color: #f8f9fa; }
        .article-card .card-body { min-width: 0; }
        .article-card .card-title,
        .article-card .card-text { max-width: 100%; overflow-wrap: break-word; }
        .catalog-sparepart-heading { min-width: 0; }
        .catalog-sparepart-badges { display: flex; justify-content: space-between; gap: .5rem; margin-bottom: .5rem; }
        .catalog-sparepart-footer { display: flex; justify-content: space-between; align-items: center; }
        .catalog-sparepart-footer h6 { margin-bottom: 0 !important; }
        @keyframes brand-slide { from { transform: translateX(0); } to { transform: translateX(-50%); } }
        @media (max-width: 575.98px) {
            .article-card-image { height: 180px; }
            .article-card .card-body { padding: 1rem; }
        }
        @media (max-width: 767.98px) {
            .catalog-sparepart-card { display: flex; flex-direction: row; min-width: 0; }
            .catalog-sparepart-card > .catalog-sparepart-image { flex: 0 0 88px; width: 88px; height: auto !important; min-height: 100%; align-self: stretch; }
            .catalog-sparepart-card > .catalog-sparepart-image:not(img) { min-height: 108px; }
            .catalog-sparepart-body { display: flex; flex: 1; flex-direction: column; justify-content: space-between; min-width: 0; padding: .65rem .75rem; }
            .catalog-sparepart-badges { align-items: center; gap: .4rem; margin-bottom: .4rem; }
            .catalog-sparepart-badges .badge { flex: 0 1 auto; max-width: 65%; padding: .28rem .45rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: .64rem; }
            .catalog-sparepart-badges .badge + .badge { flex: 0 0 auto; max-width: 35%; }
            .catalog-sparepart-heading .card-title { overflow: hidden; margin-bottom: .45rem; text-overflow: ellipsis; white-space: nowrap; font-size: .95rem; }
            .catalog-sparepart-details { display: flex; gap: .65rem; min-width: 0; }
            .catalog-sparepart-details p { overflow: hidden; flex: 1; margin-bottom: .4rem !important; text-overflow: ellipsis; white-space: nowrap; font-size: .68rem !important; }
            .catalog-sparepart-footer { gap: .4rem; min-width: 0; }
            .catalog-sparepart-footer h6 { overflow: hidden; flex: 1; text-overflow: ellipsis; white-space: nowrap; font-size: .82rem; }
            .catalog-sparepart-description { display: none; }
            .catalog-sparepart-footer .btn { flex: 0 0 auto; padding: .25rem .45rem; font-size: .72rem; }
            .catalog-sparepart-footer .btn .fa-whatsapp { margin-right: .2rem !important; }
        }
        @media (prefers-reduced-motion: reduce) {
            .brand-slider { overflow-x: auto; }
            .brand-slider-track { animation: none; }
        }
    </style>
</head>
<body class="bg-light">
<?php $this->load->view('page_loader'); ?>
