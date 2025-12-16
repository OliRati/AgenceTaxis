<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicules</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <main>
        <article>
            <h1>Editer un vehicule</h1>
            <form action="" method="POST">
                <input type="text" value="<?= $car['marque'] ?>" placeholder="Marque">
                <input type="text" value="<?= $car['modele'] ?>" placeholder="Marque">
                <input type="text" value="<?= $car['couleur'] ?>" placeholder="Marque">
                <input type="text" value="<?= $car['immatriculation'] ?>" placeholder="Marque">

                <input type="button" value="Modifier">
                <input type="button" value="Annuler">
            </form>
        </article>
    </main>
</body>

</html>