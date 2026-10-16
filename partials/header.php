<?php
    session_start();
?>

<ul>
    <li><a href="/sandbox/project1">Home</a></li>
    <li><a href="/sandbox/project1/catalogo.php">Catalog</a></li>
    <?php if (!isset($_SESSION['email'])): ?>
        <li><a href="/sandbox/project1/login.php">Login</a></li>
    <?php else: ?>
        <li><a href="/sandbox/project1/dashboard.php">Dashboard</a></li>
        <li><a href="/sandbox/project1/controllers/logout.php">Logout</a></li>
    <?php endif; ?>
    <li><a href="https://github.com/DisketteFox/">GitHub</a></li>
</ul>
