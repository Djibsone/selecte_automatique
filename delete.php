<?php
require_once('./connexion.php');

if(isset($_GET['id'])){

    if (empty($_GET['id'])) {
    
        $msg= "Select to delete first";
        $url="/";		
        header("location:message.php?msg=$msg&color=r&url=$url");
        
    } else {

        $id = htmlspecialchars($_GET['id']);
        $stmt = delete($id);
        
        if ($stmt) {

            $msg= "Deleted successfully";
            $url="/";		
            header("location:message.php?msg=$msg&color=v&url=$url");    
        
        } else {
                
            $msg= "Error the deleted";
            $url="/";		
            header("location:message.php?msg=$msg&color=r&url=$url");    
        }
    }
}