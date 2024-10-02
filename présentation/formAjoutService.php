<?php
require_once '../persistance/dialogueBD.php';

$undlg = new DialogueBD();
$message = '';


if (isset($_POST['CodeServ']) && isset($_POST['DesiServ'])) {
    $code = $_POST['CodeServ'];
    $designation = $_POST['DesiServ'];

    try {
        $ok = $undlg->ajoutService($code, $designation);
        if ($ok) {
            $message = "L'ajout du service a été effectué avec succès";
        } else {
            $message = "Échec";
        }
    } catch (Exception $e) {
        $message = "Erreur: ".$e->getMessage();
    }
}


$mesServices = $undlg->getTousLesServices();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout d'un Service</title>
</head>
<body>
<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<h1>Liste des services</h1>
<table>
    <thead>
    <tr>
        <th>Code</th>
        <th>Désignation</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($mesServices as $service) {
        echo '<tr>';
        echo '<td>'.($service['CodeServ']).'</td>';
        echo '<td>'.($service['DesiServ']).'</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

<h2>Ajout d'un service</h2>
<form action="formAjoutService.php" method="post">
    <div>
        <label for="code">Code :</label>
        <input type="text" id="code" name="CodeServ" required>
    </div>
    <div>
        <label for="designation">Désignation :</label>
        <input type="text" id="designation" name="DesiServ" required>
    </div>
    <div>
        <input type="submit" value="Ajouter le service">
    </div>
</form>
</body>
</html>
