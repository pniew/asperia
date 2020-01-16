<?php
session_start();
require_once "config.php";
global $link;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['login'])) $login = $_POST['login'];
    else $login = "";
    if (isset($_POST['pass'])) $pass = $_POST['pass'];
    else $pass = "";


    $q = "select `user_id` from users where login = '$login' and password = MD5('$pass')";
    $row = "";
    if (!$link) die('Connection broken');
    else {
        $result = mysqli_query($link, $q);
        if ($result === false) {
            echo "<p>" . mysqli_error($link) . "</p>";
        }
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        var_dump($row);
    }

    if (isset($row[0])) {
        $_SESSION['login'] = $login;
        $_SESSION["user_id"] = $row[0];
        echo "<meta http-equiv=\"refresh\" content=\"0; url=strona_chwilowa.php\">";
    } else {
        setcookie("error", "logowanie nie powiodło się");
        echo "<meta http-equiv=\"refresh\" content=\"0; url=zue.php\">";
    }
}
?>


<!doctype html>
<html lang="PL-pl">
<html>

<head>
    <meta charset="utf-8">
    <title>Logowanie</title>
    <link href="https://fonts.googleapis.com/css?family=Fondamento" rel="stylesheet">
    <link href="log_style.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-color:black;">

    <div id="logodiv">
        <a href="index.php">
            <img id="logo" src="img/logo/logo0.png" alt="Strona Główna" />
        </a>
    </div>


    <div id="okno_logowania">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p> Login: <input type="text" name="login" /> </p>
            <p> Hasło: <input type="password" name="pass" /> </p>
            <button type="submit"> Zaloguj </button>
        </form>
    </div>

    <div id="czy_rejestracja" style="width: 500px; margin: 50px auto;">
        <p> Nie masz konta? <br /> Kliknij <a href="rejestracja.php">tutaj, </a>aby się zarejestrować. </p>
    </div>

</body>

</html>