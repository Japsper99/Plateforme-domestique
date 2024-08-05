<?php
  session_start();
  include_once('conexion_bd.php');
  if(!empty($_POST)){
     extract($_POST);
     $valid= (boolean) true;
      if(isset($_POST['connexion'])){  
        $nomutilisateur=trim($nomutilisateur);
       $pass=trim($pass);
      }
      //verification du champ nom utilisateur
      if(empty($nomutilisateur)){
        $valid=false;
        $err_nomutilisateur="Ce champ ne peut etre vide";
      }
      //verification du mot de passe
      if(empty($pass)){
        $valid=false;
        $err_pass="Ce champ ne peut etre vide";
      }
      //verification de la combinaison mot de passe/email
      if($valid){
        $req=$DB->prepare("SELECT mot_pass
          FROM donnee_inscription
          WHERE nomutilisateur =?");
        $req->execute(array($nomutilisateur)) ;
        $req=$req->fetch();
        if(isset($req['mot_pass'])){
          if(!password_verify($pass,$req['mot_pass'])) {
            $valid=false;
            $err_nomutilisateur="Cette combinaison de mot  de passe et d'email est incorect";
          }
        }else{
          $valid=false;
          $err_nomutilisateur="Cette combinaison de mot  de passe et d'email est incorect";
        }
      }
      if($valid){
        $req=$DB->prepare("SELECT *
        FROM donnee_inscription  WHERE nomutilisateur=?");
      $req->execute(array($nomutilisateur)) ;
      $req_utilisateur=$req->fetch();
      if(isset($req_utilisateur['id'])){
        $dateconexion=date('Y-m-d H:i:s');
        $_SESSION['id']=$req_utilisateur['id'];
        $_SESSION['nomutilisateur']=$req_utilisateur['nomutilisateur'];
        $_SESSION['email']=$req_utilisateur['email'];
        $_SESSION['statut_compte']=$req_utilisateur['statut_compte'];
        //redirection des utilisateurs en fonction du statut
        if($req_utilisateur['statut_compte'] == 'Prestataire') {
          header('Location: completerprofil.php');
          exit;
        } elseif($req_utilisateur['statut_compte'] == 'Clients') {
          header('Location: unefoisconnecteclients.php');
          exit;
       }else{
         $valid=false;
         $err_nomutilisateur="Cette combinaison de mot  de passe et d'email est incorect";
      }
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
    <title>Connexion</title>
</head>
<body>   
    <div class="container">

        <div class="entete">
        <a href="index.php" class="logo"><img src="img/logo.png" alt="" style="width:90px; margin-bottom:-4px;"></a>
            <a href="inscription.php" style="text-decoration:none;"> <div class="logo_conexion">
            <p style="margin-top: 15px; " ></p>Inscription</p>
            <img src="icones/ph_arrow-up-light.png" alt="">
        </div></a> 
        </div>

        <div class="formulaire_inscription">
            <div class="image">
                <!-- <img src="images/medium-shot-woman-doing-housework(1).jpg" alt="une image" width="500px"> -->
            </div>
            <div class="form " style="margin-top: 50px;">
                <p class="titre_form"> HEUREUX DE VOUS REVOIR </p>
                <p class="stitre" style="color: rgba(0, 0, 0,0.4); font-size: 16px; font-weight:600;"> Saisissez vos identifiants de connexion </p>
                <form action="" method="post" class="formulaire" >
                    <?php if(isset ($err_nomutilisateur)){echo $err_nomutilisateur;} ?>
                    <input type="text" name="nomutilisateur" id="nomutilisateur" placeholder="Nom utilisateur"  class="champs" required style="width: 700px;">

                    <div class="champs " style=" display:flex; width: 730px; justify-content: space-between; padding-left: 0px;" >

                        <input type="password" name="pass" placeholder="Mot de passe" id="motpasse" /  required class="champs" style="border-radius: 25px 0 0 25px; margin-bottom: 0; width:85%;">

                         <button type="button" style="border: none; background-color:rgba(227, 227, 227, 0.5); width: 25%; border-radius: 0 25px 25px 0;" onclick="togglePasswordVisibility(event,'motpasse', this)">
                            <i class="fas fa-eye-slash" style="font-size: 24px; margin-right: -70px;"></i>
                        </button>

                    </div>

                    <div style="display: flex; justify-content: space-between;  width: 700px; ">
                        <div>
                            <input type="checkbox" name="souhait" value="souhait" id="souhait" /> 
                            <label for="souhait" style="font-family: Arial, Helvetica, sans-serif; font-size: 15px;">Rester connecté</label>
                        </div>
                        <a href="#" style="font-family: Arial, Helvetica, sans-serif; color: #D46EFF; font-size: 15px; font-weight: 600;">Mot de passe oublié ?</a>
                    </div> 

                    <button type="submit" class="boutton" name="connexion" style="margin-top:60px; width: 730px;"> Se connecter </button>
                </form>

                <!-- <div class="separation">
                 <hr id="one">
                 <p style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: 600; margin-top: 18px;">ou continuer avec</p>
                 <hr id="two">
                </div> -->

                <!-- <div class="Autre-opt" >
                    <div class="Autre-opt1">
                        <img src="icones/flat-color-icons_google.png" alt="logo_google"  style="margin-right: 5px;">
                        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 16px ; font-weight: 600;">continuer avec Google</p>
                    </div>
                </div> -->

                <!-- <div class="Autre-opt">
                    <div class="Autre-opt1">
                        <img src="icones/logos_facebook.png" alt="logo_google" style="margin-right: 5px;">
                        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 16px ; font-weight: 600;">continuer avec Facebook</p>
                    </div>
                </div> -->

                <div style="display: flex; flex-direction: column; align-items: center;">
                    <div style="display: flex; margin-top: 20px; ">
                        <p style="margin-right: 5px;font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: 500;">Vous n'avez pas de compte ?</p>
                        <a href="inscription.php" style="margin-top: 15px; font-family: Arial, Helvetica, sans-serif; color: #D46EFF; font-size: 15px; font-weight: 600;">Inscrivez-vous maintenant</a>
                    </div>
                </div>

            </div>  
        </div>
    </div>
    <footer>
        <div class="footer" style="background-color:#9B76AB; width: 100%; height: 330px; margin-top: 50px; display: flex; flex-direction: column; align-items: center; " >
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
                <p style="color: white; font-family: Arial, Helvetica, sans-serif; font-weight: 700; font-size: 25px;">Pages</p>
                <a href="" style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;margin-bottom: 8px; margin-top:-10px;">Acceuil</a>
                <a href="" style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;margin-bottom: 8px;">A propos</a>
                <a href="" style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;margin-bottom: 8px;">Contact</a>
                <a href="" style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;">Connexion</a>
             </div>
             <div style="display: flex; flex-direction: column; margin-top:10px;">
               <p style="color: white; font-family: Arial, Helvetica, sans-serif; font-weight: 700; font-size: 25px; margin-bottom: 0;">Contact</p>
               <p style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px;margin-top: 20px; ">+229 00 00 00 00</p>
               <p style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px; margin-top: 0;">+229 00 00 00 00</p>
               <p style="color: white; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 18px ;margin-top: 0;">yinnouson'ma@gmail.com</p>
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