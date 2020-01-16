<?php
//check cookie
$error = $_COOKIE['error'];

//delete cookie
setcookie("TestCookie", "", time() - 3600);

?>


<!doctype html>
<html lang="PL-pl">
<html>
	<head>
	<meta charset="utf-8">
	<title>Wystąpił błąd</title>
	<link href="https://fonts.googleapis.com/css?family=Fondamento" rel="stylesheet">
	<link href="rej_style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body style="background-color:black;">
	
	<div id="logodiv">
	<a href="index.php">
		<img id="logo" src="img/logo/logo0.png" alt="Strona Główna"/>
	</a>
	</div>
	
	<div id="Udane">
	<p> Wystąpił błąd: </p>
	<?php echo $error ?>
	</div>
	
	<div id="powrot" style="width: 500px; margin: 50px auto;">
	<p><?php if($error=="logowanie nie powiodło się") {echo "<a href=\"logowanie.php\" ";} else {echo "<a href=\"rejestracja.php\" ";}?>
	>Kliknij, aby spróbować ponownie </a></p>
	</div>
	
	</body>
	</html>