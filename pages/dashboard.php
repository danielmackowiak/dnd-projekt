<?php
// Sprawdzenie aktywnej sesji
include("../require/auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>
<body class="body_dashboard">
<div class="sidebar">
    <div class="login-info">
        <img src="../img/avatar-placeholder.png">
            <p>Witaj<br> <?php echo $_SESSION['username']; ?>!</p>
            <a href="../require/logout.php"><button id="button1" class="buttonstyle"><i class="fas fa-sign-out-alt"></i>Wyloguj</button></a>
            <hr class="hr-login-info">
    </div>
    <div class="menu-sidebar">
         <a href="./dashboard.php"><button id="button2" class="buttonstyle"><i class="fas fa-home"></i>Strona Główna</button></a><br><br>
         <a href="./calendar/index.php"><button id="button3" class="buttonstyle"><i class="fas fa-calendar-alt"></i>Kalendarz</button></a><br><br>
         <a href="./rulebook.php"><button id="button4" class="buttonstyle"><i class="fas fa-book"></i>Rulebook</button></a><br><br>
    </div>
</div>
    <div class="newsfeed">
        <div class="text-newsfeed">
           <p><i class="fas fa-newspaper"></i>Najnowsze wiadomości</p>
        </div>
        <hr class="hr-newsfeed">
        <script src="//rss.bloople.net/?url=https%3A%2F%2Fwww.dndbeyond.com%2Fposts.rss&limit=4&showtitle=false&showicon=true&type=js"></script>
    </div>
    <div class="chat">
        <div class="text-chat">
           <p><i class="fas fa-comments"></i>Chat</p>
        </div>
        <hr class="hr-chat">

    </div>
</body>
</html>
