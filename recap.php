<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Récapitulatif des produits</title>
</head>

<body>
    <div class="d-flex flex-column align-items-center  m-5">
        <h1 class="text-primary m-3 text-center ">Votre panier de produit</h1>

        <div class="container" style="margin-bottom: 10px;">

            <!-- NAVBAR -->
            <nav class="nav nav-pills d-flex justify-content-center ju mt-3">

                <a class="nav-link" href="http://localhost/JeanFran%c3%a7ois_Guilpain/appli_php_1/index.php">Ajouter produit</a>

                <a class="nav-link position-relative " href="http://localhost/JeanFran%C3%A7ois_Guilpain/appli_php_1/recap.php">
                    Panier
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        <?php
                        include "function.php";
                        echo panier();
                        ?> <!-- Function pour afficher le nombre d'article dans le panier -->

                    </span>
                </a>
                <form method="post" action="http://localhost/JeanFran%C3%A7ois_Guilpain/appli_php_1/index.php?action=del"> <!-- bouton de l'action del... ne marche pas  -->
                    <button type="submit" class="nav-link">Supprimer panier</button>
                </form>


            </nav>
        </div>

        <?php
        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo "<p> Aucun produit en session.....</p>";
        } else {
            echo "<table class='table table-striped  w-50 text-center align-middle table-bordered ' style='margin-top:15px;'>",
            "<thead>",
            "<tr>",
            "<th class='p-3 mb-2 bg-primary text-white'>#</th>",
            "<th class='p-3 mb-2 bg-primary text-white'>Nom</th>",
            "<th class='p-3 mb-2 bg-primary text-white'>Prix</th>",
            "<th class='p-3 mb-2 bg-primary text-white'>Quantité</th>",
            "<th class='p-3 mb-2 bg-primary text-white'>Total</th>",
            "</tr>",
            "</thead>",
            "</tbody>";
            $totalGeneral = 0;
            foreach ($_SESSION['products'] as $index => $product) {
                echo "<tr>",
                "<td>" . $index . "</td>",
                "<td>" . $product['name'] . "</td>",
                "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                "<td>" . $product['qtt'] . "</td>",
                "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                "</tr>";
                $totalGeneral = $totalGeneral + $product['total'];
            }
            echo "<tr>",
            "<td class='p-3 mb-2 bg-primary text-white'colspan=4><strong>Total général : </strong></td>",
            "<td class='p-3 mb-2 bg-success text-white'><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
            "</tr>",
            "</tbody>",
            "</table>";
        }
        ?>


        <!-- var_dump($_SESSION); -->


        <!-- chercher un bouton supprimer sur bootstrap
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>


        