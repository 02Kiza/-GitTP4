<?php
require_once '../persistance/dialogueBD.php';
$undlg = new DialogueBD();
$message = '';

// Vérifiez si un employé a été sélectionné pour suppression
if (isset($_POST['Matricule']) && $_POST['Matricule'] != '') {
    $matricule = $_POST['Matricule'];

    try {

        $supok = $undlg->supprimeEmploye($matricule);

        if ($supok) {
            $message = "La suppression de l'employé(e) est faite";
        } else {
            $message = "Échec de la suppression de l'employé(e).";
        }
    } catch (Exception $e) {
        $message = "Erreur lors de la suppression : ". $e->getMessage();
    }
}


$mesEmployes = $undlg->getTousLesEmployesMat();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression d'un(e) employé(e)</title>
</head>
<body>



<form action="formSupprEmploye.php" method="post">
    <h1>Suppression employé(e)</h1>
    <label for="employe">Employé :</label>
    <select name="Matricule" id="employe" required>
        <ul>
        <li><option>Sélectionnez un(e) employé(e)...</option></li>
        <?php
        foreach ($mesEmployes as $employe) {
            echo'<option value="' . $employe['Matricule'] . '">'. $employe['NomEmpl']."   ".$employe['PrenomEmpl'] . '</option>';
        }
        ?>

    </select>
    <li><?php echo"   "?></li>
    <li><input type="submit" value="Supprimer l'employé(e)"></li>
    </ul>
</form>
</body>
</html>
