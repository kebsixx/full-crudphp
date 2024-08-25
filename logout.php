<?php

session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>
        alert('Login dulu bro');
        document.location.href = 'login.php';
    </script>";
    exit;
}

// kosongkoan session
$_SESSION = [];

session_unset();
session_destroy();
header("Location: login.php");
