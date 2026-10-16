<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Boss SparePart</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/' . rawurlencode('LOGO FIX BOSS SPAREPARTS.png')) ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/page-loader.css') ?>">
    <script>document.documentElement.classList.add('page-transitions-enabled');</script>
    <script src="<?= base_url('assets/js/page-loader.js') ?>" defer></script>
</head>
<body class="bg-light">
    <?php $this->load->view('page_loader'); ?>
    <!-- Navbar Admin -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-warning d-flex align-items-center gap-2" href="#">
                <img src="<?= base_url('assets/' . rawurlencode('LOGO FIX BOSS SPAREPARTS.png')); ?>" alt="Logo Boss Spare Parts" style="width: 48px; height: 36px; object-fit: contain;">
                BOSS SPARE PART - ADMIN PANEL
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-light small"><i class="fa-solid fa-user-circle me-1"></i> <?= $user_fullname; ?></span>
                <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-danger btn-sm fw-bold"><i class="fa-solid fa-right-from-bracket me-1"></i> Logout</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-4">
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= html_escape($this->session->flashdata('error')); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= html_escape($this->session->flashdata('success')); ?></div>
        <?php endif; ?>

        <!-- Dashboard Summary -->
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <h6>TOTAL SPAREPARTS</h6>
                        <h2 class="fw-bold mb-0"><?= $total_spareparts; ?> Item</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-success text-white">
                    <div class="card-body">
                        <h6>TOTAL LEADS INQUIRY</h6>
                        <h2 class="fw-bold mb-0"><?= $total_inquiries; ?> Lead</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="fw-bold mb-0">Kelola Inventaris Spare Part</h5>
                <button class="btn btn-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa-solid fa-plus me-1"></i> Tambah Part Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Part Number</th>
                                <th>Nama Spare Part</th>
                                <th>Kategori</th>
                                <th>Merek</th>
                                <th>Model Alat</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($spareparts as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?php if (!empty($row->image)): ?>
                                        <img src="<?= base_url('assets/uploads/spareparts/' . rawurlencode($row->image)); ?>" alt="<?= html_escape($row->part_name); ?>" style="width: 56px; height: 56px; object-fit: cover;">
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td><code><?= $row->part_number; ?></code></td>
                                <td class="fw-bold"><?= $row->part_name; ?></td>
                                <td><?= $row->category_name; ?></td>
                                <td><span class="badge bg-secondary"><?= $row->brand; ?></span></td>
                                <td><?= $row->heavy_equipment_model; ?></td>
                                <td>Rp <?= number_format($row->price, 0, ',', '.'); ?></td>
                                <td>
                                    <a href="<?= site_url('catalog/detail/'.$row->id) ?>" class="btn btn-outline-info btn-sm" target="_blank"><i class="fa-solid fa-eye"></i></a>
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editSparepartModal<?= (int) $row->id; ?>"><i class="fa-solid fa-pen"></i></button>
                                    <a href="<?= site_url('admin/delete/'.$row->id) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin hapus part ini?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php foreach ($spareparts as $row): ?>
            <div class="modal fade" id="editSparepartModal<?= (int) $row->id; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="<?= site_url('admin/edit/' . (int) $row->id); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Edit Spare Part</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="part-number-<?= (int) $row->id; ?>" class="form-label">Part Number</label>
                                    <input type="text" id="part-number-<?= (int) $row->id; ?>" name="part_number" class="form-control" value="<?= html_escape($row->part_number); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="part-name-<?= (int) $row->id; ?>" class="form-label">Nama Part</label>
                                    <input type="text" id="part-name-<?= (int) $row->id; ?>" name="part_name" class="form-control" value="<?= html_escape($row->part_name); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="category-<?= (int) $row->id; ?>" class="form-label">Kategori</label>
                                    <select id="category-<?= (int) $row->id; ?>" name="category_id" class="form-select" required>
                                        <?php
                                        $categories = array(
                                            1 => 'Engine Parts',
                                            2 => 'Undercarriage',
                                            3 => 'Hydraulic System',
                                            4 => 'Filters & Lubricants',
                                            5 => 'Electrical'
                                        );
                                        foreach ($categories as $category_id => $category_name):
                                        ?>
                                            <option value="<?= $category_id; ?>" <?= (int) $row->category_id === $category_id ? 'selected' : ''; ?>><?= html_escape($category_name); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="brand-<?= (int) $row->id; ?>" class="form-label">Merek</label>
                                    <input type="text" id="brand-<?= (int) $row->id; ?>" name="brand" class="form-control" value="<?= html_escape($row->brand); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="equipment-model-<?= (int) $row->id; ?>" class="form-label">Model Alat Berat</label>
                                    <input type="text" id="equipment-model-<?= (int) $row->id; ?>" name="heavy_equipment_model" class="form-control" value="<?= html_escape($row->heavy_equipment_model); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="price-<?= (int) $row->id; ?>" class="form-label">Harga (IDR)</label>
                                    <input type="number" id="price-<?= (int) $row->id; ?>" name="price" class="form-control" min="0" step="any" value="<?= html_escape($row->price); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="image-<?= (int) $row->id; ?>" class="form-label">Foto Produk (opsional)</label>
                                    <?php if (!empty($row->image)): ?>
                                        <div class="mb-2"><img src="<?= base_url('assets/uploads/spareparts/' . rawurlencode($row->image)); ?>" alt="<?= html_escape($row->part_name); ?>" style="max-width: 120px; max-height: 90px; object-fit: contain;"></div>
                                    <?php endif; ?>
                                    <input type="file" id="image-<?= (int) $row->id; ?>" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                                    <div class="form-text">Kosongkan jika tidak ingin mengganti foto. Format JPG, PNG, atau WEBP; maksimal 5 MB.</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning fw-bold">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Article Management -->
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="fw-bold mb-0">Kelola Artikel</h5>
                <button class="btn btn-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#addArticleModal"><i class="fa-solid fa-plus me-1"></i> Tambah Artikel</button>
            </div>
            <div class="card-body">
                <?php if (empty($articles)): ?>
                    <p class="text-muted mb-0">Belum ada artikel.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <td>
                                            <?php if (!empty($article->image)): ?>
                                                <img src="<?= base_url('assets/uploads/articles/' . rawurlencode($article->image)); ?>" alt="<?= html_escape($article->title); ?>" style="width: 64px; height: 48px; object-fit: cover;">
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= html_escape($article->title); ?></td>
                                        <td><?= html_escape(date('d-m-Y', strtotime($article->created_at))); ?></td>
                                        <td class="d-flex gap-2">
                                            <a href="<?= site_url('catalog/artikel/' . (int) $article->id); ?>" class="btn btn-outline-info btn-sm" target="_blank" rel="noopener"><i class="fa-solid fa-eye"></i></a>
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editArticleModal<?= (int) $article->id; ?>"><i class="fa-solid fa-pen"></i></button>
                                            <form action="<?= site_url('admin/delete_article/' . (int) $article->id); ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php foreach ($articles as $article): ?>
            <div class="modal fade" id="editArticleModal<?= (int) $article->id; ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="<?= site_url('admin/edit_article/' . (int) $article->id); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Edit Artikel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="article-title-<?= (int) $article->id; ?>" class="form-label">Judul</label>
                                    <input type="text" id="article-title-<?= (int) $article->id; ?>" name="title" class="form-control" maxlength="200" value="<?= html_escape($article->title); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="article-content-<?= (int) $article->id; ?>" class="form-label">Isi Artikel</label>
                                    <textarea id="article-content-<?= (int) $article->id; ?>" name="content" class="form-control" rows="10" required><?= html_escape($article->content); ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="article-image-<?= (int) $article->id; ?>" class="form-label">Gambar Artikel (opsional)</label>
                                    <?php if (!empty($article->image)): ?>
                                        <div class="mb-2"><img src="<?= base_url('assets/uploads/articles/' . rawurlencode($article->image)); ?>" alt="<?= html_escape($article->title); ?>" style="max-width: 180px; max-height: 120px; object-fit: contain;"></div>
                                    <?php endif; ?>
                                    <input type="file" id="article-image-<?= (int) $article->id; ?>" name="article_image" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                                    <div class="form-text">Pilih foto baru untuk mengganti gambar saat ini. Format JPG, PNG, atau WEBP; maksimal 5 MB.</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning fw-bold">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Add Article Modal -->
    <div class="modal fade" id="addArticleModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="<?= site_url('admin/add_article'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Tambah Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="article-title" class="form-label">Judul</label>
                            <input type="text" id="article-title" name="title" class="form-control" maxlength="200" required>
                        </div>
                        <div class="mb-3">
                            <label for="article-content" class="form-label">Isi Artikel</label>
                            <textarea id="article-content" name="content" class="form-control" rows="10" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="article-image" class="form-label">Gambar Artikel (opsional)</label>
                            <input type="file" id="article-image" name="article_image" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                            <div class="form-text">Format JPG, PNG, atau WEBP; maksimal 5 MB.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning fw-bold">Simpan Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= site_url('admin/add') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Tambah Spare Part</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2"><label>Part Number</label><input type="text" name="part_number" class="form-control" required></div>
                        <div class="mb-2"><label>Nama Part</label><input type="text" name="part_name" class="form-control" required></div>
                        <div class="mb-2">
                            <label>Kategori</label>
                            <select name="category_id" class="form-select">
                                <option value="1">Engine Parts</option>
                                <option value="2">Undercarriage</option>
                                <option value="3">Hydraulic System</option>
                                <option value="4">Filters & Lubricants</option>
                                <option value="5">Electrical</option>
                            </select>
                        </div>
                        <div class="mb-2"><label>Merek</label><input type="text" name="brand" class="form-control" required></div>
                        <div class="mb-2"><label>Model Alat Berat</label><input type="text" name="heavy_equipment_model" class="form-control" required></div>
                        <div class="mb-2"><label>Harga (IDR)</label><input type="number" name="price" class="form-control" required></div>
                        <div class="mb-2">
                            <label for="product-image" class="form-label">Foto Produk</label>
                            <input type="file" id="product-image" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" required>
                            <div class="form-text">Format JPG, PNG, atau WEBP. Maksimal 5 MB.</div>
                        </div>
                        <div class="mb-2"><label>Deskripsi Produk</label><textarea name="description" class="form-control" rows="3"></textarea></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning fw-bold">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
