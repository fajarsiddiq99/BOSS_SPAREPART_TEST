<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman tidak ditemukan</title>
    <style>
        body { margin: 0; padding: 10vh 1rem; background: #f4f6f8; color: #273444; font: 16px/1.6 Arial, sans-serif; text-align: center; }
        main { max-width: 600px; margin: auto; padding: 2rem; background: #fff; border-radius: 12px; box-shadow: 0 8px 28px #00000012; }
        h1 { margin-top: 0; color: #d97706; }
        a { color: #1d4ed8; }
    </style>
</head>
<body>
<main>
    <h1><?= html_escape($heading); ?></h1>
    <p><?= $message; ?></p>
</main>
</body>
</html>
