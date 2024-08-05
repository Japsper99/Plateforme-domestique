<?php
session_start();
//Initialisation des variables
  //Etape1
  $nom = $prenom = $genre ="";
  $date_naissance = $telephone = $skills = "";
  $err_nom = $err_prenom = $err_genre = $err_date_naissance = $err_telephone = $err_skills = "";
  //Etape2
  $ville = $quartier ="";
  $err_ville = $err_quartier = "";
  //Etape3 et 4
  $file_name_ci=$file_name_cj=$file_name_p=$file_name_pt="";
  $nom_temoin = $prenom_temoin = $email_temoin ="";
  $telephone_temoin = $date_naissance_temoin = $genre_temoin = "";
  $err_email_temoin= $err_file_ci = $err_file_p = "";
  $err_nom_temoin = $err_prenom_temoin = $err_genre_temoin = $err_date_naissance_temoin = $err_telephone_temoin = $err_skills = "";
//Récupération des données inscrit dans le formulaire 
 if(!empty($_POST)){
    $valid= (boolean) true;
    extract($_POST);
    if(isset($_POST['profil'])){
      $nom = trim($nom);
      $prenom =trim($prenom); 
      $genre =trim($genre);
      $date_naissance =trim($date_naissance); 
      $telephone =trim($telephone);
      $ville =trim($ville);
      //$skills =trim($skills);
      $quartier =trim($quartier);
      $nom_temoin =trim($nom_temoin);
      $prenom_temoin = trim($prenom_temoin);
      $email_temoin =trim($email_temoin);
      $telephone_temoin = trim($telephone_temoin);
      $date_naissance_temoin =trim($date_naissance_temoin);
      $genre_temoin = trim($genre_temoin);
      if (isset($_POST['skills']) && is_array($_POST['skills'])) {
         $skills = array_map('trim', $_POST['skills']);
       } else {
         $skills =[];  
      }
   }    
   //Vérification du nom
   if(empty($nom)){
      $valid=false;
      $err_nom="Ce champ ne peut etre vide";
   }elseif (mb_strlen($nom) < 4 ||mb_strlen($nom) > 20){ 
      $valid=false;
      $err_nom="votre nom doit être compris entre 4 et 20 caractères (".mb_strlen($prenom). "/20)";
   }elseif(!preg_match('/^[a-zA-Z]+$/', $nom)){
      $valid=false;
      $err_nom="votre nom ne peut contenir d'espace ni de caractere spéciaux";
   }else{
      $lettres = count_chars($nom, 1);
      foreach ($lettres as $lettre => $nombre) {
         if ($nombre > 4) {
            $valid=false;
            $err_nom="Votre nom peut contenir une même lettre plus de quatre fois";   
         }
     }
   }
   //Vérification du prenom
   if(empty($prenom)){
      $valid=false;
      $err_prenom="Ce champ ne peut etre vide";
   }elseif (mb_strlen($prenom) < 4 ||mb_strlen($prenom) > 20){ 
      $valid=false;
      $err_prenom="votre prenom doit être compris entre 4 et 20 caractères (".mb_strlen($prenom). "/20)";
   }elseif(!preg_match('/^[a-zA-Z]+$/', $prenom)){
      $valid=false;
      $err_prenom="votre prenom ne peut contenir d'espace ni de caractere spéciaux";
   }else{
      $lettres = count_chars($prenom, 1);
      foreach ($lettres as $lettre => $nombre) {
         if ($nombre > 4) {
            $valid=false;
            $err_prenom="Votre prenom peut contenir une même lettre plus de quatre fois";   
         }
     }
   }
   //Vérification du genre et date de naissance
   if(empty($genre)){
      $valid=false;
      $err_genre="Ce champ ne peut etre vide";
   }
   if(empty($date_naissance)){
      $valid=false;
      $err_date_naissance="Ce champ ne peut etre vide";
   }else{
      //Calcul de l'âge
      $age = date_diff(date_create($date_naissance), date_create('today'))->y;
      if($age>=17){
         $valid=true;
      }else{
         $valid=false;
         $err_date_naissance="Les prestataires du site doivent être agé de plus de 18ans"; 
      }
   }
   //Vérification du numero de telephone
   if(empty($telephone)){
      $valid=false;
      $err_telephone="Ce champ ne peut etre vide";
   }else{
      //Définir la liste des préfixes autorisés
      $prefixesAutorises = [
        42, 46, 50, 51, 52, 53, 54, 56, 57, 59, 61, 62, 66, 67, 69, 90, 91, 96, 97, 
        40, 44, 60, 64, 68, 87, 89, 92, 93, 95, 98, 65, 99
    ];
    // Vérifier si le numéro est composé de 8 chiffres
    if (preg_match('/^\d{8}$/', $telephone)) {
        // Extraire les deux premiers chiffres du numéro
        $prefixe = intval(substr($telephone, 0, 2));
        // Vérifier si les deux premiers chiffres font partie des préfixes autorisés
        if (!in_array($prefixe, $prefixesAutorises)) {
         $valid=false;
         $err_telephone="Entrez un numero de telephone valide"; 
        }
    }else{
      $valid=false;
      $err_telephone="Le numero de telephone entrer n'est pas valide"; 
    }
   }
   //Vérification des domaines de compétences

     if (empty($skills)) {
      $valid = false;
      $err_skills = "Ce champs ne peut être vide";
      } 
   //Vérification de la ville et du quartier
   if(empty($ville)){
      $valid=false;
      $err_ville="Ce champ ne peut etre vide";
   }
   if(empty($quartier)){
      $valid=false;
      $err_quartier="Ce champ ne peut etre vide";
   }
   //Verification du nom du nom_temoin
   if(empty($nom_temoin)){
      $valid=false;
      $err_nom_temoin="Ce champ ne peut etre vide";
   }elseif (mb_strlen($nom_temoin) < 4 ||mb_strlen($nom_temoin) > 20){ 
      $valid=false;
      $err_nom_temoin="Le nom doit être compris entre 4 et 20 caractères (".mb_strlen($prenom). "/20)";
   }elseif(!preg_match('/^[a-zA-Z]+$/', $nom_temoin)){
      $valid=false;
      $err_nom_temoin="Le nom ne peut contenir d'espace ni de caractere spéciaux";
   }else{
      $lettres = count_chars($nom_temoin, 1);
      foreach ($lettres as $lettre => $nombre) {
         if ($nombre > 4) {
            $valid=false;
            $err_nom_temoin="Votre nom peut contenir une même lettre plus de quatre fois";   
         }
      }
   }
   //Vérification du prenom du temoin
   if(empty($prenom_temoin)){
      $valid=false;
      $err_prenom_temoin="Ce champ ne peut etre vide";
   }elseif (mb_strlen($prenom_temoin) < 4 ||mb_strlen($prenom_temoin) > 20){ 
      $valid=false;
      $err_prenom_temoin="votre prenom doit être compris entre 4 et 20 caractères (".mb_strlen($prenom). "/20)";
   }elseif(!preg_match('/^[a-zA-Z]+$/', $prenom_temoin)){
      $valid=false;
      $err_prenom_temoin="votre prenom ne peut contenir d'espace ni de caractere spéciaux";
   }else{
      $lettres = count_chars($prenom, 1);
      foreach ($lettres as $lettre => $nombre) {
         if ($nombre > 4) {
            $valid=false;
            $err_prenom_temoin="Votre prenom peut contenir une même lettre plus de quatre fois";   
         }
      }
   } 
   //verification de l'email_temoin
   if (empty($email_temoin)) {
      $valid = false;
      $err_email_temoin = "Ce champ ne peut être vide";
   } else{
    if (!filter_var($email_temoin, FILTER_VALIDATE_EMAIL)) {
      $valid = false;
      $err_email_temoin = "L'email que vous avez renseigné est invalide";
    }
   }
   //Verification du numero de téléphone du témoin
   if(empty($telephone_temoin)){
      $valid=false;
      $err_telephone_temoin="Ce champ ne peut etre vide";
   }else{
      //Définir la liste des préfixes autorisés
      $prefixesAutorises = [
        42, 46, 50, 51, 52, 53, 54, 56, 57, 59, 61, 62, 66, 67, 69, 90, 91, 96, 97, 
        40, 44, 60, 64, 68, 87, 89, 92, 93, 95, 98, 65 ,99
    ];
    // Vérifier si le numéro est composé de 8 chiffres
    if (preg_match('/^\d{8}$/', $telephone)) {
        // Extraire les deux premiers chiffres du numéro
        $prefixe = intval(substr($telephone, 0, 2));
        // Vérifier si les deux premiers chiffres font partie des préfixes autorisés
        if (!in_array($prefixe, $prefixesAutorises)) {
         $valid=false;
         $err_telephone_temoin="Entrez un numero de telephone valide"; 
        }
    }else{
      $valid=false;
      $err_telephone_temoin="Le numero de telephone entrer n'est pas valide"; 
    }
   }
   //Verification date de naissance et genre du temoin 
   if(empty($genre_temoin)){
      $valid=false;
      $err_genre_temoin="Ce champ ne peut etre vide";
   }
   if(empty($date_naissance_temoin)){
      $valid=false;
      $err_date_naissance_temoin="Ce champ ne peut etre vide";
   }else{
      //Calcul de l'âge
      $age = date_diff(date_create($date_naissance_temoin), date_create('today'))->y;
      if($age>=17){
         $valid=true;
      }else{
         $valid=false;
         $err_date_naissance_temoin="Votre témoin doit être majeure "; 
      }
   }
   if($valid){
      if (!isset($_SESSION['profil'])) {
         $_SESSION['profil'] = [];
     }
     $_SESSION['profil'][]= ['nom' => $nom, 'prenom' => $prenom , 'genre' => $genre , 'date_naissance'=> $date_naissance , 'telephone'=> $telephone ,
     'ville' => $ville ,'quartier'=>  $quartier , 'nom_temoin'=> $nom_temoin, 'prenom_temoin'=> $prenom_temoin , 'email_temoin'=> $email_temoin , 
     'telephone_temoin'=> $telephone_temoin , 'date_naissance_temoin'=> $date_naissance_temoin, 'genre_temoin'=> $genre_temoin];
     
     if (!isset($_SESSION['skills'])) {
      $_SESSION['skills'] = [];
     }
     $_SESSION['skills'][] = $skills;
   }
   //Récupération des données de l'étape 4
    //Attestation de résidence
    if(!isset($_FILES['attestation_residence']) || $_FILES['attestation_residence']['error'] == UPLOAD_ERR_NO_FILE) {
      $valid = false;
      $err_file_ci = "Ce champ ne peut être vide";
    }elseif($_FILES['attestation_residence']['error'] == 0){
       // Déclaration des variables pour le fichier
      $file_name_ci = $_FILES['attestation_residence']['name'];
      $file_tmp_ci = $_FILES['attestation_residence']['tmp_name'];
      $file_size_ci = $_FILES['attestation_residence']['size'];
      $file_ext_ci = strtolower(pathinfo($file_name_ci, PATHINFO_EXTENSION));
       // Extensions de fichier autorisées
      $extensions = array("jpeg","jpg","png","pdf");
     if(!in_array($file_ext_ci, $extensions)) {
         $valid = false;
         $err_file_ci = "L'attestation doit être sous format JPEG, JPG, PNG ou PDF.";
      }
      if($file_size_ci > 2097152) { // 2MB
          $valid = false;
          $err_file_ci = "La taille du fichier de l'attestation ne doit pas dépasser 2 Mo.";
      }
      if($valid) {
         // Dossier de destination
         $upload_dir = 'uploads/';
         if(!is_dir($upload_dir)) {
             mkdir($upload_dir, 0755, true);
         }
         // Déplacer le fichier téléchargé
         $new_file_name = 'attestation_residence_' . $file_name_ci;
         if(move_uploaded_file($file_tmp_ci, $upload_dir . $new_file_name)) {
            if(!isset($_SESSION['attestation_residence'])) {
               $_SESSION['attestation_residence'] = array();
           }
           // Ajouter le nouveau fichier au tableau
           $_SESSION['attestation_residence'] = $new_file_name;
           $success_ci = "Le fichier d'attestation de résidence a été téléchargé avec succès.";
       } 
      }  
   }else{
      $valid = false;
      $err_file_ci = "Erreur lors du téléchargement du fichier d'attestation de résidence.";  
   }
    //Carte d'identité du prestataire

       if(!isset($_FILES['piece']) || $_FILES['piece']['error'] == UPLOAD_ERR_NO_FILE) {
           $valid = false;
           $err_file_p = "Ce champ ne peut être vide";
       } elseif($_FILES['piece']['error'] == 0) {
           // Variables pour le fichier
           $file_name_p = $_FILES['piece']['name'];
           $file_tmp_p = $_FILES['piece']['tmp_name'];
           $file_size_p = $_FILES['piece']['size'];
           $file_ext_p = strtolower(pathinfo($file_name_p, PATHINFO_EXTENSION));

           // Extensions de fichier autorisées
           $extensions = array("jpeg", "jpg", "png", "pdf");

           if(!in_array($file_ext_p, $extensions)) {
               $valid = false;
               $err_file_p = " La pièce d'identité à fournir doit être sour format JPEG, JPG, PNG ou PDF.";
           }

           if($file_size_p > 2097152) { // 2MB
               $valid = false;
               $err_file_p = "La taille du fichier de la pièce d'identité ne doit pas dépasser 2 Mo.";
           }
           if($valid) {
               // Dossier de destination
               $upload_dir = 'uploads/';
               if(!is_dir($upload_dir)) {
                   mkdir($upload_dir, 0755, true);
               }
               // Déplacer le fichier téléchargé
               $new_file_name = 'piece_' . $file_name_p;
              if(move_uploaded_file($file_tmp_p, $upload_dir . $new_file_name)) ;{
               if(!isset($_SESSION['piece'])) {
                  $_SESSION['piece'] = array();
              }
              $_SESSION['piece'] = $new_file_name;
              $success_ci = "Le fichier d'attestation de résidence a été téléchargé avec succès.";
             }  
           }
       } else {
           $valid = false;
           $err_file_p = "Erreur lors du téléchargement du fichier de casier judiciaire.";
       }
    //Casier_judiciaire

    if(!isset($_FILES['Casier_judiciaire']) || $_FILES['Casier_judiciaire']['error'] == UPLOAD_ERR_NO_FILE) {
      $valid = false;
      $err_file_cj = "Ce champ ne peut être vide";
  } elseif($_FILES['Casier_judiciaire']['error'] == 0) {
      // Variables pour le fichier
      $file_name_cj = $_FILES['Casier_judiciaire']['name'];
      $file_tmp_cj = $_FILES['Casier_judiciaire']['tmp_name'];
      $file_size_cj = $_FILES['Casier_judiciaire']['size'];
      $file_ext_cj = strtolower(pathinfo($file_name_cj, PATHINFO_EXTENSION));
      // Extensions de fichier autorisées
      $extensions = array("jpeg", "jpg", "png", "pdf");
      if(!in_array($file_ext_cj, $extensions)) {
          $valid = false;
          $err_file_cj = " La pièce d'identité à fournir doit être sour format JPEG, JPG, PNG ou PDF.";
      }
      if($file_size_cj > 2097152) { // 2MB
          $valid = false;
          $err_file_cj = "La taille du fichier de la pièce d'identité ne doit pas dépasser 2 Mo.";
      }
      if($valid) {
          // Dossier de destination
          $upload_dir = 'uploads/';
          if(!is_dir($upload_dir)) {
              mkdir($upload_dir, 0755, true);
          }
          // Déplacer le fichier téléchargé
          $new_file_name = 'Casier_judiciaire_' . $file_name_cj;
           if (move_uploaded_file($file_tmp_cj, $upload_dir . $new_file_name)) {
            if(!isset($_SESSION['Casier_judiciaire'])) {
               $_SESSION['Casier_judiciaire'] = array();
           }
           $_SESSION['Casier_judiciaire'] = $new_file_name;
           $success_cj= "Le fichier de casier judiciaire a été téléchargé avec succès.";
         }   
      }
  } else {
      $valid = false;
      $err_file_cj = "Erreur lors du téléchargement du fichier de casier judiciaire.";
  } 
    //piece du témoin
    if(!isset($_FILES['piece_temoin']) || $_FILES['piece_temoin']['error'] == UPLOAD_ERR_NO_FILE) {
      $valid = false;
      $err_file_pt = "Ce champ ne peut être vide";
  } elseif($_FILES['piece_temoin']['error'] == 0) {
      // Variables pour le fichier
      $file_name_pt = $_FILES['piece_temoin']['name'];
      $file_tmp_pt = $_FILES['piece_temoin']['tmp_name'];
      $file_size_pt = $_FILES['piece_temoin']['size'];
      $file_ext_pt = strtolower(pathinfo($file_name_pt, PATHINFO_EXTENSION));
      // Extensions de fichier autorisées
      $extensions = array("jpeg", "jpg", "png", "pdf");
      if(!in_array($file_ext_pt, $extensions)) {
          $valid = false;
          $err_file_pt = " La pièce d'identité à fournir doit être sour format JPEG, JPG, PNG ou PDF.";
      }
      if($file_size_pt> 2097152) { // 2MB
          $valid = false;
          $err_file_pt = "La taille du fichier de la pièce d'identité ne doit pas dépasser 2 Mo.";
      }
      if($valid) {
          // Dossier de destination
          $upload_dir = 'uploads/';
          if(!is_dir($upload_dir)) {
              mkdir($upload_dir, 0755, true);
          }
          // Déplacer le fichier téléchargé
          $new_file_name = 'piece_temoin_' . $file_name_pt;
           if (move_uploaded_file($file_tmp_pt, $upload_dir .$new_file_name )) {
            if(!isset($_SESSION['piece_temoin'])) {
               $_SESSION['piece_temoin'] = array();
            }
            $_SESSION['piece_temoin'] = $new_file_name;
            $success_pt= "Le fichier de casier judiciaire a été téléchargé avec succès.";
           }
      }
      
   } else {
      $valid = false;
      $err_file_pt = "Erreur lors du téléchargement du fichier de casier judiciaire.";
   } 
   $_SESSION['show_popup'] = true; 
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="profil.css">
   <title>Document</title>
   <style>
      body {
         font-family: Arial, Helvetica, sans-serif;
      }

      .dropdown {
         position: relative;
         display: flex;
         flex-direction: column;
         width: 100%;
      }

      .dropbtn {
         background-color: rgba(0, 0, 0, 0.1);
         color: rgba(0, 0, 0, 0.5);
         font-size: 20px;
         border: none;
         cursor: pointer;
         width: 100%;
         text-align: left;
         height: 70px;
         box-sizing: border-box;
         padding-left: 35px;
         padding-right: 20px;
         font-family: Arial, Helvetica, sans-serif;
      }

      .dropdown-content {
         display: none;
         position: absolute;
         background-color: #f9f9f9;
         min-width: 100%;
         box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
         z-index: 1;
         flex-direction: column;
      }

      .dropdown-content label {
         text-decoration: none;
         display: block;
         cursor: pointer;
         padding: 12px 16px;
      }

      .dropdown-content label:hover {
         background-color: #f1f1f1;
      }

      .show {
         display: flex;
      }

      .popup-background {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, 0.2);
         backdrop-filter: blur(5px);
         display: flex;
         justify-content: center;
         align-items: center;
         z-index: 1000;
      }

      .popo1 {
         display: flex;
         flex-direction: column;
         align-items: center;
         width: 550px;
         height: 355px;
         background-color: white;
         border-radius: 25px;
      }

      .popo2 {
         display: flex;
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
</head>
<body>
   <div class="containerprincipal">
      <div class="container">
         <div class="navigation">
         <a href="index.php" class="logo"><img src="img/logo.png" alt="" style="width:90px; margin-bottom:-4px;"></a>
            <div class="link">
               <p id="monprofil">Mon Profil</p>
            </div>
         </div>
         <div class="contenu">
            <div class="entete">
               <div>
                  <img src="icones/clarity_notification-line.png" alt="" style="margin-right: 40px;">
               </div>
            </div>
            <div class="Ravi">
               <p id="heureux">Ravi de vous compter parmi nous</p>
               <p id="avertissement">Tachez de mettre de vraies informations</p>
            </div>
            <form method="post" enctype="multipart/form-data">
               <div class="formulaire">
                  <div class="rubrique">
                     <div id="barre"></div>
                     <div class="rubriques">
                        <pre><p class="pre titreetape" id="pre1"><span>|</span>   Profil utilisateur</p></pre>
                        <pre><p class="pre titreetape"><span>|</span>   Adresse</p></pre>
                        <pre><p class="pre titreetape"><span>|</span>   Témoin</p></pre>
                        <pre><p class="pre titreetape"><span>|</span>   Document</p></pre>
                     </div>
                  </div>
                  <div class="contenue Etape " id="Etape1" style="display: none;">
                     <div class="titre">
                        <img src="icones/profil.png" alt="une image" class="img1">
                        <p class="title">Profil utilisateur</p>
                     </div>
                     <div class="separer"></div>
                     <div class="rinput">
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_nom)){echo $err_nom;} ?>
                              <label for="nom">Nom</label>
                              <input type="text" name="nom" id="nom" placeholder="Entrer votre nom"
                                 value="<?php if(isset ($nom)){echo $nom;} ?>"
                                 style="box-sizing: border-box; padding-left: 35px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500;">
                           </div>
                           <div class="champs">
                              <?php if(isset ($err_prenom)){echo $err_prenom;} ?>
                              <label for="prenom">Prenom</label>
                              <input type="text" name="prenom" id="prenom" placeholder="Entrer votre prenom"
                                 value="<?php if(isset ($prenom)){echo $prenom;} ?>"
                                 style="box-sizing: border-box; padding-left: 35px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500;">
                           </div>
                        </div>
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_telephone)){echo $err_telephone;} ?>
                              <label for="telephone">Numéro de telephone</label>
                              <div style="display:flex; width: 100%; background-color: rgba(0, 0, 0, 0.1); justify-content: space-between; border-radius: 10px; align-items: center; ">
                              <img src="icones/emojione-v1_flag-for-benin.png" alt="drapeau_Bénin"
                              style=" width: 45px ; height:40px;  margin-left: 10px;  ">
                              <input type="tel" name="telephone" id="telephone" placeholder="+229"
                                 value="<?php if(isset ($telephone)){echo $telephone;} ?>"
                                 style="box-sizing: border-box; padding-left:5px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500; width: 85%; background-color: transparent;">
                              </div>
                             
                           </div>
                           
                           <div class="champs">
                              <?php if(isset ($err_date_naissance)){echo $err_date_naissance;} ?>
                              <label for="date_naissance">Date de naissance</label>
                              <input type="date" name="date_naissance" id="date_naissance" placeholder="JJ/MM/AA"
                                 value="<?php if(isset ($date_naissance)){echo $date_naissance;} ?>"
                                 style="box-sizing: border-box; padding-left: 35px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500;">
                           </div>
                           <!-- <img src="icones/ph_calendar-light.png" alt="calendrier"
                              style="position: absolute; bottom: 38px;right: 56px;"> -->

                        </div>
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_genre)){echo $err_genre;} ?>
                              <label for="genre">Genre</label>
                              <select name="genre" id="genre" required style=" border: none; width: 100%; height: 70px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.1);
                              font-family: Arial, Helvetica, sans-serif; font-size: 20px; padding-left: 30px;">
                                 <option selected disabled style="display: none;"> Sélectionnez votre genre </option>
                                 <option value="Prestataire" class="option">Féminin</option>
                                 <option value="Clients" class="option">Masculin</option>
                              </select>
                           </div>
                           <div class="champs">
                              <?php if(isset ($err_skills)){echo $err_skills;} ?>
                              <div class="dropdown">
                                 <label for="">Domaines de compétences</label>
                                 <button type="button" class="dropbtn" style="font-weight: 400;">Selectionez vos
                                    compétences</button>
                                 <div class="dropdown-content">
                                    <label style="font-size: 16px; font-weight: 400; margin-bottom: 0;"><input
                                          type="checkbox" name="skills[]" value="MENAGE"
                                          style="width: 20px; height: 20px;">MENAGE </label>
                                    <label style="font-size: 16px; font-weight: 400; margin-bottom: 0;"><input
                                          type="checkbox" name="skills[]" value="CUISINE"
                                          style="width: 20px; height: 20px;"> CUISINE</label>
                                    <label style="font-size: 16px; font-weight: 400; margin-bottom: 0;"><input
                                          type="checkbox" name="skills[]" value="GARDE D'ENFANT"
                                          style="width: 20px; height: 20px;"> GARDE D'ENFANT</label>
                                    <label style="font-size: 16px; font-weight: 400; margin-bottom: 0;"><input
                                          type="checkbox" name="skills[]" value="ASSISTANT MALADE"
                                          style="width: 20px; height: 20px;"> ASSISTANT MALADE</label>
                                    <label style="font-size: 16px; font-weight: 400; margin-bottom: 0;"><input
                                          type="checkbox" name="skills[]" value="AGENT D'ENTRETIENT"
                                          style="width: 20px; height: 20px;">AGENT D'ENTRETIENT</label>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="button">
                        <button type="button" onclick="etapeSuivante(1)">Suivant</button>
                     </div>
                  </div>

                  <div class="contenue Etape Etape2" id="Etape2" style=" height: 500px; display: none;">
                     <div class="titre">
                        <img src="icones/adresse.png" alt="une image" class="img1" id="adresse">
                        <p class="title" id="addr">Adresse</p>
                     </div>

                     <div class="separer"></div>

                     <div class="rinput" id="add">
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_ville)){echo $err_ville;} ?>
                              <label for="ville">Ville</label>
                              <select name="ville" id="ville" required style=" border: none; width: 100%; height: 70px;  border-radius: 10px; background-color: rgba(0, 0, 0, 0.1);
                              font-family: Arial, Helvetica, sans-serif; font-size: 20px; padding-left: 30px;">
                                 <option selected disabled style="display: none;"> Sélectionnez votre ville </option>
                                 <option value="Allada" class="option">Allada</option>
                                 <option value="Bohicon" class="option">Bohicon</option>
                                 <option value="Cotonou" class="option">Cotonou</option>
                                 <option value="kandi" class="option">Kandi</option>
                                 <option value="Ouidah" class="option">Ouidah</option>
                                 <option value="Parakou" class="option">Parakou</option>
                                 <option value="Porto-Novo" class="option">Porto-Novo</option>
                                 <option value="Tchaorou" class="option">Tchaorou</option>
                              </select>
                           </div>
                           <div class="champs">
                              <?php if(isset ($err_quartier)){echo $err_quartier;} ?>
                              <label for="quartier">Quartier</label>
                              <select name="quartier" id="quartier" required style=" border: none; width: 100%; height: 70px;  border-radius: 10px; background-color: rgba(0, 0, 0, 0.1);
                              font-family: Arial, Helvetica, sans-serif; font-size: 20px; padding-left: 30px;">
                                 <option selected disabled style="display: none;"> Sélectionnez votre quartier</option>
                                 <option value="Akassato" class="option">Avlékété</option>
                                 <option value="Arafat" class="option">Arafat</option>
                                 <option value="Ouidah" class="option">Athiémé</option>
                                 <option value="Godomey" class="option">Godomey</option>
                                 <option value="Kassakou" class="option">Kassakou</option>
                                 <option value="Ouidah" class="option">Lissazoumè</option>
                                 <option value="Togoudo" class="option">Togoudo</option>
                                 <option value="Sehoueho" class="option">Sehoueho</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="button" id="button1">
                        <button type="button" onclick="etapePrecedente(2)">Précédent</button>
                        <button type="button" onclick="etapeSuivante(2)">Suivant</button>
                     </div>
                  </div>

                  <div class="contenue Etape" id="Etape3" style="display: none;">
                     <div class="titre">
                        <img src="icones/profil.png" alt="une image" class="img1">
                        <p class="title">Témoin</p>
                     </div>

                     <div class="separer"></div>

                     <div class="rinput">
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_nom_temoin)){echo $err_nom_temoin;} ?>
                              <label for="nom_temoin">Nom</label>
                              <input type="text" name="nom_temoin" id="nom_temoin" placeholder="Entrer le nom du témoin"
                                 value="<?php if(isset ($nom_temoin)){echo $nom_temoin;} ?>"
                                 style="box-sizing: border-box; padding-left: 35px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500;">
                           </div>
                           <div class="champs">
                              <?php if(isset ($err_prenom_temoin)){echo $err_prenom_temoin;} ?>
                              <label for="prenom_temoin">Prenom</label>
                              <input type="text" name="prenom_temoin" id="prenom_temoin"
                                 value="<?php if(isset ($prenom_temoin)){echo $prenom_temoin;} ?>"
                                 placeholder="Entrer le prénom du témoin"
                                 style="box-sizing: border-box; padding-left: 35px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500;">
                           </div>
                        </div>
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_email_temoin)){echo $err_email_temoin;} ?>
                              <label for="email_temoin">Adresse email</label>
                              <input type="email" name="email_temoin" id="email_temoin"
                                 value="<?php if(isset ($email_temoin)){echo $email_temoin;} ?>"
                                 placeholder="Entrer l email du témoin"
                                 style="box-sizing: border-box; padding-left: 35px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500;">
                           </div>
                           <div class="champs">
                              <?php if(isset ($err_telephone_temoin)){echo $err_telephone_temoin;} ?>
                              <label for="telephone_temoin">Numéro de telephone</label>
                              <div style="display:flex; width: 100%; background-color: rgba(0, 0, 0, 0.1); justify-content: space-between; border-radius: 10px; align-items: center; ">
                              <img src="icones/emojione-v1_flag-for-benin.png" alt="drapeau_Bénin"
                              style=" width: 45px ; height:40px;  margin-left: 10px;  ">
                              <input type="tel" name="telephone_temoin" id="telephone_temoin" placeholder="+229"
                                 value="<?php if(isset ($telephone_temoin)){echo $telephone_temoin;} ?>"
                                 style="box-sizing: border-box; padding-left:5px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500; width: 85%; background-color: transparent;">
                              </div>
                           </div>
                        </div>
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_date_naissance_temoin)){echo $err_date_naissance_temoin;} ?>
                              <label for="date_naissance_temoin">Date de naissance</label>
                              <input type="date" name="date_naissance_temoin" id="date_naissance_temoin"
                                 value="<?php if(isset ($date_naissance_temoin)){echo $date_naissance_temoin;} ?>"
                                 placeholder="Entrer la date de naissance du témoin"
                                 style="box-sizing: border-box; padding-left: 35px; font-size: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: 500;">
                           </div>
                           <div class="champs">
                              <?php if(isset ($err_genre_temoin)){echo $err_genre_temoin;} ?>
                              <label for="genre_temoin">Genre</label>
                              <select name="genre_temoin" id="genre_temoin" required style=" border: none; width: 100%; height: 70px;  border-radius: 10px; background-color: rgba(0, 0, 0, 0.1);
                              font-family: Arial, Helvetica, sans-serif; font-size: 20px; padding-left: 30px;">
                                 <option selected disabled style="display: none;"> Sélectionnez le genre du témoin
                                 </option>
                                 <option value="Masculin" class="option">Masculin</option>
                                 <option value="Feminin" class="option">Feminin</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="button" id="button1">
                        <button type="button" onclick="etapePrecedente(3)">Précédent</button>
                        <button type="button" onclick="etapeSuivante(3)">Suivant</button>
                     </div>
                  </div>

                  <div class="contenue Etape" id="Etape4" style="display: none;">

                     <div class="titre">
                        <img src="icones/document.png" alt="une image" class="img1" id="doc">
                        <p class="title">Documents</p>
                     </div>

                     <div class="separer"></div>

                     <div class="rinput">
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_file_ci)){echo $err_file_ci;} ?>
                              <label for="attestation_residence">Attestation de résidence</label>
                              <div style="display: flex; flex-direction: column; width: 100%; background-color: rgba(0, 0, 0, 0.1);height: 70px; 
                                       border-radius: 10px; align-items: center; justify-content: center;">
                                 <input type="file" name="attestation_residence" id="attestation_residence"
                                    style="display: none; " onchange="telechargerfichier()"
                                    value="<?php if(isset ($file_name_ci)){echo $file_name_ci;} ?>">
                                 <label for="attestation_residence" style="font-weight: 100; color: #D46EFF; font-size: 16px; letter-spacing: 1px;
                                 cursor: pointer; text-decoration: underline;" id="custom-file-label">Joindre un
                                    fichier</label>
                              </div>
                           </div>

                           <div class="champs">
                              <?php if(isset ($err_file_p)){echo $err_file_p;} ?>
                              <label for="piece">Pièce d identité</label>
                              <div style="display: flex; flex-direction: column; width: 100%; background-color: rgba(0, 0, 0, 0.1);height: 68px; 
                                       border-radius: 10px; align-items: center; justify-content: center;">
                                 <input type="file" name="piece" id="piece" style="display: none;"
                                    value="<?php if(isset ($file_name_p)){echo $file_name_p;} ?>"
                                    onchange="telechargerfichie()">
                                 <label for="piece" style="font-weight: 100; color: #D46EFF; font-size: 16px; letter-spacing: 1px;
                                 cursor: pointer; text-decoration: underline;" id="label-piece">Joindre un
                                    fichier</label>
                              </div>

                           </div>
                        </div>
                        <div class="srinput">
                           <div class="champs">
                              <?php if(isset ($err_file_cj)){echo $err_file_cj;} ?>
                              <label for="Casier_judiciaire">Casier judiciaire</label>

                              <div style="display: flex; flex-direction: column; width: 100%; background-color: rgba(0, 0, 0, 0.1);height: 70px; 
                                       border-radius: 10px; align-items: center; justify-content: center;">
                                 <input type="file" name="Casier_judiciaire" id="Casier_judiciaire"
                                    placeholder="Entrer l attestation de résidence" style="display: none; "
                                    value="<?php if(isset ($file_name_cj)){echo $file_name_cj;} ?>"
                                    onchange="telechargefichier()">
                                 <label for="Casier_judiciaire" style="font-weight: 100; color: #D46EFF; font-size: 16px; letter-spacing: 1px;
                                 cursor: pointer; text-decoration: underline;" id="label-casier">Joindre un
                                    fichier</label>
                              </div>
                           </div>

                           <div class="champs">
                              <?php if(isset ($err_file_pt)){echo $err_file_pt;} ?>
                              <label for="piece_temoin">Pièce d identité du témoin </label>
                              <div style="display: flex; flex-direction: column; width: 100%; background-color: rgba(0, 0, 0, 0.1);height: 68px; 
                                       border-radius: 10px; align-items: center; justify-content: center;">
                                 <input type="file" name="piece_temoin" id="piece_temoin" style="display: none; "
                                    value="<?php if(isset ($file_name_pt)){echo $file_name_pt;} ?>"
                                    onchange="telechargefichie()">
                                 <label for="piece_temoin" style="font-weight: 100; color: #D46EFF; font-size: 16px; letter-spacing: 1px;
                                 cursor: pointer; text-decoration: underline;" id="label-piece-temoin">Joindre un
                                    fichier</label>
                              </div>
                           </div>
                        </div>
                        <div class="rond" style="bottom:-40px;">
                           <p
                              style="color: white; font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: 600;">
                              !</p>
                        </div>

                        <div class="avertissements" style="margin-top: 60px;">
                           <p id="textaver" style="margin-left: 10px;">En cliquant sur le bouton <span
                                 id="Envoye">"Soumettre"</span> ci-dessous, vous
                              ne pourrez plus modifier les informations de ce formulaire avant vérification de votre
                              profil
                              par notre équipe</p>
                        </div>
                     </div>
                     <div class="button" id="button1">
                        <button type="button" onclick="etapePrecedente(4)">Précédent</button>
                        <button type="submit" name="profil">Soumettre</button>
                     </div>
                     <script>
                        function telechargerfichier() {

                           const fileInput = document.getElementById('attestation_residence');
                           const customFileLabel = document.getElementById('custom-file-label');
                           const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Joindre un fichier';
                           customFileLabel.textContent = fileName;
                        }
                        function telechargerfichie() {

                           const fileInput = document.getElementById('piece');
                           const customFileLabel = document.getElementById('label-piece');
                           const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Joindre un fichier';
                           customFileLabel.textContent = fileName;
                        }
                        function telechargefichier() {

                           const fileInput = document.getElementById('Casier_judiciaire');
                           const customFileLabel = document.getElementById('label-casier');
                           const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Joindre un fichier';
                           customFileLabel.textContent = fileName;
                        }
                        function telechargefichie() {

                           const fileInput = document.getElementById('piece_temoin');
                           const customFileLabel = document.getElementById('label-piece-temoin');
                           const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Joindre un fichier';
                           customFileLabel.textContent = fileName;
                        }
                     </script>
                  </div>
               </div>
            </form>
           
            <?php
