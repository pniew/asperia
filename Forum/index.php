<?php 
require_once "../config.php";
global $link;

	if (empty($_GET["cat_id"]) || $_GET["cat_id"] === "") {

		$query = "select * from categories";
		if (!$link) die ('Connection broken'); else {
			$result = mysqli_query($link, $query);
			if ($result===false) {
				echo "<p>".mysqli_error($link)."</p>";
			}
			$categories = mysqli_fetch_all($result, MYSQLI_NUM);		
		}
		if ($categories==NULL) $categories = array();

		foreach($categories as $cat){
			$query = "select * from threads where category=".$cat[0]." limit 3";
			$result2 = mysqli_query($link, $query);
			if ($result2===false) {
				echo "<p>".mysqli_error($link)."</p>";
			}
			$threads[$cat[0]] = mysqli_fetch_all($result2, MYSQLI_NUM);
			if ($threads==NULL) $threads = array();
		}
	}

	elseif (isset($_GET["cat_id"])){
		$active_category_id = mysqli_real_escape_string($link, $_GET["cat_id"]);
		$query = "SELECT thread_id, threads.NAME, category, categories.NAME FROM `threads` left JOIN `categories` on `threads`.`category` = `categories`.`category_id` WHERE `category`=".$active_category_id."";
			$result2 = mysqli_query($link, $query);
			if ($result2===false) {
				echo "<p>".mysqli_error($link)."</p>";
				$_COOKIE['error'] = "Nie istnieje taka kategoria lub wystąpiły inne nieprzewidziane efekty kwantowe";
			}
			$threads[$active_category_id] = mysqli_fetch_all($result2, MYSQLI_NUM);
			if ($threads==NULL) $threads = array();
			//echo "<pre>";
			//var_dump($threads);
			$name = $threads[$_GET["cat_id"]][0][3];
	}
	
?>

<!doctype html>
<html lang="PL_pl">
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Fondamento" rel="stylesheet">
		<title> Forum Asperii </title>
		<link href="forum_style.css" rel="stylesheet" type="text/css"/>
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
		<img id="lupka" src="../img/img_forum/symbole_lupa_duza.png"/>
		</div>
		
		<div id="logo">
		<a href="../forum">
		<img class="title" id="t1" onmouseover="hoverTitle()" onmouseout="unhoverTitle()" src="../img/img_forum/Forum_Asperii1.png"/>
		</a>
		
		<a href="../">
		<img id="logotyp" src="../img/logo/logo0.png"/>
		</a>
		
		<a href="../forum">
		<img class="title" id="t2" onmouseover="hoverTitle()" onmouseout="unhoverTitle()" src="../img/img_forum/Forum_Asperii2.png"/>
		</a>
		</div>
		
			<?php 
			if (empty($_GET["cat_id"]) || $_GET["cat_id"] === "") {
				foreach ($categories as $caption){
					if (!empty($threads[$caption[0]])){
					echo "
					<div class=\"tablesdiv\">
					<table class=\"table\">
						<caption><a href=\"?cat_id=$caption[0]\">$caption[1]</a></caption>
						<tr>
							<th>Wątki</th>
							<th>Posty</th>
							<th>Ostatni post</th>
						</tr>";
						foreach ($threads[$caption[0]] as $thread){
							echo"
							<tr>
								<td><a href=\"viewtopic?thread=$thread[0]\">$thread[1]</a></td>
								<td>empty_posty</td>
								<td>empty_ostatni_post</td>
							</tr>";
						}
					echo "
					</table>
					</div>
					";
					}
				}
			}

			elseif (isset($_GET["cat_id"])){
				echo "
				<div class=\"tablesdiv\">
					<table class=\"table\">
						<caption>$name</caption>
						<tr>
							<th>Wątki</th>
							<th>Posty</th>
							<th>Ostatni post</th>
						</tr>";
						foreach ($threads[$active_category_id] as $thread){
							echo"
							<tr>
								<td><a href=\"viewtopic/?thread=$thread[0]\">$thread[1]</a></td>
								<td>empty_posty</td>
								<td>empty_ostatni_post</td>
							</tr>";
						}
					echo "
					</table>
					</div>
					";
			}

			?>

	
	<script>
		function hoverTitle() {
			document.getElementById("t1").style.opacity="70%";
			document.getElementById("t2").style.opacity="70%";
		}
		function unhoverTitle() {
			document.getElementById("t1").style.opacity="100%";
			document.getElementById("t2").style.opacity="100%";
		}
	</script>
	</body>
</html>