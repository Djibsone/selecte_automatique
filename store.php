<?php
require_once('./connexion.php');

if(isset($_POST['add'])){

        $nom = htmlspecialchars($_POST['nom']);
        // $departement = htmlspecialchars($_POST['departement']);
        // $commune = htmlspecialchars($_POST['commune']);
        // $arrondissement = htmlspecialchars($_POST['arrondissement']);
        $village = htmlspecialchars($_POST['village']);
        $filiere = htmlspecialchars($_POST['filiere']);
    
        $stmt = add($nom, $filiere, $village);

        if ($stmt) {

                $msg= "Added successfully";
                $url="/";		
                header("location:message.php?msg=$msg&color=v&url=$url");    
        
        } else {
                
                $msg= "Error the added";
                $url="/";		
                header("location:message.php?msg=$msg&color=r&url=$url");    
        }
          
}