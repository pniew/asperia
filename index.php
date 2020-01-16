<?php
session_start();
?>
<!doctype html>
<html lang="PL-pl">
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Asperia</title>
	<link href="mp_style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" ref="stylesheet">
	
	<style>
	
	</style>
	</head>
	
	<body style="background-color:black;">
	
	<div id="tlo">
	
	<div id="log">
	<?php
		
	if (isset($_SESSION['login'])){
		$nazwa_uzytkownika = $_SESSION['login'];
	}
	if (!isset($_SESSION['login']) or $nazwa_uzytkownika == "") {
		echo "<a href=\"logowanie.php\">
		<img id=\"login\" src=\"img/img_main/symbole_login.png\"> </a>"; }
	
	else {echo " <a href=\"Profil/profil_uzytkownika.php\">
	<img id=\"login\" src=\"img/img_main/symbole_login.png\"> </a>"; }
	?>
	</div>
	
	<div id="logo">
	<img id="logotyp" src="img/img_main/Asperia_napis.png" alt="ASPERIA"/>
	</div>
	
	<div id="menu">
	<ul>
		<li> 
			
			<a href="Kroniki/chronicles_main.php">
			<img id="kron" src="img/img_main/Kroniki_napis.png" alt="Kroniki Asperii"/>
			</a>
			
		</li>
		
		<li> 
			<a href="Encyklopedia/encyclopaedia_main.php">
			<img id="enc" src="img/img_main/Encyklopedia_napis.png" alt="Encyklopedia Asperii"/>
			</a>
			
		</li>
		
		<li> 
			
			<a href="Galeria/gallery_main.php">
			<img id="gal" src="img/img_main/Galeria_napis.png" alt="Galeria Asperii"/>
			</a>
			
		</li>
		
		<li> 
			
			<a href="Forum/">
			<img id="for" src="img/img_main/Forum_napis.png" alt="Forum Asperii"/>
			</a>
			
		</li>
	</ul>
	 
	</div>
	</body>
</html>