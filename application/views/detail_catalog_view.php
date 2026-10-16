<!-- Katalog Section -->
<div id="katalog" class="container my-5">
    <div class="mb-3">
        <a href="<?= site_url('catalog'); ?>" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>
    <h2 class="fw-bold mb-4 text-center">Daftar Sparepart</h2>
    <div class="row g-3 g-md-4">
        <?php foreach($spareparts as $row): ?>
        <div class="col-md-4">
            <div class="card catalog-sparepart-card h-100 shadow-sm border-0">
                <?php if (!empty($row->image)): ?>
                    <img src="<?= base_url('assets/uploads/spareparts/' . rawurlencode($row->image)); ?>" class="card-img-top catalog-sparepart-image" alt="<?= html_escape($row->part_name); ?>" style="height: 230px; object-fit: contain; background-color: #f8f9fa;">
                <?php else: ?>
                    <div class="catalog-sparepart-image d-flex align-items-center justify-content-center text-secondary bg-light" style="height: 220px;" aria-label="Foto produk belum tersedia">
                        <i class="fa-regular fa-image fa-3x" aria-hidden="true"></i>
                    </div>
                <?php endif; ?>
                <div class="card-body catalog-sparepart-body">
                    <div class="catalog-sparepart-heading">
                        <div class="catalog-sparepart-badges">
                            <span class="badge bg-secondary"><?= $row->category_name; ?></span>
                            <span class="badge bg-warning text-dark"><?= $row->brand; ?></span>
                        </div>
                        <h5 class="card-title fw-bold text-dark"><?= $row->part_name; ?></h5>
                    </div>
                    <div class="catalog-sparepart-details">
                        <p class="text-muted small mb-1"><strong>Part Number:</strong> <?= $row->part_number; ?></p>
                        <p class="text-muted small mb-3"><strong>Model:</strong> <?= $row->heavy_equipment_model; ?></p>
                    </div>
                    <div class="catalog-sparepart-footer">
                        <h6 class="text-primary fw-bold mb-3">Rp <?= number_format($row->price, 0, ',', '.'); ?></h6>
                        <span class="catalog-sparepart-description">Deskripsi</span>
                        <a href="https://api.whatsapp.com/send?phone=6282224231983&text=Halo%20Boss%20Spare%20Part,%20saya%20mau%20pesan%20part:%20<?= urlencode($row->part_name . ' (' . $row->part_number . ')'); ?>" target="_blank" class="btn btn-sm btn-success fw-bold"><i class="fa-brands fa-whatsapp me-1"></i> Tanya </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
