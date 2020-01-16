<!doctype html>
<html lang="PL_pl">
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Fondamento" rel="stylesheet">
		<title> Galeria Asperii </title>
		<link href="galeria_style.css" rel="stylesheet" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
		</script>
		
		<script>
		function textin(e, txt) {
			document.getElementById(e).innerHTML = txt;
		}
		
		function textout(e) {
			document.getElementById(e).innerHTML = '&nbsp;'; }
			
		</script>
	</head>
	
	<body>
		<div id="lupa">
		<img id="lupka" src="../img/img_gallery/symbole_lupa_duza.png"/>
		</div>
		
		<div id="logo">
		<a href="gallery_main.php">
		<img class="title" src="../img/img_gallery/Galeria_Asperii1.png"/>
		</a>
		
		<a href="../index.php">
		<img id="logotyp" src="../img/logo/logo0.png"/>
		</a>
		
		<a href="gallery_main.php">
		<img class="title" src="../img/img_gallery/Galeria_Asperii2.png"/>
		</a>
		</div>
	
		<div id="wybor">
		<div class="symbol">
		<a href="natura/gallery_nature.php">
		<img class="imgsymbol" id="natura" src="../img/img_gallery/symbole_natura_(obraz).png" 
		onmouseenter="textin('text1', 'Natura');" onmouseleave="textout('text1');"/>
		</a>
		<p class="text" id="text1">
		&nbsp;
		</p>
		</div>
		
		<div class="symbol">
		<a href="postaci/gallery_characters.php">
		<img class="imgsymbol" id="portrety" src="../img/img_gallery/symbole_portrety_(obraz).png" 
		onmouseenter="textin('text2', 'Postacie');" onmouseleave="textout('text2');"/>
		</a>
		<p class="text" id="text2">
		&nbsp;
		</p>
		</div>
		
		<div class="symbol">
		<a href="miejsca/gallery_places.php">
		<img class="imgsymbol" id="miejsca" src="../img/img_gallery/symbole_miejsca_(obraz).png" 
		onmouseenter="textin('text3', 'Miejsca');" onmouseleave="textout('text3');"/>
		</a>
		<p class="text" id="text3">
		&nbsp;
		</p>
		</div>
		
		<div class="symbol">
		<a href="rozne/gallery_miscellaneous.php">
		<img class="imgsymbol" id="rozne" src="../img/img_gallery/symbole_rozne_(obraz).png" 
		onmouseenter="textin('text4', 'Różne');" onmouseleave="textout('text4');"/>
		</a>
		<p class="text" id="text4">
		&nbsp;
		</p>
		</div>
	
	</body>
</html>