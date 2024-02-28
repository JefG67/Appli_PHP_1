<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Ajout produit</title>
</head>
<div class="d-flex flex-column align-items-center m-5">
<body>
    <h1 class="text-primary">Ajouter un produit</h1>
    <form action="traitement.php" method="post">
        
        <p>
            <label>
                Nom du produit :
                <input type="text" name="name" class="form-control mx-3">
            </label>
        </p>
        <p>
            <label>
                Prix du produit en € :
                <input type="number" step="any" name="price" class="form-control mx-3">
            </label>
        </p>
        <p>
            <label>
                Quantité désirée :
                <input type="number" name="qtt" value="1" class="form-control mx-3">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-primary mx-auto text-center">
        </p>
    </form>
 </body>

</html>

