<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prestataire.css">
    <link rel="stylesheet" href="clients.css">
    <title>Document</title>
</head>

<body>

    <div class="containerprincipal">
        <div class="container">
            <div class="navigation">
            <a href="index.php" class="logo"><img src="img/logo.png" alt="" style="width:90px; margin-bottom:-4px;"></a>                <div class="onglets">
                    <div class="lien "style="justify-content: flex-start; width: 200px;"><img src="icones/Vector.png" alt=""><a href="#Projets" style="margin-left: 20px;">Mes projets</a></div>
                    <div class="lien "style="justify-content: flex-start; width: 200px;"><img src="icones/Vector-1.png" alt=""><a href="#Annonces" style="margin-left: 20px;">Annonces</a></div>
                    <div class="lien" style="justify-content: flex-start; width: 200px;"><img src="icones/chatbot.png" alt=""><a href="#ChatBot" style="margin-left: 20px;">ChatBot</a></div>
                    <div class="lien" style="justify-content: flex-start; width: 200px;"><img src="icones/f7_exclamationmark-square-fill.png" alt="" style="margin-left: -3px;"> <a href="#Plaintes" style="margin-left: 20px;">Plaintes</a></div>
                </div>
            </div>
            <div class="contenu">
                <div class="entete">
                    <input type="search" style="width: 230px; height:40px ; margin-right: 800px; 
                    font-family: Arial, Helvetica, sans-serif; font-size: 16px ; border-radius: 40px; padding-left: 20px;" placeholder="|Rechercher"> 
                    <div style="margin-right: 50px; width: 50px; height: 40px; background-color: rgba(0, 0, 0, 0.1);
                    display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                        <img src="icones/clarity_notification-line.png" alt="notification" >
                    </div>
                </div>
                <section id="projets">
                    <div class="contenu">

                        <div class="Ravi">
                            <p class="heureux">Mes Projets</p>
                            <p id="avertissement">Vous trouverez ici vos projets en cours ou terminés</p>
                        </div>
                        <?php if (isset($_SESSION['projets'])) : ?>
                        <div class="projetsencours">
                            <p class="titre">Projets en cours</p>
                            
                            <div class="pprojet" style="display: flex; align-items: center; justify-content: space-around;">
                                <img src="icones/Vector.png" alt="" style="width: 35px; height: 45px; margin-left: 30px;" >
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">N°XXXXX</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">Garde d'enfants</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">A temps plein</p>
                                <div style="display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; border-radius: 50px; background-color: #D46EFF;"> <pre style="color: white; font-size: 25px;">-></pre></div>
                            </div>
                            <div class="pprojet" style="display: flex; align-items: center; justify-content: space-around;">
                                <img src="icones/Vector.png" alt="" style="width: 35px; height: 45px; margin-left: 30px;">
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">N°XXXXX</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">Garde d'enfants</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">A temps plein</p>
                                <div style="display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; border-radius: 50px; background-color: #D46EFF;"> <pre style="color: white; font-size: 25px;">-></pre></div>
                            </div>
                            <div class="pprojet" style="display: flex; align-items: center; justify-content: space-around;">
                                <img src="icones/Vector.png" alt="" style="width: 35px; height: 45px; margin-left: 30px;">
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">N°XXXXX</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">Garde d'enfants</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">A temps plein</p>
                                <div style="display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; border-radius: 50px; background-color: #D46EFF;"> <pre style="color: white; font-size: 25px;">-></pre></div>
                            </div>
                        </div>
                        <div class="projetstermine">
                            <p class="titre">Projets terminés</p>
                            <div class="liste">
                                <div class="elemntliste">
                                    <p class="teliste">Garde d'enfants</p>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <p class="date"> Depuis le 22/03/2024</p>
                                    <button class="boutton">Consulter</button>

                                </div>
                                <div class="elemntliste">
                                    <p class="teliste">Garde d'enfants</p>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <p class="date"> Depuis le 22/03/2024</p>
                                    <button class="boutton">Consulter</button>

                                </div>
                                <div class="elemntliste">
                                    <p class="teliste">Garde d'enfants</p>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <p class="date"> Depuis le 22/03/2024</p>
                                    <button class="boutton">Consulter</button>

                                </div>
                                <div class="elemntliste">
                                    <p class="teliste">Garde d'enfants</p>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <p class="date"> Depuis le 22/03/2024</p>
                                    <button class="boutton">Consulter</button>

                                </div>
                            </div>

                        </div>
                        <?php else: ?>
                        <p  style=" font-family: Arial, Helvetica, sans-serif;">Vous n'avez pas encore de projets en cours</p>
                        <p style="color:#D46EFF;  font-family: Arial, Helvetica, sans-serif;">Vous pourrez démarrez en faisant une annonces</p>
                        <?php endif; ?>
                    </div>
                </section>
                <section id="Annonces" style="display: none;">
                    <div class="contenu">
                        <div class="Ravi">
                            <p class="heureux" id="">Annonces</p>
                            <p id="avertissement">Vous pouvez créer une annonce pour trouver un ou plusieurs prestataires pour vous aider</p>
                        </div>
                        <form action="" style="width: 98%;">
                            <div class="formulaireplainte">
                                <p class="titre " id="titrep">Formulaire d'annonce</p>
                                <div class="formplainte " style="height: 900px;">
                                    <div class="rinput">
                                        <div class="srinput">
                                            <div class="champs">
                                                <label for="objet_annonce">objet de l'annonce</label>
                                                <input type="text" name="objet_annonce" id="objet_annonce" placeholder="Entrer votre nom">
                                            </div>
                                            <div class="champs">
                                                <label for="Budget">Budget Prévu</label>
                                                <input type="text" name="Budget" id="Budget" placeholder="Entrer votre prenom">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="nb"> <span class="nb1">NB:</span> Pour toutes les prestations nous prélevons 15% de votre budget. Aucun frais supplémentaire n'est prélevé aprés </p>
                                    <div style="display: flex; justify-content: space-between; width: 95%; margin-top: -20px;">
                                       <div style="display: flex; ">
                                          <p class="nb1" >Montant:</p>
                                          <p class="nb" style="margin-left: 5px; ">10000f</p>
                                       </div> 
                                       <div style="display: flex;">
                                        <p class="nb1">Frais:</p>
                                        <p class="nb" style="margin-left: 5px; ">15%</p>
                                     </div> 
                                     <div style="display: flex;">
                                        <p class="nb1">Total:</p>
                                        <p class="nb" style="margin-left: 5px; ">11500f</p>
                                     </div> 
                                    </div>
                                    <div class="rinput" style="margin-top: 0;">
                                        <div class="srinput">
                                            <div class="champs">
                                                <label for="Lieu">Lieu</label>
                                                <input type="text" name="lieu" id="lieu" placeholder="Entrer votre nom">
                                            </div>
                                            <div class="champs">
                                                <label for="Budget">Autres avantages</label>
                                                <input type="text" name="Budget" id="Budget" placeholder="Entrer votre prenom">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px; display: flex; flex-direction: column; width: 95%;">
                                        <label for="Objet">Description</label>
                                        <textarea type="" name="Objet" id="Objet" class="pligne"
                                            placeholder="Décrivez la prestation ue vous voulez"
                                            style="border: none; background-color: rgba(0, 0, 0, 0.1); width: 100%; height: 400px; border-radius: 15px;"></textarea>
                                    </div>
                                    <button style="margin-top: 30px;">Publier</button>
                                </div>
    
                            </div>
                        </form>
                        <div class="projetsencours">
                            <p class="titre " id="titrep">Toutes mes annonces</p>
                            <div class="annonce">
                                <div class="elemntliste">
                                    <p class="teliste">Garde d'enfants</p>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <p class="date"> Depuis le 22/03/2024</p>
                                    <button class="boutton">Consulter</button>
                                </div>
                                <div class="elemntliste">
                                    <p class="teliste">Garde d'enfants</p>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <p class="date"> Depuis le 22/03/2024</p>
                                    <button class="boutton">Consulter</button>
                                </div>
                                <div class="elemntliste">
                                    <p class="teliste">Garde d'enfants</p>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <p class="date"> Depuis le 22/03/2024</p>
                                    <button class="boutton">Consulter</button>
                                </div>
                                <div class="elemntliste">
                                    <p class="teliste">Garde d'enfants</p>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                    <p class="date"> Depuis le 22/03/2024</p>
                                    <button class="boutton">Consulter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ChatBot" style="display: none;">
                    <div class="contenu">
                       
                        <div class="Ravi">
                            <p class="heureux" id="forumm">ChatBot</p>
                            <p id="avertissement">Trouver des réponses à des questions fréquentes grâce à notre Chatbot</p>
                        </div>
                        <div class="espacemessage">
                            <div class="concerner">
                                <p class="concerne">Aminata</p>
                                <p id="nombre">ChatBot</p>
                            </div>
                            <div class="Chatbot">
                            </div>
                        </div>
                    </div>
                </section>
                <section id="Plaintes" style="display: none;">
                    <div class="contenu">
                        
                        <div class="Ravi">
                            <p class="heureux" id="">Plaintes</p>
                            <p id="avertissement"> Déposez une plainte en cas de problèmes, joindre un fichier pour
                                l'appuyez
                            </p>
                        </div>
                        <form action="" style="width: 98%;">
                            <div class="formulaireplainte">
                                <p class="titre " id="titrep">Formulaire de plaintes</p>
                                <div class="formplainte">
    
                                    <div class="rinput">
                                        <div class="srinput">
                                            <div class="champs">
                                                <label for="mail">Adresse mail</label>
                                                <input type="text" name="mail" id="mail" placeholder="Entrer votre nom">
                                            </div>
                                            <div class="champs">
                                                <label for="Nom">Nom complet</label>
                                                <input type="text" name="Nom" id="Nom" placeholder="Entrer votre prenom">
                                            </div>
                                        </div>
                                        <div class="srinput" style="margin-top: 50px;">
                                            <div class="champs">
                                                <label for="Objet">Objet de la plainte</label>
                                                <input type="text" name="Objet" id="Objet"
                                                    placeholder="Entrer votre numéro de téléphone">
                                            </div>
                                            <div class="champs">
                                                <label for="date_naissance">Pièce jointe(optionel)</label>
                                                <input type="text" name="date_naissance" id="date_naissance"
                                                    placeholder="Entrer votre date de naissance">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 40px; display: flex; flex-direction: column; width: 95%;">
                                        <label for="Objet">Objet de la plainte</label>
                                        <textarea type="" name="Objet" id="Objet" class="pligne"
                                            placeholder="Entrer votre numéro de téléphone"
                                            style="border: none; background-color: rgba(0, 0, 0, 0.1); width: 100%; height: 400px; border-radius: 15px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="projetsencours">
                            <p class="titre " id="titrep">Toutes mes plaintes</p>
                            <div class="pprojet" style="display: flex; align-items: center; justify-content: space-around;">
                                <img src="icones/Vector.png" alt="" style="width: 35px; height: 45px; margin-left: 30px;" >
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">N°XXXXX</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">03/06/2024</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">Traitement en cours</p>
                                <div style="display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; border-radius: 50px; background-color: #D46EFF;"> <pre style="color: white; font-size: 25px;">-></pre></div>
                            </div>
                            <div class="pprojet" style="display: flex; align-items: center; justify-content: space-around;">
                                <img src="icones/Vector.png" alt="" style="width: 35px; height: 45px; margin-left: 30px;" >
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">N°XXXXX</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">03/06/2024</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">Traitement achevé</p>
                                <div style="display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; border-radius: 50px; background-color: #D46EFF;"> <pre style="color: white; font-size: 25px;">-></pre></div>
                            </div>
                            <div class="pprojet" style="display: flex; align-items: center; justify-content: space-around;">
                                <img src="icones/Vector.png" alt="" style="width: 35px; height: 45px; margin-left: 30px;" >
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">N°XXXXX</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">03/06/2024</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 500;">|</p>
                                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 600;">Traitement achevé</p>
                                <div style="display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; border-radius: 50px; background-color: #D46EFF;"> <pre style="color: white; font-size: 25px;">-></pre></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <footer>
            <div class="footer" style="background-color:#9B76AB; width: 100%; height: 330px; margin-top: 50px; display: flex; flex-direction: column; align-items: center; margin-top: 0;">
               <div style="display: flex; width: 80%; justify-content: space-around; margin-top: 30px;">
                 <div style="display: flex; flex-direction: column;">
                   <h1 style="color: white; font-family: Arial, Helvetica, sans-serif; font-weight: 700;">Son'Co</h1>
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
    </div>
    <script>
        const onglets = document.querySelectorAll('.onglets div');
        const sections = document.querySelectorAll('.contenu section');

        onglets.forEach((onglet, index) => {
            onglet.addEventListener('click', () => {
                sections.forEach(section => {
                    section.style.display = 'none';
                });
                sections[index].style.display = 'flex';
            });
        });
    </script>
    
</body>

</html>