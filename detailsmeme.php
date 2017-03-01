<?php
	require 'connexion.php';

	$id_meme = $_GET['id'];
	$auteur_meme = $_GET['name'];
	$url = "http://localhost/13_meme_generator/detailsmeme.php?id=";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Meme | <?= $id_meme;?></title>
	<link rel="stylesheet" type="text/css" href="page_accueil.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<meta charset="utf-8">
</head>
<body>
	<header>
		<p class="logo">FQM<span id="spanLogo">Faites qu'on meme</span></p>
		<a class="creer" href="index.php">Retour</a>
	</header>
	</br>
	<div class="presentation">
		<img class="imagedetail" src="images/memeFini/<?= $id_meme; ?>.png">
		<div class="rien">
			<h2><?= $id_meme; ?></h2>
			<p>Créer par: <?=  $auteur_meme; ?></p>
			<a href="http://www.facebook.com/sharer/sharer.php?url=<?= $url; ?><?= $id_meme ?>&name=<?= $auteur_meme; ?>" class="fa fa-facebook twitter" target="_blank"></a>
			<a href="https://twitter.com/intent/tweet/?url=<?= $url; ?><?= $id_meme ?>&name=<?= $auteur_meme; ?>" class="fa fa-twitter twitter" target="_blank"></a>
		</div>
	</div>
</body>
</html>