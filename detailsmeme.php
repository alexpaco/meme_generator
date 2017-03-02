<?php
	require 'connexion.php';

	$id_meme = $_GET['id'];
	$url = "http://pacoret.chalon.codeur.online/meme_generator/detailsmeme.php?id=".$id_meme;

	$meme = $bdd->prepare('SELECT * FROM memedefaut WHERE nom = ?');
	$meme->execute(array($id_meme));
	
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
	<?php 
	while($row1 = $meme->fetch()){?>
		<img class="imagedetail" src="images/memeFini/<?= $row1['nom']; ?>.jpg">
		<div class="rien">
			<h2><?= $row1['nom']; ?></h2>
			<p>Créer par: <?=  $row1['auteur'] ?></p>
			<a href="http://www.facebook.com/sharer/sharer.php?url=<?= $url; ?>" class="fa fa-facebook twitter" target="_blank"></a>
			<a href="https://twitter.com/intent/tweet/?url=<?= $url; ?>" class="fa fa-twitter twitter" target="_blank"></a>
		</div>
		<?php } ?>
	</div>
</body>
</html>