<?php
// PARTIE DONNES -----------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/dialogueBD.php';
try {
// on crée un objet référençant la classe DialogueBD
    $undlg = new DialogueBD();
    $mesServices = $undlg->getTousLesServices();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>

<! Partie Affichage --->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../design.css"/>
    <title>Sélection du service</title>
</head>
<body>
<h1>Liste des employés par service</h1>
<form class="formulaire" action="emplService_post.php" method="post">
    <ul>
        <!-- Liste déroulante des services -->
        <li><label for="champService">Service :</label>
            <select name="CodeServ" id="champService">
                <?php
                foreach ($mesServices as $ligne) {
                    $code = $ligne['CodeServ'];
                    $designation = $ligne['DesiServ'];
                    echo "<option value=$code>$designation</option>";
                }
                ?>
            </select>
        </li>
        <li><input type="submit" value="Afficher les employés"></li>
    </ul>
</form>
</body>
</html>
</body>
</html>
