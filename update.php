<?php
require_once('./connexion.php');

if(isset($_POST['update'])){

        $id = htmlspecialchars($_POST['id']);
        $nom = htmlspecialchars($_POST['nom']);
        // $departement = htmlspecialchars($_POST['departement']);
        // $commune = htmlspecialchars($_POST['commune']);
        // $arrondissement = htmlspecialchars($_POST['arrondissement']);
        $village = htmlspecialchars($_POST['village']);
        $filiere = htmlspecialchars($_POST['filiere']);
    
        $stmt = update($nom, $filiere, $village, $id);

        if ($stmt) {

                $msg= "Updated successfully";
                $url="/";		
                header("location:message.php?msg=$msg&color=v&url=$url");    
        
        } else {
                
                $msg= "Error the updated";
                $url="/";		
                header("location:message.php?msg=$msg&color=r&url=$url");    
        }     
}