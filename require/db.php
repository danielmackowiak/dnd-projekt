<?php
    // Łączenie z bazą danych.
    $con = mysqli_connect("localhost","root","","projektdm");
    // Sprawdzenie połączenia z bazą danych.
    if (mysqli_connect_errno()){
        echo "Błąd połączenia z bazą MySQL: " . mysqli_connect_error();
    }
?>
