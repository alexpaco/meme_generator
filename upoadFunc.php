<?php
session_start();


//----------------------------------FONCTION UPLOAD DIMAGE----------------------------------------

 
    $nom_image = $_FILES['image']['tmp_name'];
    $image = "images/imagesUpload/".$_FILES['image']['name'];

    $uploaddir = './';
    $uploadfile = $uploaddir .basename($_FILES['image']['name']);

    $extension_image = array('image/jpg', 'image/jpeg', 'image/png');
    $type_image = getimagesize($nom_image);

            
        if($_FILES['image']['error'] > 0){
            echo "Erreur lors du transfert";
        }
        else if($_FILES['image']['size'] > 100000){
            echo "Ce fichier est trop lourd";
        }
        else if(in_array($type_image['mime'], $extension_image)){
            
            move_uploaded_file($nom_image,$image);
            $_SESSION['image'] = $image;
            $_SESSION['chemin'] = $_FILES['image']['tmp_name'];
            
        }
        else{
            echo "Ce fichier n'est pas une image";
        }
    

?>