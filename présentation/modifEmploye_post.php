<?php
require_once '../persistance/dialogueBD.php';
$undlg = new DialogueBD();
if (isset($_POST['matricule'])) {
    $matricule = $_POST['matricule'];
    $employe = $undlg->getUnEmployeMat($matricule);

    ?>
    <form action="modifEmploye_post2.php" method="post">
        <input type="hidden" name="matricule" value="<?php echo $matricule; ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $employe['NomEmpl']; ?>" required>
        <label for="cadre">Cadre (o/n):</label>
        <input type="text" id="cadre" name="cadre" value="<?php echo $employe['CodeCadre']; ?>" required>
        <input type="submit" value="Mettre à jour l'employé(e)">
    </form>
    <?php
}
?>

