<?php
session_start();
include_once "../data.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php");
    exit();
}

$user_input = $_POST['email'] ?? '';
$pass_input = $_POST['password'] ?? '';

$found = false;

foreach ($users as $user) {
    if (!$found && $user['email'] === $user_input && password_verify($pass_input, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $found = true;
    }
}

if ($found) {
    header("Location: ../dashboard.php");
    exit();
} else {
    header("Location: ../login.php?error=1");
    exit();
}
?>
