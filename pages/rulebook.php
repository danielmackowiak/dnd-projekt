<?php
// Sprawdzenie aktywnej sesji
include("../require/auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rule Book</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>
<body class="body_dashboard">
<div class="sidebar">
    <div class="login-info">
        <img src="../img/avatar-placeholder.png">
            <p>Witaj <br> <?php echo $_SESSION['username']; ?>!</p>
            <a href="../require/logout.php"><button id="button1" class="buttonstyle"><i class="fas fa-sign-out-alt"></i>Wyloguj</button></a>
            <hr class="hr-login-info">
    </div>
    <!-- Sidebar -->
    <div class="menu-sidebar">
         <a href="./dashboard.php"><button id="button2" class="buttonstyle"><i class="fas fa-home"></i>Strona Główna</button></a><br><br>
         <a href="./calendar/index.php"><button id="button3" class="buttonstyle"><i class="fas fa-calendar-alt"></i>Kalendarz</button></a><br><br>
         <a href="./rulebook.php"><button id="button4" class="buttonstyle"><i class="fas fa-book"></i>Rulebook</button></a><br><br>
    </div>
</div>
<!-- Dodanie podglądu pliku PDF -->
<div class="pdf">
  <object data="../Rulebook.pdf" type="application/pdf" width="88%" height="100%">
      <embed src="../Rulebook.pdf" type="application/pdf">
          <p>Twoja przeglądarka nie wspiera plików PDF, kliknij tutaj aby pobrać: <a href="../Rulebook.pdf">Pobierz plik PDF</a>.</p>
      </embed>
</object>
</div>
</body>
</html>