<?php
require_once '../persistance/dialogueBD.php';
$undlg = new DialogueBD();
$mesEmployes = $undlg->getTousLesEmployesMat();


?>
<form action="modifEmploye_post.php" method="post">
    <h1>Modification de l'employe</h1>
    <ul>
    <label for="employe">Sélectionnez un(e) employé(e) :</label>
    <select name="matricule" id="employe" required>
        <option value="">Sélectionnez un(e) employé(e)...</option>
        <?php
        foreach ($mesEmployes as $employe) {
            echo '<option value="' . $employe['Matricule'].'">' .
                $employe['NomEmpl'].' '. $employe['PrenomEmpl'].'</option>';
        }
        ?>
    </select>
        <li><input type="submit" value="Modifier l'employe)"></li>
    </ul>
</form>

