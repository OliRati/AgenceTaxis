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
            <h1>Ajouter un conducteur</h1>
            <form action="" method="POST">
                <div class="flex">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="flex">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="flex">
                    <button type="submit" name="envoyer">Envoyer</button>
                    <button type="submit" name="submit">Annuler</button>
                </div>
            </form>
        </article>
    </main>
</body>

</html>