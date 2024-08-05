<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>poppop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgb(174, 174, 2);
    }
    .popo1 {
        display: none;
        flex-direction: column;
        align-items: center;
        width: 550px;
        height: 355px;
        background-color: white;
        border-radius: 25px;
    }
    .popo2 {
        display: none;
        flex-direction: column;
        align-items: center;
        width: 550px;
        height: 355px;
        background-color: white;
        border-radius: 25px;
    }
    .popo3 {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 550px;
        height: 355px;
        background-color: white;
        border-radius: 25px;
    }
</style>
<body>
</body>

<!-- -----poppop1----- -->
<div class="popo1">
    <p style="font-weight: 700; font-size: 27px; margin-top: 40px;">STATUT DE LA VERIFICATION</p>
    <img src="icones/attente.png" alt="image"
        style="width: 102px; height: 102px; margin-top: 10px; margin-bottom: 10px;">
    <p style="font-weight: 700; font-size: 28px; margin-bottom: 15px;">En attente</p>
    <p style="font-weight: 400; font-size: 22px; margin-top: 0;">Le processus de vérification prends au plus 72H</p>
</div>

<!-- -----poppop2----- -->
<div class="popo2">
    <p style="font-weight: 700; font-size: 27px; margin-top: 20px; margin-bottom: 0;">STATUT DE LA VERIFICATION</p>
    <img src="icones/refusé.png" alt="image" style="width: 120px; height: 120px;margin-top: 10px; margin-bottom: 10px;">
    <p style="font-weight: 700; font-size: 28px; margin-bottom: 15px; margin-top: 0;">REFUSE</p>
    <div style="display: flex;align-items: center; justify-content: center; width: 500px;">
        <p style="font-weight: 400; font-size: 22px; margin-top: 0; text-align: center;">Malheureusement vous n'êtes pas
            actuellement apte a travaillez avec nous</p>
    </div>
    <a href=""
        style="text-decoration: none; color: white; background-color: #D46EFF; padding: 5px 10px; border-radius: 10px; font-size: 14px;">Contactez-nous</a>
</div>

<!-- -----poppop3----- -->
<div class="popo3">
    <p style="font-weight: 700; font-size: 27px; margin-top: 20px; margin-bottom: 0;">STATUT DE LA VERIFICATION</p>
    <img src="icones/verified.png" alt="image" style="width: 120px; height: 120px;margin-top: 10px; margin-bottom: 10px;">
    <p style="font-weight: 700; font-size: 28px; margin-bottom: 15px; margin-top: 0;">VERIFIE</p>
    <div style="display: flex;align-items: center; justify-content: center; width: 500px;">
        <p style="font-weight: 400; font-size: 21px; margin-top: 0; text-align: center;">Felicitation <span style="font-weight: bold;">Username</span>  ! Vous pouvez désormais travaillez sur des projets et être rémunéré </p>
    </div>
    <a href=""
        style="text-decoration: none; color: white; background-color: #D46EFF; padding: 5px 10px; border-radius: 10px; font-size: 14px;">Commençer</a>
</div>

</html>



<?php
session_start();

// Supposons que l'ID utilisateur est stocké dans $_SESSION['user_id'] après la connexion
$user_id = $_SESSION['user_id'];

if ($valid) {
    if (!isset($_SESSION['profil'][$user_id])) {
        $_SESSION['profil'][$user_id] = [];
    }
    $_SESSION['profil'][$user_id][] = [
        'nom' => $nom,
        'prenom' => $prenom,
        'genre' => $genre,
        'date_naissance' => $date_naissance,
        'telephone' => $telephone,
        'ville' => $ville,
        'quartier' => $quartier,
        'nom_temoin' => $nom_temoin,
        'prenom_temoin' => $prenom_temoin,
        'email_temoin' => $email_temoin,
        'telephone_temoin' => $telephone_temoin,
        'date_naissance_temoin' => $date_naissance_temoin,
        'genre_temoin' => $genre_temoin
    ];

    if (!isset($_SESSION['skills'][$user_id])) {
        $_SESSION['skills'][$user_id] = [];
    }
    $_SESSION['skills'][$user_id] = $skills;

    // Définir l'état du pop-up à 'true' pour cet utilisateur après l'enregistrement
    $_SESSION['show_popup'][$user_id] = true;
}
?>


