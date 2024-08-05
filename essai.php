<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec Pop-up</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
}

#monFormulaire {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

.popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
}

    </style>
</head>
<body>
    <form id="monFormulaire">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="telephone">Téléphone:</label>
        <input type="tel" id="telephone" name="telephone" required>
        
        <button type="submit">Soumettre</button>
    </form>

    <!-- Pop-up -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <p>Veuillez patienter pendant que nous vérifions vos informations...</p>
        </div>
    </div>

    <script > 
        // script.js
   document.getElementById('monFormulaire').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher l'envoi du formulaire

    // Afficher le pop-up
    document.getElementById('popup').style.display = 'flex';

    // Simuler une vérification côté serveur avec un délai
    setTimeout(function() {
        // Masquer le pop-up après la vérification
        document.getElementById('popup').style.display = 'none';

        // Afficher un message de succès ou rediriger
        alert("Vos informations ont été vérifiées avec succès!");
        
        // Optionnel: envoyer réellement le formulaire après la vérification
        // event.target.submit();
    }, 3000); // Exemple de délai de 3 secondes (3000 ms)
});

    </script>
</body>
</html>
 

<?php
session_start();

if(isset($_SESSION['id'])){
   $userId = $_SESSION['id'];
}

// Initialisation des variables
$nom = $prenom = $genre = "";
$date_naissance = $telephone = $skills = "";
$err_nom = $err_prenom = $err_genre = $err_date_naissance = $err_telephone = $err_skills = "";
$ville = $quartier = "";
$err_ville = $err_quartier = "";
$file_name_ci = $file_name_cj = $file_name_p = $file_name_pt = "";
$nom_temoin = $prenom_temoin = $email_temoin = "";
$telephone_temoin = $date_naissance_temoin = $genre_temoin = "";
$err_email_temoin = $err_file_ci = $err_file_p = "";
$err_nom_temoin = $err_prenom_temoin = $err_genre_temoin = $err_date_naissance_temoin = $err_telephone_temoin = "";

// Récupération des données inscrites dans le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;
    extract($_POST);
    if (isset($_POST['profil'][$userId])) {
        $nom = trim($nom);
        $prenom = trim($prenom); 
        $genre = trim($genre);
        $date_naissance = trim($date_naissance); 
        $telephone = trim($telephone);
        $ville = trim($ville);
        $quartier = trim($quartier);
        $nom_temoin = trim($nom_temoin);
        $prenom_temoin = trim($prenom_temoin);
        $email_temoin = trim($email_temoin);
        $telephone_temoin = trim($telephone_temoin);
        $date_naissance_temoin = trim($date_naissance_temoin);
        $genre_temoin = trim($genre_temoin);

        if (isset($_POST['skills'][$userId]) && is_array($_POST['skills'][$userId])) {
            $skills = array_map('trim', $_POST['skills'][$userId]);
        } else {
            $skills = [];
        }
    }    
    // Vérification des champs
    // ... (toutes les vérifications des champs ici, comme précédemment)
    if ($valid) {
        // Sauvegarde des fichiers
        $upload_dir = "uploads/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        move_uploaded_file($_FILES["ci"]["tmp_name"], $upload_dir . basename($_FILES["ci"]["name"]));
        move_uploaded_file($_FILES["cj"]["tmp_name"], $upload_dir . basename($_FILES["cj"]["name"]));
        move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_dir . basename($_FILES["photo"]["name"]));
        move_uploaded_file($_FILES["pt"]["tmp_name"], $upload_dir . basename($_FILES["pt"]["name"]));
        // Indicateur de soumission réussie dans la session
        $_SESSION['form_submitted'] = true;
    }
}
// Affichage du pop-up si le formulaire a été soumis avec succès
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    echo '<script>alert("Formulaire soumis avec succès !")</script>';
    // Réinitialiser l'indicateur pour ne pas réafficher le pop-up
    unset($_SESSION['form_submitted']);
}
?>
