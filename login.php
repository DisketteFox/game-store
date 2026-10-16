<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning JavaScript</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="content">
        <h1>Login to account</h1>
        <form class="form" action="controllers/middleware.php" method="POST">
            <div class="mb-3 form-div">
                <label class="form-label" for="email">Username</label>
                <br>
                <input type="email" class="form-input" name="email" id="email" required>
            </div>
            <br>
            <div class="mb-3 form-div">
                <label class="form-label" for="password">Password</label>
                <br>
                <input type="password" class="form-input" name="password" id="password" required>
            </div>
            <?php if (isset($_GET["error"])): ?>
                <p class="error-msg">Incorrect username or password</p>
            <?php endif; ?>
            <div class=" form-div">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html>