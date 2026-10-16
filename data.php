<?php

$juegos = array (
  0 => 
  array (
    'id' => 1,
    'nombre' => 'Elden Ring',
    'genero' => 'RPG',
    'plataforma' => 'PC, PS5, Xbox Series X',
    'precio' => 59.99000000000000198951966012828052043914794921875,
    'desarrollador' => 'FromSoftware',
    'imagen' => 'img/eldenring.jpg',
    'destacado' => true,
  ),
  1 => 
  array (
    'id' => 2,
    'nombre' => 'Baldur\'s Gate 3',
    'genero' => 'RPG',
    'plataforma' => 'PC, PS5',
    'precio' => 69.9899999999999948840923025272786617279052734375,
    'desarrollador' => 'Larian Studios',
    'imagen' => 'img/baldoursgate.jpg',
    'destacado' => true,
  ),
  2 => 
  array (
    'id' => 3,
    'nombre' => 'Cyberpunk 2077',
    'genero' => 'RPG',
    'plataforma' => 'PC, PS5, Xbox Series X',
    'precio' => 49.99000000000000198951966012828052043914794921875,
    'desarrollador' => 'CD Projekt Red',
    'imagen' => 'img/cyberpunk.jpg',
    'destacado' => false,
  ),
  3 => 
  array (
    'id' => 4,
    'nombre' => 'Tears of the Kingdom',
    'genero' => 'Aventura',
    'plataforma' => 'Nintendo Switch',
    'precio' => 69.9899999999999948840923025272786617279052734375,
    'desarrollador' => 'Nintendo',
    'imagen' => 'img/zelda.png',
    'destacado' => true,
  ),
  4 => 
  array (
    'id' => 5,
    'nombre' => 'Starfield',
    'genero' => 'RPG',
    'plataforma' => 'PC, Xbox Series X',
    'precio' => 69.9899999999999948840923025272786617279052734375,
    'desarrollador' => 'Bethesda Game Studios',
    'imagen' => 'img/starfield.jpg',
    'destacado' => false,
  ),
  5 => 
  array (
    'id' => 6,
    'nombre' => 'Final Fantasy XVI',
    'genero' => 'RPG',
    'plataforma' => 'PS5',
    'precio' => 69.9899999999999948840923025272786617279052734375,
    'desarrollador' => 'Square Enix',
    'imagen' => 'img/finalfantasy.png',
    'destacado' => true,
  ),
  6 => 
  array (
    'id' => 7,
    'nombre' => 'Hogwarts Legacy',
    'genero' => 'RPG',
    'plataforma' => 'PC, PS5, Xbox Series X',
    'precio' => 59.99000000000000198951966012828052043914794921875,
    'desarrollador' => 'Avalanche',
    'imagen' => 'img/hogwarts.jpg',
    'destacado' => false,
  ),
  7 => 
  array (
    'id' => 8,
    'nombre' => 'Sonic Heroes',
    'genero' => 'Acción',
    'plataforma' => 'PC, PS2, GameCube, Xbox',
    'precio' => 29.989999999999998436805981327779591083526611328125,
    'desarrollador' => 'Sega',
    'imagen' => 'img/sonic.png',
    'destacado' => true,
  ),
);

$users = [
    [
        'id' => 1,
        'name' => 'Juan García',
        'email' => 'juan@example.com',
        'role' => 'ADMIN',
        'password' => password_hash('admin123', PASSWORD_BCRYPT),
    ],
    [
        'id' => 2,
        'name' => 'María López',
        'email' => 'maria@example.com',
        'role' => 'USER',
        'password' => password_hash('user123', PASSWORD_BCRYPT),
    ],
    [
        'id' => 3,
        'name' => 'Carlos Fernández',
        'email' => 'carlos@example.com',
        'role' => 'USER',
        'password' => password_hash('pass456', PASSWORD_BCRYPT),
    ],
    [
        'id' => 4,
        'name' => 'Ana Nuñez',
        'email' => 'ana@example.com',
        'role' => 'ADMIN',
        'password' => password_hash('admin456', PASSWORD_BCRYPT),
    ]
];



function pintarTarjeta($item) { ?>
    <div class="card <?= $item["destacado"] ? 'destacado' : '' ?>">
        
        <div class="tarjeta-imagen" style="text-align: center;">
            <img src="<?= $item["imagen"] ?>" alt="<?= $item["nombre"] ?>" height="400">
        </div>

        <div class="tarjeta-contenido">
            <h2><?= $item["nombre"] ?></h2>
            
            <p class="campo"><strong>Género:</strong> <?= $item["genero"] ?></p>
            <p class="campo"><strong>Desarrolladora:</strong> <?= $item["desarrollador"] ?></p>
            <p class="campo precio" style="text-align: right;"><strong><?= $item["precio"] ?> €</strong></p>
            
            <div class="tarjeta-botones" style="text-align: right;">
                <button class="btn btn-primario">Añadir al carrito</button>
                <button class="btn btn-secundario">Ver detalles</button>
            </div>
        </div>

    </div>
<?php }