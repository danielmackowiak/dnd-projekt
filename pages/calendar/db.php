<?php
// Łączenie z bazą danych
$conn = mysqli_connect("localhost","root","","projektdm") ;

//Błąd połączenia z bazą, wiadomość zwrotna
if (!$conn) {
echo "Nie udało połączyć się z baza MySQLi: " . mysqli_connect_error();
}
?>