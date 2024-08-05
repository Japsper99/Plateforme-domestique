<?php
$servername = "localhost"; // Remplace par l'adresse de ton serveur
$username = "root"; // Remplace par ton nom d'utilisateur
$password = ""; // Remplace par ton mot de passe
$dbname = "memoire_ipm"; // Remplace par le nom de ta base de données

try {
    $DB = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion a échoué : " . $e->getMessage());
}
?>
