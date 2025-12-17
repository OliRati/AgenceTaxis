<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicules</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <style>
        .flex {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
    </style>
    <main>
        <article>
            <h1>Editer un vehicule</h1>
            <form action="?id=<?= $idVehicule ?>" method="POST">
                <div class="flex">
                    <label for="marque">Marque</label>
                    <input type="text" id="marque" name="marque" value="<?= $car['marque'] ?>" placeholder="Marque">
                </div>
                <div class="flex">
                    <label for="modele">Modele</label>
                    <input type="text" id="modele" name="modele" value="<?= $car['modele'] ?>" placeholder="Marque">
                </div>
                <div class="flex">
                    <label for="couleur">Couleur</label>
                    <input type="text" id="couleur" name="couleur" value="<?= $car['couleur'] ?>" placeholder="Marque">
                </div>
                <div class="flex">
                    <label for="immatriculation">Immatriculation</label>
                    <input type="text" id="immatriculation" name="immatriculation" value="<?= $car['immatriculation'] ?>" placeholder="Marque">
                </div>
                <div class="flex">
                    <button type="submit" name="envoyer">Envoyer</button>
                    <button type="submit" name="annuler">Annuler</button>
                </div>
            </form>
        </article>
    </main>
</body>

</html>