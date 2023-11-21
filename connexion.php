<?php
session_start();
//Connexion à la base de données
function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=agriculture;charset=utf8', 'djibril', 'tamou');
        return $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

//Récupérer toutes les infos
function getAll(){
    $db = dbConnect();

    //$req = $db->query('SELECT c.*, d.nom_d FROM commune c JOIN departement d ON c.id_d = d.id GROUP BY c.id_d, c.id, c.nom_c, d.nom_d');
    // $req = $db->query('SELECT cl.*,f.*,d.nom_d,c.nom_c,a.nom_a,v.id,v.nom_v
    //         FROM cluster cl, filiere f, departement d, commune c, arrondissement a, village v
    //         WHERE cl.id_f=f.codfil AND cl.id_v=v.id AND v.id_a=a.id AND a.id_c=c.id AND c.id_d=d.id
    //         ORDER BY cl.nom ASC');
    $req = $db->query('SELECT cl.*,f.*,v.id,v.nom_v
            FROM cluster cl, filiere f, village v
            WHERE cl.id_f=f.codfil AND cl.id_v=v.id
            ORDER BY cl.nom ASC');
    $req->execute();
    return $req;
}

//Récupérer tous les departements
function getAllDeparts(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM departement ORDER BY nom_d ASC');
    $req->execute();
    return $req;
}

//Récupérer tous les departements
function getAllFiliers(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM filiere ORDER BY codfil DESC');
    $req->execute();
    return $req;
}

//Récupérer toutes les communes d'un departements
function get_communes_d_un_departmt($departement) {
    $db = dbConnect();

    $req = "SELECT * FROM commune WHERE id_d = :departement ORDER BY nom_c ASC";
    $stmt = $db->prepare($req);
    $stmt->bindParam(':departement', $departement);
    $stmt->execute();
    $communes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $communes;
}

//Récupérer tous les arrondissement d'une commune
function get_arrondissements_d_une_comne($commune) {
    $db = dbConnect();

    $req = "SELECT * FROM arrondissement WHERE id_c = :commune ORDER BY nom_a ASC";
    $stmt = $db->prepare($req);
    $stmt->bindParam(':commune', $commune);
    $stmt->execute();
    $arrondissements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $arrondissements;
}

//Récupérer tous les villages d'un arrondissement
function get_villages_d_un_arrond($arrondissement) {
    $db = dbConnect();

    $req = "SELECT * FROM village WHERE id_a = :arrondissement ORDER BY nom_v ASC";
    $stmt = $db->prepare($req);
    $stmt->bindParam(':arrondissement', $arrondissement);
    $stmt->execute();
    $villages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $villages;
}

// Récuếrer un user en fction de l'id
function getInfo($id){
    $db = dbConnect();

    $req = $db->prepare("SELECT cl.*,f.*,v.id,v.nom_v
    FROM cluster cl,filiere f, village v
    WHERE cl.id_f=f.codfil AND cl.id_v=v.id
    AND cl.idCl = ?");
    $req->execute(array($id));
    return $req;
}


//Ajouter 
function add($nom, $filiere, $village){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO cluster VALUES(null,?,?,?)');

    if($req->execute(array($nom, $filiere, $village)))
        return true;
    else
        return false;
}

//Supprimer l'nfos user
function delete($id){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM cluster WHERE idCl = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}

//Modifier un cluster user
function update($nom, $filiere, $village, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE cluster SET nom = ?, id_f = ?, id_v = ? WHERE idCl = ?');

    if($req->execute(array($nom, $filiere, $village, $id)))
        return true;
    else
        return false;
}

?>