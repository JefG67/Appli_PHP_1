<?php
session_start();

?>



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
    
    <?php
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p> Aucun produit en session.....</p>";
    } else {
        echo "<table class='table table-striped w-50 text-center align-middle table-bordered'>" ,
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
    </div>
    </div>
</body>

</html>



<!-- var_dump($_SESSION); -->

<!-- 
"<td class="table-secondary"> . $index .</td>",  
"<td class="table-secondary"> . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€ </td>",  

"<td>" . $index . "</td>", -->