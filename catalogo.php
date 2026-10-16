<?php
require_once 'config.php';
require_once 'data.php';

$pageTitle = "Full Catalog";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="topbar">
        <?php include 'partials/header.php'; ?>
    </div>
    <div class="content">
        <div class="games">
            <h1>Destacados</h1>
            <div class="catalog-grid">
                <?php foreach ($juegos as $juego): ?>
                    <?php pintarTarjeta($juego); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer><?php include 'partials/footer.php'; ?></footer>
</body>
</html>
