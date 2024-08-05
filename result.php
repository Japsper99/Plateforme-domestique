<?php
session_start();

// Redirection vers index.php si les données de formulaire ne sont pas présentes
if (!isset($_SESSION['submitted_data']) || empty($_SESSION['submitted_data'])) {
    header("Location: essayage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats du Formulaire</title>
</head>
<body>
<h1>Informations soumises</h1>
<ul>
    <?php foreach ($_SESSION['submitted_data'] as $submitted_data): ?>
        <li>
            <strong>Nom :</strong> <?php echo $submitted_data['nom']; ?><br>
            <strong>Prénom :</strong> <?php echo $submitted_data['prenom']; ?><br>
            <strong>Âge :</strong> <?php echo $submitted_data['age']; ?><br>
            <strong>Genre :</strong> <?php echo $submitted_data['genre']; ?><br>
            <strong>Profession :</strong> <?php echo $submitted_data['profession']; ?>
            <hr>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>

<?php
// Effacer les données de session après les avoir affichées
unset($_SESSION['submitted_data']);
?>
