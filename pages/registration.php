<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="../style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>
<body class="body_register">
<?php
    require('../require/db.php');
    // Po wypełnieniu formalurza, dane zapisywane są w bazie danych (SystemLogowania).
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        //Zapobiega wpisywaniu znaków specjalnych pod rząd (... , ,,, , itp.).
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("d-m-Y H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Pomyślnie zarejestrowano.</h3><br/>
                  <p class='link'>Kliknij tutaj aby się <a href='./login.php'>Zalogować</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Proszę wypełnić wszystkie pola.</h3><br/>
                  <p class='link'>Kliknij tutaj aby <a href='./registration.php'>zarejestrować</a> się ponownie.</p>
                  </div>";
        }
    } else {
?>
<!-- Zdjęcie w lewym górnym rogu na ekranie logowania -->
<div class="dnd">
    <img src="../img/DnD2.png">
</div>
    <form class="form" action="" method="post">
        <h1 class="login-title">Rejestracja</h1>
        <input type="text" class="login-input" name="username" placeholder="Login" required />
        <input type="text" class="login-input" name="email" placeholder="Email">
        <input type="password" class="login-input" name="password" placeholder="Hasło">
        <button type="submit" name="submit" value="Zarejestruj" class="login-button"><i class="fas fa-user-check"></i>Zarejestruj</button>
        <p class="link">Posiadasz już konto? <a href="./login.php">Zaloguj się</a></p>
    </form>
        <!-- Muzyka w tle -->
			<audio id="bgm_music" autoplay autostart loop>
					<source src="../audio/background_music.mp3" type="audio/mp3">
			</audio>
            <!-- Proste zmniejszenie głośności -->
			<script>
                var audio = document.getElementById("bgm_music");
                audio.volume = 0.18;
			</script>
<?php
    }
?>
</body>
</html>
