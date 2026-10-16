<main class="container my-5">
    <div class="mb-3">
        <a href="<?= site_url('catalog'); ?>" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>
    <article class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">
            <p class="text-muted small mb-2"><?= html_escape(date('d-m-Y', strtotime($article->created_at))); ?></p>
            <h1 class="fw-bold mb-4"><?= html_escape($article->title); ?></h1>
            <?php if (!empty($article->image)): ?>
                <img src="<?= base_url('assets/uploads/articles/' . rawurlencode($article->image)); ?>" class="img-fluid rounded mb-4" alt="<?= html_escape($article->title); ?>" style="max-height: 480px; width: 100%; object-fit: contain; background-color: #f8f9fa;">
            <?php endif; ?>
            <div class="article-content"><?= nl2br(html_escape($article->content)); ?></div>
        </div>
    </article>
</main>
