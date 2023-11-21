<?php
	require_once('./connexion.php');
    global $i;
    $rows = getAll();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Liste </title> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/monStyle.css">
		
	</head>
		
	<body>
		
        <div class="container">
        <h1 class="text-center"> La liste </h1>
				
            <table class="table table-striped">
				<thead>
					<tr>
						<th>N°</th><th>Nom cluster</th><!-- <th>Nom départements</th><th>Nom communes</th>
						<th>Nom arrondissements</th> --><th>Nom villages</th><th>Nom filière</th>
							<th> Actions </th>

						
					</tr>
				</thead>
				
				<tbody>
			
					<?php foreach($rows as $row){?>
						<tr>
							<td><?= $i += 1 ?> </td>
							<td><?= $row['nom'] ?> </td>
							<!-- <td><?= $row['nom_d'] ?> </td>
							<td><?= $row['nom_c'] ?> </td>
							<td><?= $row['nom_a'] ?> </td> -->
							<td><?= $row['nom_v'] ?> </td>
							<td><?= $row['nom_f'] ?> </td>
                            <td>
                                <a href="edit.php?id=<?= $row['idCl'] ?>"
                                class="btn btn-success btn-edit-delete"> 
                                    <span class="fa fa-edit"></span>
                                </a>
                                &nbsp&nbsp
                                <a onclick='return confirm("Etes-vous sûr de vouloir supprimer ?")'
                                        href="delete.php?id=<?= $row['idCl'] ?>"
                                        class="btn btn-danger btn-edit-delete">
                                    <span class="fa fa-trash"></span>
                                </a>
                            
                            </td>
							
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<a href="create.php" class="btn btn-primary">
				<span class="fa fa-plus"></span> NOUVEL ENREGISTREMENT 
			</a>
		</div>

		<script src="./js/jquery.js"></script>
		<script src="./js/script.js"></script>
	</body>
</html>