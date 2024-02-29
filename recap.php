<?php
session_start();

?>



<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Récapitulatif des produits</title>
    </head>
    
    <body>
    <div class="d-flex flex-column align-item-center m-5"></div>
    <h1 class="text primary m-3">Votre panier de produit</h1>
    <?php
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p> Aucun produit en session.....</p>";
    } else {
        echo "<table class='table table-striped'>",
        "<thead>",
        "<tr>",
        "<th scope='col'>#</th>",
        "<th scope='col'>Nom</th>",
        "<th scope='col'>Prix</th>",
        "<th scope='col'>Quantité</th>",
        "<th scope='col'>Total</th>",
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
        "<td colspan=4>Total général : </td>",
        "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
        "</tr>",
        "</tbody>",
        "</table>";
    }
    ?>
</body>

</html>



<!-- var_dump($_SESSION); -->

<div class="d-flex flex-column align-item-center m-5"></div>
<h1 class="text primary m-3"></h1>