<?php
require_once '../persistance/dialogueBD.php';
$undlg = new DialogueBD();
$message = "";

if (isset($_POST['matricule']) && isset($_POST['NomEmpl']) && isset($_POST['CodeCadre'])) {
    $matricule = $_POST['matricule'];
    $nom = $_POST['NomEmpl'];
    $cadre = $_POST['CodeCadre'];

    try {

        $ok = $undlg->modifierEmploye($matricule, $nom, $cadre);

        if ($ok) {
            $message = "La mise à jour a marché";
        } else {
            $message = "Échec de la mise à jour";
        }
    } catch (Exception $e) {
        $message = "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}

echo $message;
?>

