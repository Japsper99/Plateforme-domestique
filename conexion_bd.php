<?php
$servername = "localhost"; // Remplace par l'adresse de ton serveur
$username = "u924654367_root2"; // Remplace par ton nom d'utilisateur
$password = "C4nd1d3xoxo"; // Remplace par ton mot de passe
$dbname = "u924654367_sonco"; // Remplace par le nom de ta base de données

try {
    $DB = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion a échoue : " . $e->getMessage());
}
?>