// Vérifiez si le pop-up doit être affiché
if (isset($_SESSION['show_popup']) && $_SESSION['show_popup']) {
    if (isset($_SESSION['nombre'])) {
        $nombre = $_SESSION['nombre'];
        switch ($nombre) {
            case 3:
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
            case 2:
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
            <script>
               let currentEtape = 1;

               function showEtape(Etape) {
                  // Cacher toutes les étapes
                  const steps = document.querySelectorAll('.Etape');
                  steps.forEach((stepElement) => {
                     stepElement.style.display = 'none';
                     stepElement.classList.remove('active-etape');
                  });

                  // Afficher l'étape actuelle
                  const currentStepElement = document.getElementById(`Etape${Etape}`);
                  currentStepElement.style.display = 'flex';
                  currentStepElement.classList.add('active-etape');
               }

               function etapeSuivante(Etape) {
                  currentEtape = Etape + 1;
                  showEtape(currentEtape);
               }

               function etapePrecedente(Etape) {
                  currentEtape = Etape - 1;
                  showEtape(currentEtape);
               }

               // Afficher la première étape au chargement de la page
               document.addEventListener('DOMContentLoaded', () => {
                  showEtape(currentEtape);
               });

               document.addEventListener('DOMContentLoaded', function () {
                  var dropbtn = document.querySelector('.dropbtn');
                  var dropdownContent = document.querySelector('.dropdown-content');

                  dropbtn.addEventListener('click', function (event) {
                     dropdownContent.classList.toggle('show');
                     event.stopPropagation();
                  });

                  // Prevent closing the dropdown when clicking inside the dropdown content
                  dropdownContent.addEventListener('click', function (event) {
                     event.stopPropagation();
                  });

                  // Close the dropdown if the user clicks outside of it
                  window.addEventListener('click', function (event) {
                     if (!event.target.matches('.dropbtn')) {
                        if (dropdownContent.classList.contains('show')) {
                           dropdownContent.classList.remove('show');
                        }
                     }
                  });
               });
            </script>
         </div>
      </div>
      <footer>
         <div class="footer"
            style="background-color:#9B76AB; width: 100%; height: 330px; margin-top: 50px; display: flex; flex-direction: column; align-items: center; margin-top: 0;">
            <div style="display: flex; width: 80%; justify-content: space-around; margin-top: 30px;">
               <div style="display:flex; flex-direction: column;">
                  <h1 style="color: white; font-family: Arial, Helvetica, sans-serif; font-weight: 700;">Son'Co
                  </h1>
                  <div style="display:flex;">
                     <img src="icones/ic_baseline-facebook.png" alt="">
                     <img src="icones/ri_instagram-fill.png" alt="">
                     <img src="icones/mdi_linkedin.png" alt="">
                  </div>
               </div>
               <div style="display: flex; flex-direction: column; margin-top: 10px;">
                  <p
                     style="color: white; font-family: Arial, Helvetica, sans-serif; font-weight: 700; font-size: 25px;">
                     Pages</p>
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
                     yinnousonma@gmail.com</p>
               </div>
            </div>
            <hr>
            <p></p>
         </div>
      </footer>
   </div>
</body>
</html>