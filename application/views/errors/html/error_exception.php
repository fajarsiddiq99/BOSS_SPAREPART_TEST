<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kesalahan aplikasi</title>
    <style>
        body { margin: 0; padding: 8vh 1rem; background: #f4f6f8; color: #273444; font: 16px/1.6 Arial, sans-serif; }
        main { max-width: 900px; margin: auto; padding: 2rem; background: #fff; border-radius: 12px; box-shadow: 0 8px 28px #00000012; }
        h1 { margin-top: 0; color: #b91c1c; }
        code { overflow-wrap: anywhere; }
    </style>
</head>
<body>
<main>
    <h1>Kesalahan aplikasi</h1>
    <p><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>File:</strong> <code><?= htmlspecialchars($exception->getFile(), ENT_QUOTES, 'UTF-8'); ?></code></p>
    <p><strong>Baris:</strong> <?= (int) $exception->getLine(); ?></p>
</main>
</body>
</html>
