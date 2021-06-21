<?php
    session_start();
    // Sprawdzanie aktywnej sesji
    if(!isset($_SESSION["username"])) {
        header("Location: ../pages/login.php");
        exit();
    }
?>
