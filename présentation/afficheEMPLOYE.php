<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/dialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $undlg = new DialogueBD();
    $unEmploye = $undlg->getUnEmploye();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
    <!-- PARTIE AFFICHAGE --------------------------------------------------->
    <!DOCTYPE html>
    <html>
<head>
    <meta charset="UTF-8"/>
    <title>Affichage d'un employé</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h2>Renseignements de l'employé : <?php echo $unEmploye->Matricule; ?></h2>
<ul>
    <?php
    echo "<li>Nom : " . $unEmploye->NomEmpl . "</li>";
    echo "<li>Prénom : " . $unEmploye->PrenomEmpl . "</li>";
    echo "<li>Cadre (o/n) : " . $unEmploye->CodeCadre . "</li>";
    echo "<li>Code du service : " . $unEmploye->ServEmpl . "</li>";
    ?>
</ul>
</body>
    </html><?php
