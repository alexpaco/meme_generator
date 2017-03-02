<?php 
	session_start();
	require 'connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page Accueil</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="page_accueil.css">
	<meta charset="utf-8">

</head>
<body>
	<header>
		<p class="logo">FQM<span id="spanLogo">Faites qu'on meme</span></p>
		<a class="creer" href="creationmemes.php">Je créé mon meme</a>

	</header>
	<h1>Tous les memes</h1>
	<div class="memepresentation">
		<?php 
		$memes = $bdd->query('SELECT * FROM memedefaut ORDER BY id DESC');

		$url = "http://pacoret.chalon.codeur.online/meme_generator/detailsmeme.php?id=";

		while($row = $memes->fetch()){?>
			<div class="meme">
			<a href="detailsmeme.php?id=<?= $row['nom']; ?>"><img class="memedefaut" src="images/memeFini/<?= $row['nom']; ?>.jpg"/></a>
			<p><?= $row['nom']; ?></p>
			<p>Créé par : <?= $row['auteur']; ?></p>
			<a href="http://www.facebook.com/sharer/sharer.php?url=<?= $url; ?><?= $row['nom']; ?>" class="fa fa-facebook twitter" target="_blank"></a>
			<a href="https://twitter.com/intent/tweet/?url=<?= $url; ?><?= $row['nom']; ?>" class="fa fa-twitter twitter" target="_blank"></a>

			</div>
		<?php } ?>
	</div>
</body>
</html>

