<?php

	$nom_serveur = "localhost";
    $identifiant = "pacoret";
    $mdp = "IGcWnccPMKvTAo69";
    $nom_bd = "pacoret";
        
    $bdd = new PDO("mysql:host=$nom_serveur; dbname=$nom_bd", $identifiant, $mdp);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
