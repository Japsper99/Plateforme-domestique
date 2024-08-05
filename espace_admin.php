<!-- espaceadministrateur.php -->
<?php
session_start();
// Vérifier si l'administrateur est connecté
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: connectadmin.php');
    exit();
}

if (isset($_POST['popop3'])) {
    $_SESSION['nombre'] = 2; // Change la valeur de la variable nombre à 2   
} 
if (isset($_POST['popop2'])) {
    $_SESSION['nombre'] = 3; // Change la valeur de la variable nombre à 2   
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body style="font-family: Arial, sans-serif; font-size: 15px;">
    <div class="container" style="display: flex; flex-direction: column; justify-content: center;">
        <p style="font-weight: bold; font-size:20px;">Contrôle et validation des profils Prestataire</p>
        <ul style="display: flex; flex-direction: column; justify-content: center; ">
            <?php if (isset($_SESSION['profil'])) : ?>
            <?php $indice=0;?>
            <?php  foreach ($_SESSION['profil'] as $profil) :?>
            <li style="margin-top: 10px; margin-bottom: 50px; ">
                <div style="display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-around; ">
                        <div style="display: flex; flex-direction: column;">
                            <p>
                                <?php echo "Nom: " . $profil['nom']; ?>
                            </p>
                            <p>
                                <?php echo "Prénom: " . $profil['prenom']; ?>
                            </p>
                            <p>
                                <?php echo "Genre: " . $profil['genre'] ;?>
                            </p>
                            <p>
                                <?php echo "Date de naissance: " . $profil['date_naissance']; ?>
                            </p>
                            <p>
                                <?php echo "Téléphone: " . $profil['telephone']; ?>
                            </p>
                            <p>
                                <?php echo "Ville: " . $profil['ville']; ?>
                            </p>
                            <p>
                                <?php echo "Quartier: " . $profil['quartier']; ?>
                            </p>
                        </div>
                        <div style="display: flex; flex-direction: column;">
                            <p>
                                <?php echo "Nom du témoin: " . $profil['nom_temoin']; ?>
                            </p>
                            <p>
                                <?php echo "Prénom du témoin: " . $profil['prenom_temoin']; ?>
                            </p>
                            <p>
                                <?php echo "Email du témoin: " . $profil['email_temoin'] ;?>
                            </p>
                            <p>
                                <?php echo "Téléphone du témoin: " . $profil['telephone_temoin']; ?>
                            </p>
                            <p>
                                <?php echo "Date de naissance du témoin: " . $profil['date_naissance_temoin'] ;?>
                            </p>
                            <p>
                                <?php echo "Genre du témoin: " . $profil['genre_temoin']; ?>
                            </p>
                        </div>
                        <div style="display: flex; flex-direction: column;">
                            <p style="font-weight: bold; margin-bottom: 0;">Compétences :</p>
                            <?php if (isset($_SESSION['skills'])) : ?>
                            <?php  $Skillafficher = $_SESSION['skills'][$indice];?>
                            <p>
                                <?php foreach ($Skillafficher as $item) : ?>
                            <p style="margin-top: 0;">
                                <?php echo $item; ?>
                            </p>
                            <?php endforeach; ?>
                            </p>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['attestation_residence'])) : ?>
                            <?php  $fil = $_SESSION['attestation_residence'][$indice];?>
                            <p>
                                <?php echo '<a href="uploads/'. $fil.'" target="_blank"> Attestation de residence du prestataire</a>';?>
                            </p>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['piece'])) : ?>
                            <?php  $fil = $_SESSION['piece'][$indice];?>
                            <p>
                                <?php echo '<a href="uploads/'. $fil.'" target="_blank">Pièce du prestataire</a>';?>
                            </p>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['Casier_judiciaire'])) : ?>
                            <?php  $fil = $_SESSION['Casier_judiciaire'][$indice];?>
                            <p>
                                <?php echo '<a href="uploads/'. $fil.'" target="_blank">Casier  judiciaire du prestataire</a>';?>
                            </p>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['piece_temoin'])) : ?>
                            <?php  $fil = $_SESSION['piece_temoin'][$indice];?>
                            <p>
                                <?php  echo '<a href="uploads/'. $fil.'" target="_blank">Télécharger la pièce du témoin</a>';?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <form method="post">
                            <button type="submit" name="popop3"
                            style="width:150px; height:30px; border: none; border-radius: 10px; background-color: #D46FFF; color: white; margin-right: 50px;">Valider</button>
                        </form>
                        <form method="post">
                            <button type="submit" name="popop2"
                            style="width:150px; height:30px; border: 1px solid #D46FFF; border-radius: 10px; background-color:transparent; color: #D46FFF;">Refuser</button>
                        </form>
                        </div>
                </div>
            </li>
            <?php $indice++; ?>
            <?php endforeach; ?>
            <?php else: ?>
            <li>Aucune information saisie.</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>