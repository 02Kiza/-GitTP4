<?php
// PARTIE DONNES -----------------------------------------------------

require_once '../persistance/dialogueBD.php';
try {

    $undlg = new DialogueBD();
    $codeService = $_POST['CodeServ'];
    $mesEmployes = $undlg->getEmployesParService($codeService);
    $ServiceName = $undlg->getService($codeService);
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<! PARTIE AFFICHAGE ------------------------------------------------ >
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"
          media="screen">
    <link rel="stylesheet" href="../design.css"/>
    <title>Tableau des employés</title>
</head>
<body>
<?php
if (isset($msgErreur)) {
    echo "Erreur : $msgErreur";
}
?>
<h1>Tableau des employés du service <?php
    echo "$ServiceName";
?>
</h1>
<table class="table table-bordered table-striped table-responsive">

    <?php
    // Boucle sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($mesEmployes as $ligne) {
        $nom = $ligne['NomEmpl'];
        $prenom = $ligne['PrenomEmpl'];
        $matricule = $ligne['Matricule'];
        echo "<tr><td>$matricule</td> <td>$nom</td> <td>$prenom</td> </tr>";
        ;
    }
    ?>

</table>
</body>
</html>