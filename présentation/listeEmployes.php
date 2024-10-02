<?php
// PARTIE DONNES -----------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/dialogueBD.php';
try {
// on crée un objet référençant la classe DialogueBD
    $undlg = new DialogueBD();
    $mesEmployes = $undlg->getTousLesEmployesMat();
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
<h1>Liste des employés</h1>
<ul>
    <?php
    $nbemployes = 0;
    // Boucle sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($mesEmployes as $ligne) {
        $nom = $ligne['NomEmpl'];
        $prenom = $ligne['PrenomEmpl'];
        echo "<li>$nom $prenom</li>";
        $nbemployes++;
    }
    ?>
</ul>
<?php echo "Total : $nbemployes employés"; ?>
</body>
</html>