<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal Admin - BOSS SPAREPARTS</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/' . rawurlencode('LOGO FIX BOSS SPAREPARTS.png')) ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/page-loader.css') ?>">
    <script>document.documentElement.classList.add('page-transitions-enabled');</script>
    <script src="<?= base_url('assets/js/page-loader.js') ?>" defer></script>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #0b1120; color: #f8fafc; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card-login { background-color: #1e293b; border: 1px solid #334155; border-radius: 16px; width: 100%; max-width: 420px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .brand-orange { color: #ff009d; font-weight: 800; }
        .btn-orange { background-color: #ff009d; color: white; font-weight: 600; border: none; padding: 12px; }
        .btn-orange:hover { background-color: #ff009d; color: white; }
        .form-control { background-color: #0f172a; border: 1px solid #334155; color: #fff; padding: 12px; }
        .form-control:focus { background-color: #0f172a; color: #fff; border-color: #ff009d; box-shadow: none; }
    </style>
</head>
<body>
    <?php $this->load->view('page_loader'); ?>

    <div class="card card-login p-4">
        <div class="text-center mb-4">
            <img src="<?= base_url('assets/' . rawurlencode('LOGO FIX BOSS SPAREPARTS.png')); ?>" alt="Logo Boss Spare Parts" class="img-fluid mb-3" style="max-width: 150px; max-height: 90px; object-fit: contain;">
            <a href="<?= site_url() ?>" class="text-decoration-none fs-3">
                <span class="fw-bold text-white">BOSS</span><span class="brand-orange">SPAREPARTS</span>
            </a>
            <p class="text-slate-400 small mt-1" style="color: #94a3b8;">Masuk ke Portal Administrator</p>
        </div>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger py-2 fs-6 text-center" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-1"></i> <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('auth/process_login') ?>" method="POST">
            <div class="mb-3">
                <label class="form-label text-slate-300" style="color: #cbd5e1;"><i class="fa-solid fa-user me-1"></i> Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
            </div>
            <div class="mb-4">
                <label class="form-label text-slate-300" style="color: #cbd5e1;"><i class="fa-solid fa-lock me-1"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-orange w-100 fw-bold rounded-3 mb-3"><i class="fa-solid fa-right-to-bracket me-2"></i> MASUK SYSTEM</button>
        </form>

        <div class="text-center mt-2 border-top border-secondary pt-3">
            <a href="<?= site_url() ?>" class="text-slate-400 small text-decoration-none" style="color: #94a3b8;"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Website Utama</a>
        </div>
    </div>

</body>
</html>
