<?php
include 'data.php';
include 'controllers/cardRenderer.php';
?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="favicon.png">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="topbar">
        <?php include 'partials/header.php'; ?>
    </div>
    <div class="content">
        <div class="hero">
            <h1>Game Store</h1>
            <h2>This is the best game store out there</h2>
        </div>
        <div class="games">
            <h1>Destacados</h1>
            <div class="catalog">
                <?php foreach ($juegos as $juego): ?>
                    <?php if ($juego["destacado"]): ?>
                        <?php pintarTarjeta($juego); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <h1>Por menos de 60€</h1>
            <div class="catalog">
                <?php foreach ($juegos as $juego): ?>
                    <?php if ($juego["precio"] < 60): ?>
                        <?php pintarTarjeta($juego); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <h1>RPGs</h1>
            <div class="catalog">
                <?php foreach ($juegos as $juego): ?>
                    <?php if ($juego["genero"] == 'RPG'): ?>
                        <?php pintarTarjeta($juego); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer><?php include 'partials/footer.php'; ?></footer>
</body>
</html>