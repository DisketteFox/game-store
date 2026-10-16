<?php
session_start();
include_once "config.php";
include_once "data.php";

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$total_items = count($juegos);
$user_email = $_SESSION['email'] ?? 'Usuario';
$user_role = $_SESSION['role'] ?? 'USER';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Game Catalog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="topbar">
        <?php include 'partials/header.php'; ?>
    </div>

    <main class="container_dashboard">
        <section class="dashboard_header">
            <h2>Panel de Control</h2>
            <div class="user_info">
                <p><strong>Usuario:</strong> <?= htmlspecialchars($user_email) ?></p>
                <p><strong>Rol:</strong> <span class="role_badge role_<?= strtolower($user_role) ?>"><?= htmlspecialchars($user_role) ?></span></p>
            </div>
        </section>

        <section class="dashboard_stats">
            <div class="stat_card">
                <h3>Catálogo</h3>
                <p class="stat_number"><?= $total_items ?></p>
                <p class="stat_label">Juegos en total</p>
            </div>
        </section>

        <?php if ($user_role === 'ADMIN'): ?>
            <section class="dashboard_actions">
                <h3>Acciones de Administrador</h3>
                <a class="btn btn_primary" href="/sandbox/project1/add_item.php">
                    <span class="icon">+</span> Agregar Juego
                </a>
            </section>
        <?php endif; ?>
    </main>

    <footer>
        <?php include 'partials/footer.php'; ?>
    </footer>
</body>
</html>
