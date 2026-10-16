<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="<?= site_url('catalog') ?>">
            <img src="<?= base_url('assets/' . rawurlencode('LOGO FIX BOSS SPAREPARTS.png')); ?>" alt="Logo Boss Spare Parts" style="width: 48px; height: 36px; object-fit: contain;">
            <span class="text-white">BOSS</span><span style="color: #ff009d;">SPAREPARTS</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Buka menu navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <div class="ms-auto d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-3 py-3 py-lg-0">
                <a class="text-light text-decoration-none" href="<?= site_url('catalog') ?>#tentang-kami">Tentang Kami</a>
                <a class="text-light text-decoration-none" href="<?= site_url('catalog') ?>#artikel">Artikel</a>
                <a href="<?= site_url('admin') ?>" class="btn btn-warning fw-bold"><i class="fa-solid fa-lock me-1"></i> Admin Dashboard</a>
            </div>
        </div>
    </div>
</nav>
