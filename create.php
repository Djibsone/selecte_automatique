<?php
	require_once('./connexion.php');
   
    $departements = getAllDeparts();

    $filieres = getAllFiliers();
    
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8"/>
		<title> Creation </title> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/monStyle.css">
		
	</head>

<body>

<div class="container" style="margin-top: 20px;">

    <div class="panel panel-primary">
        <div class="panel-heading" align="center">Nouvel enregistrement</div>
        <div class="panel-body">
            <form method="post" action="store.php">

                <div class="row my-row">
                    <label class="control-label col-sm-2">FILLIERE</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="filiere" id="filiere">
                            <option>Selectionner la filière</option>
                            <?php foreach($filieres as $filiere){?>
                                <option value="<?= $filiere['codfil'] ?>"><?= $filiere['nom_f'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row my-row">
                    <label class="control-label col-sm-2">DEPARTEMENT</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="departement" id="departement">
                            <option value="">Sélectionner le département</option>
                            <?php foreach($departements as $departement){?>
                                <option value="<?= $departement['id'] ?>"><?= $departement['nom_d'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <label class="control-label col-sm-2">COMMUNE</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="commune" id="commune">
                            <!-- <option value="">Sélectionnez la commune</option> -->
                        </select>
                    </div>

                </div>

                <div class="row my-row">
                    <label class="control-label col-sm-2">ARRONDISSEMENT</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="arrondissement" id="arrondissement">
                            <!-- <option value="">Sélectionnez l\'arrondissement</option> -->
                        </select>
                    </div>

                    <label class="control-label col-sm-2">VILLAGE</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="village" id="village">
                            <!-- <option value="">Sélectionner le village</option> -->
                        </select>
                    </div>

                </div>

                <div class="row my-row">
                    <label class="control-label col-sm-2">NOM DU CLUSTER</label>
                    <div class="col-sm-12">
                        <input required type="text" name="nom" class="form-control">
                    </div>
                </div>

                <button type='reset' class="btn btn-warning">Annuler <span class="fa fa-reset"></span></button>
                <button type='submit' name="add" class="btn btn-primary">Enregistrer <span class="fa fa-save"></span></button>
            </form>
        </div>
    </div>
</div>

<script src="./js/jquery.js"></script>
<script src="./js/script.js"></script>
</body>
</html>
