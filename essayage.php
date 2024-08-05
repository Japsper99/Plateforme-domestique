<?php
session_start();

// Initialisation des variables de session si elles n'existent pas encore
if (!isset($_SESSION['submitted_data'])) {
    $_SESSION['submitted_data'] = [];
}

$errors = [];
$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et validation des champs
    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $age = trim($_POST["age"]);
    $genre = trim($_POST["genre"]);
    $profession = trim($_POST["profession"]);

    // Validation du nom
    if (empty($nom)) {
        $errors[] = "Le nom est requis.";
    } else {
        $data['nom'] = htmlspecialchars($nom);
    }

    // Validation du prénom
    if (empty($prenom)) {
        $errors[] = "Le prénom est requis.";
    } else {
        $data['prenom'] = htmlspecialchars($prenom);
    }

    // Validation de l'âge
    if (empty($age)) {
        $errors[] = "L'âge est requis.";
    } elseif (!is_numeric($age) || $age <= 0) {
        $errors[] = "Veuillez entrer un âge valide.";
    } else {
        $data['age'] = htmlspecialchars($age);
    }

    // Validation du genre
    if (empty($genre)) {
        $errors[] = "Le genre est requis.";
    } else {
        $data['genre'] = htmlspecialchars($genre);
    }

    // Validation de la profession
    if (empty($profession)) {
        $errors[] = "La profession est requise.";
    } else {
        $data['profession'] = htmlspecialchars($profession);
    }

    // Si aucune erreur, enregistrer les données dans la session
    if (empty($errors)) {
        $_SESSION['submitted_data'][] = $data;
        $data = []; // Réinitialiser $data pour le prochain formulaire
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Dynamique</title>
    <style>
        /* Simple styling for the pop-up */
        #loadingPopup {
            display: none; /* Hidden by default */
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1001; /* Above everything */
        }
        .blur {
            filter: blur(5px);
        }
        #formContainer {
            position: relative;
            z-index: 1; /* Below the pop-up */
        }
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            z-index: 1000; /* Just below the pop-up */
        }
    </style>
</head>
<body>

<div id="formContainer">
    <?php if (!empty($errors)): ?>
        <div>
            <h2>Erreurs de validation :</h2>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form id="myForm" action="result.php" method="post">
        <div id="formPart1">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo isset($data['nom']) ? $data['nom'] : ''; ?>"><br><br>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo isset($data['prenom']) ? $data['prenom'] : ''; ?>"><br><br>
            <label for="age">Âge:</label>
            <input type="number" id="age" name="age" value="<?php echo isset($data['age']) ? $data['age'] : ''; ?>"><br><br>
        </div>

        <div id="formPart2">
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?php echo isset($data['genre']) ? $data['genre'] : ''; ?>"><br><br>
            <label for="profession">Profession:</label>
            <input type="text" id="profession" name="profession" value="<?php echo isset($data['profession']) ? $data['profession'] : ''; ?>"><br><br>
        </div>

        <button type="submit" name="submit">Soumettre</button>
    </form>
</div>

<div id="loadingPopup">
    Veuillez patienter...
</div>
<div id="overlay"></div>

<!-- <script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêcher la soumission par défaut pour afficher le pop-up
        const formContainer = document.getElementById('formContainer');
        const loadingPopup = document.getElementById('loadingPopup');
        const overlay = document.getElementById('overlay');

        formContainer.classList.add('blur');
        loadingPopup.style.display = 'block';
        overlay.style.display = 'block';

        setTimeout(() => {
            // Simule un délai avant de soumettre le formulaire pour l'exemple
            this.submit(); // Soumettre le formulaire après le délai
        }, 3000); // Délai de 3 secondes
    });
</script> -->

</body>
</html>
