<?php
session_start();
include_once('conexion_bd.php');

// Initialisation des variables
  $nomutilisateur =""; 
  $mail = $statut = "";
  $pass = $passconfirm = "";
  $err_nomutilisateur = $err_mail = $err_pass = $err_passconfirm = $err_statut = "";
  
//Récupération des données inscrit dans le formulaire d'inscription

if(!empty($_POST)){
    extract($_POST);
    $valid= (boolean) true;
     if(isset($_POST['inscription'])){
       $nomutilisateur=trim(nomutilisateur);
       $mail=trim($mail);
       $pass=trim($pass);
       $passconfirm=trim($passconfirm);
       $statut=trim($statut); 
    }
    //controle la validité du nom d'utilisateur
    if(empty($nomutilisateur)){
        $valid=false;
        $err_nomutilisateur="Ce champ ne peut etre vide";
      }elseif (mb_strlen($nomutilisateur)< 6 || mb_strlen($nomutilisateur)>=20){
        $valid=false;
        $err_nomutilisateur="Le nom d'utilisateur doit faire entre 6 et 20 caractères(".mb_strlen($prenom). "/20)";
      }elseif (!preg_match('/\d/', $nomutilisateur)){
        $valid=false;
        $err_nomutilisateur="Le nom d'utilisateur doit contenir au moins un chiffre.";
      }elseif(!preg_match('/[0-9._-]$/', $nomutilisateur)) { 
        $valid=false;
        $err_nomutilisateur="Le nom d'utilisateur doit commencer par une lettre et se terminer par un chiffre ou un symbole";      
      }
      // Vérifier les caractères autorisés
     if (!preg_match('/^[a-zA-Z0-9._-]+$/', $nomutilisateur)) {
        $valid=false;
        $err_nomutilisateur="Seul les chiffres, les lettres et les tirets sont autorisés " ;
     }
      // Vérifier les occurrences des tirets bas (_), points (.), ou tirets (-)
        $specialChars = ['_', '.', '-'];
        $count = 0;
        foreach ($specialChars as $char) {
          $count += substr_count($username, $char);
       }
       if ($count > 3) {
        $valid=false;
        $err_nomutilisateur="Le nom d'utilisateur ne peut contenir que trois occurrences au maximum de _ . -";
       }
     
      // Le nom d'utilisateur doit être unique
      if ($valid) {
         // $nomutilisateur = $_POST['nomutilisateur'];
          $query = $DB->prepare("SELECT COUNT(*) AS count FROM donnee_inscription WHERE nomutilisateur = ?");
          $query->execute(array($nomutilisateur));
          $result = $query->fetch(PDO::FETCH_ASSOC);
  
        if ($result['count'] > 0) {
         // L'email existe déjà dans la base de données
             $valid = false;
            $err_nomutilisateur ="Ce nom d'utilisateur est déjà utilisé.Veuillez en choisir un autre.";
        }
      }
      //controle la validité de l'email
      if (empty($mail)) {
        $valid = false;
        $err_mail = "Ce champ ne peut être vide";
    } else{
      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
        $err_mail = "L'email que vous avez renseigné est invalide";
      }
    }
    //controle du mot de passe 

      if(empty($pass)){
        $valid=false;
        $err_pass="Ce champ ne peut etre vide";
      } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)){
        $valid = false;
        $err_pass = "Le mot de passe doit contenir au moins 8 caractères, incluant des lettres, des chiffres et des caractères spéciaux.";
      } 
      if(empty($passconfirm)){
        $valid=false;
        $err_passconfirm="Ce champ ne peut etre vide";
      }elseif($pass !== $passconfirm){
        $valid = false;
        $err_passconfirm = "Les mots de passe ne correspondent pas.";
      }
 
      //verifier champs de statut
      if(empty($statut)){
       $valid=false;
       $err_statut="Ce champ ne peut etre vide";
     }

     //cryptage du mot de passe et insertion des donnees dans la BD

     if($valid){
 
       $crypt_password=password_hash($pass,PASSWORD_DEFAULT);
       $datecreation=date('Y-m-d H:i:s');
 
       $req=$DB->prepare("INSERT INTO donnee_inscription(nomutilisateur,email,mot_pass,statut_compte,datecreation) VALUES (?,?,?,?,?)");
       $req->execute(array($nomutilisateur,$mail,$crypt_password,$statut,$datecreation));
      // $req->bind_param("ssssss", $nomutilisateur,$mail,$crypt_password,$statut,$datecreation);
       if ($req->rowCount() > 0) {
          //Si l'insertion s'est bien passée, effectuez la redirection
        $newUserId = $DB->lastInsertId(); // Obtenez l'ID de l'utilisateur nouvellement inséré
         //redirection vers la page moncompte
         header('Location: connexion.php');
         exit;
       } else {
         echo "Erreur lors de l'insertion : les données n'ont pas été insérées.";
       }
     }
  
    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="inscription_conexion.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Inscription</title>
