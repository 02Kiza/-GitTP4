<?php
require_once '../persistance/dialogueBD.php';

try {
    $db = new DialogueBD();
    $mesEmployes = $db->getTousLesEmployesMat();
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Employé</title>
</head>
<body>
<?php if (isset($msgErreur)) {
    echo "Erreur : $msgErreur";
} else {
    ?>
    <h2>Veuillez choisr l'employé dont vous souhaitez afficher les informations</h2>
    <form action="afficheEmploye_post.php" method="post">
        <label for="matricule">Employé :</label>
        <select name="matricule" id="matricule">
        <ul>
            <?php
            foreach ($mesEmployes as $employe) {
                $nom = $employe['NomEmpl'];
                $prenom = $employe['PrenomEmpl'];
                $matricule = $employe['Matricule'];
                echo "<option value='$matricule'>$nom $prenom</option>";
            }
            ?>
        </select>
        <li><?php echo "  "?></li>
        <li><input type="submit" value="Afficher les informations"></li>
        </ul>
    </form>
    <?php
}
?>
</body>
</html>
