<?php
require_once '../persistance/dialogueBD.php';

try {

    $undlg = new DialogueBD();


    if (isset($_POST['matricule'])) {
        $matricule = $_POST['matricule'];
        $unEmploye = $undlg->getUnEmployeMat($matricule);
    }
} catch (Exception $e) {
    $erreur = $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage d'un employé</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : " . $erreur;
}

if (isset($unEmploye)) {
    echo "<h2>Renseignements de l'employé : ".$unEmploye['Matricule']."</h2>";
    echo "<ul>";
    echo "<li>Nom : ".$unEmploye['NomEmpl']."</li>";
    echo "<li>Prénom : ".$unEmploye['PrenomEmpl']."</li>";
    echo "<li>Est ce que c'est un cadre (o = oui, n=non) : " . $unEmploye['CodeCadre']."</li>";
    echo "<li>Service: ".$unEmploye['ServEmpl']."</li>";
    echo "</ul>";
} elseif (!isset($erreur)) {
    echo "<p>Il y'a une erreur</p>";
}
?>
</body>
</html>

