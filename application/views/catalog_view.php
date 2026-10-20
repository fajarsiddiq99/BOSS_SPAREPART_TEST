<!-- Hero Section -->
<header class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Pusat Suku Cadang Alat Berat & Diesel Terlengkap No 1 Indonesia</h1>
        <p class="lead text-light mb-4">menyediakan suku cadang untuk alat berat dan mesin diesel</p>
        <a href="<?= site_url('catalog/detail') ?>" class="btn btn-warning btn-lg fw-bold px-4">Lihat Katalog Sparepart</a>
    </div>
</header>

<!-- Brand Logo Slider -->
<section class="container my-5 text-center" aria-label="Merek alat berat yang kami dukung">
    <h5 class="text-muted mb-4">MEREK ALAT BERAT YANG KAMI DUKUNG</h5>
    <div class="brand-slider">
        <div class="brand-slider-track">
            <div class="brand-slider-group">
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Changlin.png') ?>" alt="Changlin"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Doosan.png') ?>" alt="Doosan"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Hino.png') ?>" alt="Hino"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Hitachi.png') ?>" alt="Hitachi"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo JCB.png') ?>" alt="JCB"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Komatsu.png') ?>" alt="Komatsu"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Mingyu.png') ?>" alt="Mingyu"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo SEM.png') ?>" alt="SEM"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Sumitomo.png') ?>" alt="Sumitomo"></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo XGMA.png') ?>" alt="XGMA"></div>
            </div>
            <div class="brand-slider-group" aria-hidden="true">
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Changlin.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Doosan.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Hino.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Hitachi.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo JCB.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Komatsu.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Mingyu.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo SEM.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo Sumitomo.png') ?>" alt=""></div>
                <div class="brand-slide-item"><img src="<?= base_url('assets/client/Logo XGMA.png') ?>" alt=""></div>
            </div>
        </div>
    </div>
</section>

<!-- About Us -->
<section id="tentang-kami" class="container my-5 text-center">
    <div class="mx-auto" style="max-width: 800px;">
        <h2 class="fw-bold mb-3">Tentang Boss Sparepart</h2>
        <p class="text-muted mb-0">Boss Sparepart menyediakan suku cadang untuk alat berat dan mesin diesel. Kami mendukung berbagai merek, termasuk Komatsu, Hitachi, Doosan, JCB, Sumitomo, dan lainnya. Hubungi kami untuk menanyakan ketersediaan part yang sesuai dengan kebutuhan alat Anda.</p>
    </div>
</section>

<!-- Articles -->
<section id="artikel" class="container my-5 text-center">
    <h2 class="fw-bold mb-4">Artikel & Informasi</h2>
    <?php if (!empty($articles)): ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 justify-content-center">
            <?php foreach ($articles as $article): ?>
                <div class="col">
                    <article class="article-card card h-100 shadow-sm border-0">
                        <?php if (!empty($article->image)): ?>
                            <img src="<?= base_url('assets/uploads/articles/' . rawurlencode($article->image)); ?>" class="article-card-image card-img-top" alt="<?= html_escape($article->title); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <p class="text-muted small mb-2"><?= html_escape(date('d-m-Y', strtotime($article->created_at))); ?></p>
                            <h5 class="card-title fw-bold"><?= html_escape($article->title); ?></h5>
                            <p class="card-text text-muted" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;"><?= html_escape(strip_tags($article->content)); ?></p>
                            <a href="<?= site_url('catalog/artikel/' . (int) $article->id); ?>" class="btn btn-outline-primary btn-sm">Baca selengkapnya</a>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted">Artikel akan segera hadir.</p>
    <?php endif; ?>
</section>
