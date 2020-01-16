<?php
require_once "config.php";
global $link;
if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['login'])) $login = $_POST['login'];
		else $login = "";
	if(isset($_POST['pass'])) $pass = $_POST['pass'];
		else $pass = "";
	if(isset($_POST['pass2'])) $pass2 = $_POST['pass2'];
		else $pass2 = "";
	
	if(strlen($pass)>=5 && strlen($login)>=3) {
	
		if($pass !== $pass2) {
			$login = "";
			$pass = "";
			$pass2 = "";
			setcookie("error", "hasła niezgodne" );
			echo "<meta http-equiv=\"refresh\" content=\"0; url=zue.php\">" /* hasla niezgodne */; 
		}
			
		else {
			$q = "select 'istnieje' from users where login = '$login' ";
			$row = "";
			if (!$link) die ('Connection broken'); else {
				$result = mysqli_query($link, $q);
				if ($result===false) {
				echo "<p>".mysqli_error($link)."</p>";
				}
			$row = mysqli_fetch_array($result, MYSQLI_NUM);}
			if ($row[0] == 'istnieje' ) {				
				setcookie("error", "login zajęty" );
				echo "<meta http-equiv=\"refresh\" content=\"0; url=zue.php\">"; /*login zajety */}
			else {
				$query = "insert into users(login,password) values('$login',MD5('$pass'))";
				@mysqli_query($link,$query)  or die ("<br/>Zapytanie do bazy query nie jest poprawne.");			
				echo "<meta http-equiv=\"refresh\" content=\"0; url=success.php\">";}
		}
	}
	
	else {
		setcookie("error", "za mało znakow: login min 3, pass min 5" );
		echo "<meta http-equiv=\"refresh\" content=\"0; url=zue.php\">"; /* za malo znakow - pass min 5, login min 3 */
		}


}
?>

<!doctype html>
<html lang="PL-pl">
<html>
	<head>
		<meta charset="utf-8">
		<title>Rejestracja</title>
		<link href="https://fonts.googleapis.com/css?family=Fondamento" rel="stylesheet">
		<link href="rej_style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body style="background-color:black;">
	
	<div id="logodiv">
		<a href="index.php">
			<img id="logo" src="img/logo/logo0.png" alt="Strona Główna"/>
		</a>
	</div>
	
	<div id="okno_rejestracji">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<p> Podaj login: <input type="text" name="login"/> </p>
			<p> Podaj hasło: <input type="password" name="pass"/> </p>
			<p> Powtórz hasło: <input type="password" name="pass2"/> </p>
			<button type="submit"> Załóż konto </button>
		</form>
	</div>
	
	<div id="czy_logowanie" style="width: 500px; margin: 50px auto;">
	<p> Masz już konto? <br/> Kliknij <a href="logowanie.php">tutaj, </a>aby się zalogować. </p>
	</div>
	
	
	</body>
	</html>