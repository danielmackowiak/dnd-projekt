<?php
    session_start();
    // Niszczenie sesji po kliknieciu wyloguj
    if(session_destroy()) {
        // oraz przekierowanie do strony logowania
        header("Location: ../pages/login.php");
    }
?>
