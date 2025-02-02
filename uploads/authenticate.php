<?php
session_start();

$correctPassword = 'aero7-2024'; // Setzen Sie hier Ihr Passwort

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['password']) && $_POST['password'] === $correctPassword) {
        $_SESSION['authenticated'] = true;
        header('Location: upload.php');
        exit();
    } else {
        echo 'Falsches Passwort. Bitte versuchen Sie es erneut.';
    }
}
?>