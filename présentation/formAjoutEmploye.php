<?php
require_once '../persistance/dialogueBD.php';

try {
    // on crée un objet référant la classe DialogueBD
    $undlg = new DialogueBD();
    $mesServices = $undlg->getTousLesServices();

    // Test pour savoir si le formulaire a déjà été validé par l'utilisateur
    // si les variables POST existent, on les récupère et on appelle la fonction ajout
    if (isset($_POST['matricule']) && isset($_POST['nom']) && isset($_POST['prenom'])
        && isset($_POST['service'])) {
        // récupération des champs saisis
        $matricule = $_POST['matricule'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $codeService = $_POST['service'];
        if (empty($_POST['estCadre'])) {
            $cadre ='non';
        } else {
            $cadre = 'oui';
        }
// Appel de la fonction d'ajout d'un employé dans la BD
        $ok = $undlg->ajoutEmploye($matricule, $nom, $prenom, $cadre, $codeService);
    }
} catch (Exception $se) {
    $erreur = $se->getMessage();
}
?>

<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../design.css"/>
    <title>Ajout d'un employé</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?><h1>Ajout d'un employé</h1>
<form class="formulaire" action="formAjoutEmploye.php" method="post">
    <ul>
        <li>
            <label for="champMatricule">Matricule :</label>
            <input type="text" name="matricule" id="champMatricule" required>
        </li>
        <li>
            <label for="champNom">Nom :</label>
            <input type="text" name="nom" id="champNom" required>
        </li>
        <li>
            <label for="champPrenom">Prénom :</label>
            <input type="text" name="prenom" id="champPrenom" required>
        </li>
        <li>
            <label for="champCadre">Cadre ?</label>
            <input type="checkbox" name="estCadre" id="champCadre">
        </li>
        <li>
            <label for="champService">Service :</label>
            <select name="service" id="champServices">
                <?php foreach ($mesServices as $ligne) {
                    $code = $ligne['CodeServ'];
                    $designation = $ligne['DesiServ'];
                    echo "<option value=$code>$designation</option>";
                } ?>
                <p>
                    <?php
                    if (isset($ok)) {
                        if ($ok) {
                            echo "Ajout réussi : $nom $prenom a été ajouté(e) dans la table !";
                        } else {
                            echo "Échec de l'ajout !";
                        }
                    }
                    ?>
                </p>

            </select>
        </li>
        <li><input type="submit" value="Ajouter l'employé"></li>
    </ul>
</form>
</body>
</html>
