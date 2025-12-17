<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicules</title>
    <link rel="stylesheet" href="<?= WEB_ROOT . "/assets/css/pico.min.css" ?>">
    <link rel="stylesheet" href="<?= WEB_ROOT . "/assets/css/style.css" ?>">
</head>

<body>
    <style>
        .flex {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
    </style>

    <?php include PATH_PROJECT . "/views/nav/nav.php"; ?>

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
                    <input type="text" id="immatriculation" name="immatriculation"
                        value="<?= $car['immatriculation'] ?>" placeholder="Marque">
                </div>
                <div class="flex">
                    <button type="submit" name="envoyer">Envoyer</button>
                    <button type="button" onclick="window.location.href='<?= WEB_ROOT . "/vehicule/list-vehicule.php" ?>';">Annuler</button>
                </div>
            </form>
        </article>
    </main>
</body>

</html>