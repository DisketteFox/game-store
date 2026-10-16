<?php
session_start();
require_once 'config.php';
require_once 'data.php';

if (!isset($_SESSION['email'])) {
    header('Location: ' . RUTA_LOGIN);
    exit;
}

if ($_SESSION['role'] !== 'ADMIN') {
    header('Location: ' . RUTA_DASHBOARD);
    exit;
}

$error = '';
$generosValidos = ['RPG', 'Aventura', 'Acción', 'Estrategia', 'Simulación'];

$nombre = $genero = $desarrollador = $plataforma = $imagen = '';
$precio = '';
$destacado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre        = trim($_POST['nombre'] ?? '');
    $genero        = trim($_POST['genero'] ?? '');
    $desarrollador = trim($_POST['desarrollador'] ?? '');
    $plataforma    = trim($_POST['plataforma'] ?? '');
    $precio        = (float)($_POST['precio'] ?? 0);
    $imagen        = trim($_POST['imagen'] ?? '');
    $destacado     = isset($_POST['destacado']);

    if ($nombre === '' || $genero === '' || $desarrollador === '' || $plataforma === '' || $precio <= 0 || $imagen === '') {
        $error = 'Todos los campos son requeridos.';
    } elseif (!in_array($genero, $generosValidos, true)) {
        $error = 'Género no válido.';
    } else {
        $nextId = !empty($juegos) ? max(array_column($juegos, 'id')) + 1 : 1;

        $juegos[] = [
            'id'            => $nextId,
            'nombre'        => $nombre,
            'genero'        => $genero,
            'plataforma'    => $plataforma,
            'precio'        => $precio,
            'desarrollador' => $desarrollador,
            'imagen'        => $imagen,
            'destacado'     => $destacado,
        ];

        $dataFilePath = __DIR__ . '/data.php';
        $original = file_get_contents($dataFilePath);
        $usersPos = $original !== false ? strpos($original, '$users = [') : false;

        if ($usersPos === false) {
            $error = 'No se pudo leer data.php.';
        } else {
            $newContent = "<?php\n\n"
                . '$juegos = ' . var_export($juegos, true) . ";\n\n"
                . substr($original, $usersPos);

            $result = @file_put_contents($dataFilePath, $newContent, LOCK_EX);

            if ($result === false) {
                $result = @file_put_contents($dataFilePath, $newContent);
            }

            if ($result !== false) {
                if (function_exists('opcache_invalidate')) {
                    opcache_invalidate($dataFilePath, true);
                }
                header('Location: ' . RUTA_DASHBOARD);
                exit;
            }

            $detalle = error_get_last()['message'] ?? 'motivo desconocido';
            $error = 'Error al guardar el juego: ' . $detalle;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Add game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="topbar">
        <?php include 'partials/header.php'; ?>
    </div>
    <div class="form">
        <h1>Add game</h1>

        <?php if ($error !== ''): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form class="game-form" method="POST">
            <div class="field">
                <label for="nombre">Title</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
            </div>

            <div class="field">
                <label for="genero">Genre</label>
                <select id="genero" name="genero" required>
                    <option value="">-- Select Genre --</option>
                    <?php
                    $etiquetas = ['RPG' => 'RPG', 'Aventura' => 'Adventure', 'Acción' => 'Action', 'Estrategia' => 'Strategy', 'Simulación' => 'Simulation'];
                    foreach ($etiquetas as $valor => $etiqueta): ?>
                        <option value="<?= $valor ?>" <?= $genero === $valor ? 'selected' : '' ?>><?= $etiqueta ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="field">
                <label for="desarrollador">Developer</label>
                <input type="text" id="desarrollador" name="desarrollador" value="<?= htmlspecialchars($desarrollador) ?>" required>
            </div>

            <div class="field">
                <label for="plataforma">Platforms</label>
                <input type="text" id="plataforma" name="plataforma" placeholder="e.g., PC, PS5, Xbox Series X" value="<?= htmlspecialchars($plataforma) ?>" required>
            </div>

            <div class="field">
                <label for="precio">Price (€)</label>
                <input type="number" id="precio" name="precio" min="0.01" step="0.01" value="<?= $precio !== '' && $precio > 0 ? htmlspecialchars((string)$precio) : '' ?>" required>
            </div>

            <div class="field">
                <label for="imagen">Image Path</label>
                <input type="text" id="imagen" name="imagen" placeholder="e.g., img/game.jpg" value="<?= htmlspecialchars($imagen) ?>" required>
            </div>

            <div class="field checkbox">
                <label>
                    <input type="checkbox" name="destacado" value="1" <?= $destacado ? 'checked' : '' ?>>
                    Featured
                </label>
            </div>

            <button type="submit" class="btn btn-primario">Add Game</button>
            <a href="<?= RUTA_DASHBOARD ?>" class="btn btn-secundario">Cancel</a>
        </form>
    </div>

    <footer>
        <?php include 'partials/footer.php'; ?>
    </footer>
</body>
</html>