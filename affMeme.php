<?php

session_start();

//--------------------------------------AJOUT TEXTE ET COULEUR DE TEXTE A LIMAGE-------------

if(isset($_POST['texteHaut']) && !empty($_POST['texteHaut']) || isset($_POST['texteBas']) && !empty($_POST['texteBas'])) {
	

	$post = $_POST['texteHaut']; //on recupere les donnes envoyées en ajax(valeur input de modifs)texte du haut
	$color = $_POST['colorHaut'];	
	$tailleHaut = $_POST['tailleHaut'];//on recupere les donnes envoyées en ajax(valeur input de modifs)texte du haut
	$rotationHaut = $_POST['rotationHaut'];
	$topPhraseHaut = $_POST['topPhraseHaut'];//on recupere les donnes envoyées en ajax(valeur input de modifs)texte du haut
	$leftPhraseHaut = $_POST['leftPhraseHaut'];//on recupere les donnes envoyées en ajax(valeur input de modifs)texte du haut
	require_once 'hex2rgb.php'; //appel de la page contenat la fonction hex to rgb
	$colorRgb = hex2rgb($color); // on converti la valeur hexa de linput type color en rgba (texte du haut)
	$c1 = $colorRgb[0]; //red de rgb
	$c2 = $colorRgb[1]; // green  
	$c3 = $colorRgb[2]; //blue


	$post1 = $_POST['texteBas']; //on recupere les valeurs envoyes en ajax(valeur input de modifs) texte du bas
	$color1 = $_POST['colorBas'];	//on recupere les valeurs envoyes en ajax(valeur input de modifs) texte du bas
	$tailleBas = $_POST['tailleBas'];
	$rotationBas = $_POST['rotationBas'];//on recupere les valeurs envoyes en ajax(valeur input de modifs) texte du bas
	$topPhraseBas = $_POST['topPhraseBas'];
	require_once 'hex2rgb.php';//appel de la page contenat la fonction hex to rgb
	$leftPhraseBas = $_POST['leftPhraseBas'];//on recupere les valeurs envoyes en ajax(valeur input de modifs) texte du bas
	$colorRgb1 = hex2rgb($color1); //on converti la valeur hexa de linput type color en rgba (texte du bas)
	$c11 = $colorRgb1[0];//red rgb
	$c21 = $colorRgb1[1]; //green
	$c31 = $colorRgb1[2]; //blue
										  
										  
										  
										  

	$image = imagecreatefromjpeg($_SESSION['image']); //on cree limage sur laquel fair les modifs..image uploadee

	$couleur1 = imagecolorallocate($image, $c11, $c21, $c31); //la couleur du texte du bas
	$couleur2 = imagecolorallocate($image, $c1, $c2, $c3); //la couleur du texte du haut


	//On insere dans limage les deux textes, ils prennent en comte les valeur des input de modifs
	// envoyes en ajax, ce qui nous permet la modif en temps reel  lappui du bouton preview
	imagettftext($image, $tailleHaut, $rotationHaut, $leftPhraseHaut, $topPhraseHaut, $couleur2, 'paprasse/IMPACTED.ttf', $post);
	imagettftext($image, $tailleBas, $rotationBas, $leftPhraseBas, $topPhraseBas, $couleur1, 'paprasse/IMPACTED.ttf', $post1);

	
	ob_start(); //debut variable

		imagejpeg($image);
    	$objet = ob_get_contents();//on place limage dans un variable pour laffichage seulement

    ob_end_clean ();//fin variable

	//on encode en base 64 la variable de limage pour pouvoir la passer dans lattribut src de <img>
	$enc = base64_encode($objet); 
	echo($enc); // preview de limage modifiée





}


?>