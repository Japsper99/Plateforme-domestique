<!-- connectadmin.php -->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    // Mot de passe fixe pour l'admin
    $admin_password = 'admin123';

    if ($password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: espace_admin.php');
        exit();
    } else {
        $error = "Mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>
</head>
<body>
    <h1>Connexion Administrateur</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
