<!doctype html>
<html lang="PL_pl">
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Fondamento" rel="stylesheet">
		<title> Galeria Asperii - Miejsca</title>
		<link href="galeria_places_style.css" rel="stylesheet" type="text/css"/>
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
		<img id="lupka" src="../../img/img_gallery/symbole_lupa_duza.png"/>
		</div>
		
		<div id="logo">
		<a href="../gallery_main.php">
		<img id="logotyp" src="../../img/img_gallery/Galeria_Asperii.png"/>
		</a>
		</div>
	
		<div id="wybor">
		<div class="symbol">
		<a href="">
		<img class="imgsymbol" id="natura" src="../../img/img_gallery/symbole_natura_(obraz).png" 
		onmouseenter="textin('text1', 'Natura');" onmouseleave="textout('text1');"/>
		</a>
		<p class="text" id="text1">
		&nbsp;
		</p>
		</div>
		
		<div class="symbol">
		<a href="">
		<img class="imgsymbol" id="portrety" src="../../img/img_gallery/symbole_portrety_(obraz).png" 
		onmouseenter="textin('text2', 'Postacie');" onmouseleave="textout('text2');"/>
		</a>
		<p class="text" id="text2">
		&nbsp;
		</p>
		</div>
		
		<div class="symbol">
		<a href="">
		<img class="imgsymbol" id="miejsca" src="../../img/img_gallery/symbole_miejsca_(obraz).png" 
		onmouseenter="textin('text3', 'Miejsca');" onmouseleave="textout('text3');"/>
		</a>
		<p class="text" id="text3">
		&nbsp;
		</p>
		</div>
		
		<div class="symbol">
		<a href="">
		<img class="imgsymbol" id="rozne" src="../../img/img_gallery/symbole_rozne_(obraz).png" 
		onmouseenter="textin('text4', 'Różne');" onmouseleave="textout('text4');"/>
		</a>
		<p class="text" id="text4">
		&nbsp;
		</p>
		</div>
		</div>
		
		<div id="ramka_glowna">
		<div id="pasek_lewy">
		sdrf
		<img src="../../img/img_gallery/img_gallery_places/mapazlotamala.png"/>
		</div>
		
		
		
		
		</div>
		
	
	</body>
</html>