<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        
        #statutcompte {
            background-color: #f8f9fa;
            color: #343a40;
            border: 2px solid #007bff;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            font-size: 1.2em;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
        }
        
        #statutcompte option {
            background-color: #ffffff;
            color: #495057;
        }
        
        #statutcompte option:hover {
            background-color: #ff00d9;
            color: #ffffff;
        }
        
        #statutcompte option[disabled] {
            display: none;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2>Formulaire d'inscription</h2>
        <form>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom">
            </div>
            <div class="form-group">
                <label for="statutcompte">Statut compte</label>
                <select class="form-control" id="statutcompte">
                    <option selected disabled>Statut compte</option>
                    <option value="prestataire">Prestataire</option>
                    <option value="client">Client</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
```

Vous pouvez ajuster ces styles selon vos besoins pour personnaliser l'apparence de la liste déroulante et de ses options.