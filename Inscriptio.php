<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Compétences</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .srinput {
            display: flex;
            width: 100%;
            justify-content: space-between;
            margin-top: 18px;
        }
        .champs {
            display: flex;
            flex-direction: column;
            width: 48%
        }
        .dropdown {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 200px;
        }
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            width: 200px;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dropbtn:after {
            content: '\25BC';
            float: right;
            margin-left: 10px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            flex-direction: column;
        }

        .dropdown-content label {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            cursor: pointer;
        }

        .dropdown-content label:hover {
            background-color: #f1f1f1;
        }

        .show {
            display: flex;
        }
    </style>
</head>

<body>
    <form action="save_skills.php" method="POST">
        <div class="srinput">
            <div class="champs">
                <label for="genre">Genre</label>
                <select name="genre" id="genre" required style=" border: none; width: 100%; height: 70px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.1);
                font-family: Arial, Helvetica, sans-serif; font-size: 20px; padding-left: 30px;">
                    <option selected disabled style="display: none;"> Sélectionnez votre genre </option>
                    <option value="Prestataire" class="option">Féminin</option>
                    <option value="Clients" class="option">Masculin</option>
                </select>
            </div>
            <div class="champs">
                <div class="dropdown">

                    <button type="button" class="dropbtn">Selectionez vos compétences</button>
                    <div class="dropdown-content">
                        <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
                        <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
                        <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label>
                        <label><input type="checkbox" name="skills[]" value="Python"> Python</label>
                        <label><input type="checkbox" name="skills[]" value="PHP"> PHP</label>
                        <!-- Ajoutez d'autres options ici -->
                    </div>
                </div>
            </div>
        </div>

        <button type="submit">Envoyer</button>
    </form>
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
</body>

</html>