<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Logowanie</title>
    <link rel="stylesheet" href="../style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>
<body class="body_login">
<?php
    require('../require/db.php');
    session_start();
    // Po wypełnieniu formularza, sprawdza oraz tworzy sesje użytkowanika //
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Sprawdzenie czy podany user istnieje //
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
             // W przypadku gdy dany user istnieje przekierowuje na strone główną //
            header("Location: ./dashboard.php");
        } else {
            // W przypadku gdy dany user nie istnieje wyskakuje podany błąd //
            echo "<div class='form'>
                  <h3>Nieprawidłowy Login / Hasło.</h3><br/>
                  <p class='link'>Kliknij tutaj aby <a href='login.php'>zalogować się</a> ponownie.</p>
                  </div>";
        }
    } else {
?>
<!-- Zdjęcie w lewym górnym rogu na ekranie logowania -->
<div class="dnd">
    <img src="../img/DnD2.png">
</div>
<!-- Podstawowy formularz -->
<div class="content">
    <form class="form" method="post" name="login">
        <h1 class="login-title">Logowanie</h1>
        <input type="text" class="login-input" name="username" placeholder="Login" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Hasło"/>
        <button type="submit" value="Zaloguj się" name="submit" class="login-button"/><i class="fas fa-sign-in-alt"></i>Zaloguj się</button>
        <p class="link">Nie masz jeszcze konta? <a href="./registration.php">Zarejestruj się!</a></p><br>
    <!-- Muzyka w tle -->
			<audio id="bgm_music" autoplay autostart loop>
					<source src="../audio/background_music.mp3" type="audio/mp3">
			</audio>
            <!-- Proste zmniejszenie głośności -->
			<script>
                var audio = document.getElementById("bgm_music");
                audio.volume = 0.18;
			</script>
    </form>
<div>    
<?php
    }
?>
</body>
</html>