<?php
// Vérifiez si le pop-up doit être affiché
if (isset($_SESSION['show_popup']) && $_SESSION['show_popup']) {
    if (isset($_SESSION['nombre'])) {
        $nombre = $_SESSION['nombre'];
        switch ($nombre) {
            case 2:
                echo '
                <div class="popup-background">
                    <div class="popo2">
                        <p style="font-weight: 700; font-size: 27px; margin-top: 20px; margin-bottom: 0;">STATUT DE LA VERIFICATION</p>
                        <img src="icones/refusé.png" alt="image" style="width: 120px; height: 120px;margin-top: 10px; margin-bottom: 10px;">
                        <p style="font-weight: 700; font-size: 28px; margin-bottom: 15px; margin-top: 0;">REFUSE</p>
                        <div style="display: flex;align-items: center; justify-content: center; width: 500px;">
                            <p style="font-weight: 400; font-size: 22px; margin-top: 0; text-align: center;">Malheureusement vous n\'êtes pas actuellement apte à travailler avec nous</p>
                        </div>
                        <a href="" style="text-decoration: none; color: white; background-color: #D46EFF; padding: 5px 10px; border-radius: 10px; font-size: 14px;">Contactez-nous</a>
                    </div>
                </div>';
                break;
            case 3:
                echo '
                <div class="popup-background">
                    <div class="popo3">
                        <p style="font-weight: 700; font-size: 27px; margin-top: 20px; margin-bottom: 0;">STATUT DE LA VERIFICATION</p>
                        <img src="icones/verified.png" alt="image" style="width: 120px; height: 120px;margin-top: 10px; margin-bottom: 10px;">
                        <p style="font-weight: 700; font-size: 28px; margin-bottom: 15px; margin-top: 0;">VERIFIE</p>
                        <div style="display: flex;align-items: center; justify-content: center; width: 500px;">
                            <p style="font-weight: 400; font-size: 21px; margin-top: 0; text-align: center;">Félicitations <span style="font-weight: bold;">Username</span> ! Vous pouvez désormais travailler sur des projets et être rémunéré</p>
                        </div>
                        <a href="unefoisconnectePrestataire.php" style="text-decoration: none; color: white; background-color: #D46EFF; padding: 5px 10px; border-radius: 10px; font-size: 14px;">Commencer</a>
                    </div>
                </div>';
                break;
            default:
                // Pour $_SESSION['nombre'] différent de 2 ou 3, affichez le pop-up par défaut
                echo '
                <div class="popup-background">
                    <div class="popo1">
                        <p style="font-weight: 700; font-size: 27px; margin-top: 40px;">STATUT DE LA VERIFICATION</p>
                        <img src="icones/attente.png" alt="image" style="width: 102px; height: 102px; margin-top: 10px; margin-bottom: 10px;">
                        <p style="font-weight: 700; font-size: 28px; margin-bottom: 15px;">En attente</p>
                        <p style="font-weight: 400; font-size: 22px; margin-top: 0;">Le processus de vérification prend au plus 72H</p>
                    </div>
                </div>';
                break;
        }
    } else {
        // Si $_SESSION['nombre'] n'est pas défini, affichez le pop-up par défaut
        echo '
        <div class="popup-background">
            <div class="popo1">
                <p style="font-weight: 700; font-size: 27px; margin-top: 40px;">STATUT DE LA VERIFICATION</p>
                <img src="icones/attente.png" alt="image" style="width: 102px; height: 102px; margin-top: 10px; margin-bottom: 10px;">
                <p style="font-weight: 700; font-size: 28px; margin-bottom: 15px;">En attente</p>
                <p style="font-weight: 400; font-size: 22px; margin-top: 0;">Le processus de vérification prend au plus 72H</p>
            </div>
        </div>';
    }
}
?>
pour afficher le profil 

<div class="photo">
                      <div style="width: 40px; height: 40px; border-radius: 50px; background-color: rgba(0, 0, 0, 0.1); margin-top: auto; margin-bottom: auto; margin-left: 5px;">
                      </div>
                      <div style="display: flex; flex-direction: column;">
                        <p style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; margin-bottom: 0; margin-top: 5px;">Candide</p>
                        <p style=" font-family: Arial, Helvetica, sans-serif; color: rgba(0, 0, 0, 0.3); margin-top: 0;">@username</p>
                      </div>
                    </div>  