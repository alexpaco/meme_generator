<?php

session_start();
//--------------------------------------AJOUT TEXTE ET COULEUR DE TEXTE A LIMAGE-------------

if(isset($_POST['texteHaut']) && !empty($_POST['texteHaut']) || isset($_POST['texteBas']) && !empty($_POST['texteBas']))
{
	

	$post = $_POST['texteHaut']; //on recupere les donnes envoyées en ajax(valeur input de modifs)texte du haut
	$color = $_POST['colorHaut'];	//on recupere les donnes envoyées en ajax(valeur input de modifs)texte du haut
	$tailleHaut = $_POST['tailleHaut'];//on recupere les donnes envoyées en ajax(valeur input de modifs)texte du haut
	$rotationHaut = $_POST['rotationHaut'];//on recupere les donnes envoyées en ajax(valeur input de modifs)texte du haut
	$topPhraseHaut = $_POST['topPhraseHaut'];//---
	$leftPhraseHaut = $_POST['leftPhraseHaut'];	//---
	require_once 'hex2rgb.php'; //appel de la page contenant la fonction hexa to rgb
	$colorRgb = hex2rgb($color); //converti coleur hexa en rgba
	$c1 = $colorRgb[0]; //red rb
	$c2 = $colorRgb[1];// green rgb
	$c3 = $colorRgb[2];// blue rgb



	$post1 = $_POST['texteBas']; //on recupere les donnes envoyées en ajax(valeur input de modifs)texte du bas
	$color1 = $_POST['colorBas'];	//on recupere les donnes envoyées en ajax(valeur input de modifs)texte du bas
	$tailleBas = $_POST['tailleBas'];//on recupere les donnes envoyées en ajax(valeur input de modifs)texte du bas
	$rotationBas = $_POST['rotationBas'];//---
	$topPhraseBas = $_POST['topPhraseBas'];//---
	$leftPhraseBas = $_POST['leftPhraseBas'];//---
	require_once 'hex2rgb.php';	//appel de la page contenant la fonction hexa to rgb
	$colorRgb1 = hex2rgb($color1); //converti coleur hexa en rgba
	$c11 = $colorRgb1[0];//red rgb
	$c21 = $colorRgb1[1];//green rgb
	$c31 = $colorRgb1[2];// blue rgb

	$image = imagecreatefromjpeg($_SESSION['image']);//on cree limage sur laquel fair les modifs..image uploadee

	$couleur1 = imagecolorallocate($image, $c11, $c21, $c31);//couleur du texte du bas
	$couleur2 = imagecolorallocate($image, $c1, $c2, $c3);//couleur du texte de haut

//on insere le texte sur limage avec nos variable envoyer par ajax, dont modif en temps reel
imagettftext($image, $tailleHaut, $rotationHaut, $leftPhraseHaut, $topPhraseHaut, $couleur2, 'paprasse/IMPACTED.ttf', $post);
imagettftext($image, $tailleBas, $rotationBas, $leftPhraseBas, $topPhraseBas, $couleur1, 'paprasse/IMPACTED.ttf', $post1);

	if(isset($_POST['auteur']) && isset($_POST['nomMeme']) && !empty($_POST['auteur']) && !empty($_POST['nomMeme'])) 
	{	//on verifie que lartiste nomme son fichier et sidentifie
		$nomMeme = $_POST['nomMeme'];
		$auteur = $_POST['auteur'];

	
		ob_start();
			imagejpeg($image);
    		$objet = ob_get_contents();
    	ob_end_clean ();
		$enc = base64_encode($objet);
		echo($enc);
		imagejpeg($image, 'images/memeFini/'.$nomMeme.'.png');
		 //on enregistre limage dans un dossier

		 

	$bdd = new PDO('mysql:host=localhost;dbname=meme;charset=utf8', 'root', '');
	$req = $bdd->prepare('INSERT INTO memedefaut(nom, auteur) VALUES (:nom, :auteur)'); //insertion des articles dans leur base de de données
                    $req->execute(array(
                    'nom' => $nomMeme,
                    'auteur' => $auteur));

}


}


?>