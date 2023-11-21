<?php
require_once('./connexion.php');

//commune
if (isset($_POST['departement'])) {
    $departement = htmlspecialchars($_POST['departement']);

    $communes = get_communes_d_un_departmt($departement);

    // Renvoyez les communes au format JSON
    echo json_encode($communes);
}

//arrondissement
if (isset($_POST['commune'])) {
    $commune = htmlspecialchars($_POST['commune']);

    $arrondissements = get_arrondissements_d_une_comne($commune);

    // Renvoyez les arrondissements au format JSON
    echo json_encode($arrondissements);
}

//village
if (isset($_POST['arrondissement'])) {
    $arrondissement = htmlspecialchars($_POST['arrondissement']);

    $villages = get_villages_d_un_arrond($arrondissement);

    // Renvoyez les villages au format JSON
    echo json_encode($villages);
}