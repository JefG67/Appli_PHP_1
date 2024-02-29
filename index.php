<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Ajout produit</title>
</head>

<body>
    <div class="d-flex flex-column align-items-center m-5">

        </p>
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
            <div class="text-center">
                <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-primary mx-auto text-center">
                <div class="position-absolute top-0"style="margin-top: 10px;">
                    <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-primary mx-auto text-center">
                    <a href="http://localhost/Guilpain%20Jean-Fran%C3%A7ois/Appli_PHP_1/recap.php" class="btn btn-primary position-relative">
                        Panier
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </div>
            </div>
            </p>
        </form>
</body>

</html>

<?php
session_start();
// je verifie si la variable existe et est non nul 
if (isset($_SESSION['message'])) {
    // envoyer le message puis le supprime ensuite 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>