</head>
<body>
  <div class="container">
    <div class="entete">
    <a href="index.php" class="logo"><img src="img/logo.png" alt="" style="width:90px; margin-bottom:-4px;"></a>      <a href="connexion.php" style="text-decoration: none;"> <div class="logo_conexion">
        <p style="margin-top: 15px;">Connexion</p>
        <img src="icones/ph_arrow-up-light.png" alt="">
      </div></a>
    </div>
    <div class="formulaire_inscription">
      <div class="image">
        <!-- <img src="images/medium-shot-woman-doing-housework(1).jpg" alt="une image" width="500px"> -->
      </div>
      <div class="form">
        <p class="titre_form">Ravi de vous compter parmis nous </p>
        <p class="stitre">Tous les champs ci-dessous sont obligatoire</p>

        <form method="post" class="formulaire">
          <span style="color: red; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"><?php if(isset ($err_nomutilisateur)){echo $err_nomutilisateur;} ?></span>
          <input type="text" name="nomutilisateur" placeholder="Nom utilisateur" class="champs" required
            style="width: 680px;" value="<?php if(isset ($nomutilisateur)){echo $nomutilisateur;} ?>">
            <span style="color: red; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"><?php if(isset ($err_mail)){echo $err_mail;} ?></span>
          <input type="email" name="mail" placeholder="Email" class="champs" required style="width: 680px;"
            value="<?php if(isset ($mail)){echo $mail;} ?>">
            <span style="color: red; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"><?php if(isset ($err_pass)){echo $err_pass;} ?></span>
          <div class="champs " style=" display:flex; width: 710px; justify-content: space-between; padding-left: 0px;">
            <input type="password" name="pass" placeholder="Mot de passe" id="motpasse" / required class="champs"
              style="border-radius: 25px 0 0 25px; margin-bottom: 0; width:85%;"
              value="<?php if(isset ($pass)){echo $pass;} ?>">

            <button type="button"
              style="border: none; background-color:rgba(227, 227, 227, 0.5); width: 25%; border-radius: 0 25px 25px 0;"
              onclick="togglePasswordVisibility(event,'motpasse', this)">
              <i class="fas fa-eye-slash" style="font-size: 24px; margin-right: -70px;"></i>
            </button>
          </div>
          <span style="color: red; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"><?php if(isset ($err_passconfirm)){echo $err_passconfirm;} ?></span>
          <input type="password" name="passconfirm" placeholder="Confirmer le mot de passe" / class="champs" required
            style="width: 680px;" value="<?php if(isset ($passconfirm)){echo $passconfirm;} ?>">
            <span style="color: red; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"><?php if(isset ($err_statut)){echo $err_statut;} ?></span> 
          <select name="statut" id="statut" class="champs" required style="width: 710px;">
            <option selected disabled style="display: none;"> Statut compte </option>
            <option value="Prestataire" class="option">Prestataire</option>
            <option value="Clients" class="option">Clients</option>
          </select>
          <button type="submit" class="boutton" style="width: 710px;"> S'inscrire</button>
        </form>

        <!-- <div class="separation">
          <hr id="one">
          <p style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: 600; margin-top: 18px;">
            ou continuer avec</p>
          <hr id="two">
        </div> -->
        <!-- <div class="Autre-opt" style=" width: 710px;">
          <div class="Autre-opt1">
            <img src="icones/flat-color-icons_google.png" alt="logo_google" style="margin-right: 5px;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 16px ; font-weight: 600; margin-top: 15px;">
              continuer avec Google</p>
          </div>
        </div> -->
        <!-- <div class="Autre-opt" style=" width: 710px;">
          <div class="Autre-opt1">
            <img src="icones/logos_facebook.png" alt="logo_google" style="margin-right: 5px;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 16px ; font-weight: 600; margin-top: 15px;">
              continuer avec Facebook</p>
          </div>
        </div> -->
        <div style="display: flex; flex-direction: column; align-items: center;">
          <div style="display: flex; margin-top: 20px;  ">
            <p style="margin-right: 5px;font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: 500;">
              Vous avez déjà un compte ?</p>
            <a href="connexion.php"
              style=" font-family: Arial, Helvetica, sans-serif; color: #D46EFF; font-size: 15px; font-weight: 600; margin-top: 15px;">Connectez-vous
              maintenant</a>
          </div>
        </div>

      </div>

    </div>
  </div>
  <footer>
    <div class="footer"
      style="background-color:#9B76AB; width: 100%; height: 330px; margin-top: 50px; display: flex; flex-direction: column; align-items: center;">
      <div style="display: flex; width: 80%; justify-content: space-around; margin-top: 30px;">
        <div style="display: flex; flex-direction: column;">
          <h1 style="color: white; font-family: Arial, Helvetica, sans-serif; font-weight: 700;">Son'co</h1>
          <div style="display:flex;">
            <img src="icones/ic_baseline-facebook.png" alt="">
            <img src="icones/ri_instagram-fill.png" alt="">
            <img src="icones/mdi_linkedin.png" alt="">
          </div>
        </div>
        <div style="display: flex; flex-direction: column; margin-top: 10px;">
          <p style="color: white; font-family: Arial, Helvetica, sans-serif; font-weight: 700; font-size: 25px;">Pages
          </p>
          <a href=""
            style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;margin-bottom: 8px; margin-top:-10px;">Acceuil</a>
          <a href=""
            style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;margin-bottom: 8px;">A
            propos</a>
          <a href=""
            style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;margin-bottom: 8px;">Contact</a>
          <a href=""
            style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;">Connexion</a>
        </div>
        <div style="display: flex; flex-direction: column; margin-top:10px;">
          <p
            style="color: white; font-family: Arial, Helvetica, sans-serif; font-weight: 700; font-size: 25px; margin-bottom: 0;">
            Contact</p>
          <p
            style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px;margin-top: 20px; ">
            +229 00 00 00 00</p>
          <p
            style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px; margin-top: 0;">
            +229 00 00 00 00</p>
          <p
            style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;margin-top: 0;">
            yinnouson'ma@gmail.com</p>
        </div>
      </div>
      <hr>
      <p></p>
    </div>
  </footer>
  <script>
    function togglePasswordVisibility(event, fieldId, toggleIcon) {
      event.preventDefault(); // Empêche le comportement par défaut du bouton

      const passwordField = document.getElementById(fieldId);
      const fieldType = passwordField.getAttribute('type');
      const icon = toggleIcon.querySelector('i');

      if (fieldType === 'password') {

        passwordField.setAttribute('type', 'text');
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');

      } else {

        passwordField.setAttribute('type', 'password');
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');

      }
    }
  </script>
</body>

</html>