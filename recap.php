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

                <a class="nav-link" href="index.php">Ajouter produit</a>

                <a class="nav-link position-relative " href="recap.php">
                    Panier
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        <?php
                        include "function.php";
                        echo panier();
                        ?> <!-- Function pour afficher le nombre d'article dans le panier -->

                    </span>
                </a>
                <a href="traitement.php?action=clear"> <!-- bouton de l'action clear...  -->
                    <button type="submit" class="nav-link">Supprimer panier</button>
                </a>


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
            "<th class='p-3 mb-2 bg-primary text-white'>-</th>",
            "<th class='p-3 mb-2 bg-primary text-white'>Quantité</th>",
            "<th class='p-3 mb-2 bg-primary text-white'>+</th>",
            "<th class='p-3 mb-2 bg-primary text-white'>Total</th>",
            "<th class='p-3 mb-2 bg-primary text-white'>Sup</th>",
            
            "</tr>",
            "</thead>",
            "</tbody>";
            $totalGeneral = 0;
            foreach ($_SESSION['products'] as $index => $product) {
                echo "<tr>",
                "<td>" . $index . "</td>",
                "<td>" . $product['name'] . "</td>",
                "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                "<td><a href='traitement.php?action=down-qtt&id=". $index."' class='btn' role='button' data-bs-toggle='button'>-</a></td>
                ",//bouton -
                "<td>" . $product['qtt'] . "</td>",
                "<td><a href='traitement.php?action=up-qtt&id=". $index."' class='btn' role='button' data-bs-toggle='button'>+</a></td>
                ", //bouton+ 
                "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                "<td><a href='traitement.php?action=del&id=". $index."'><button type='button' class='btn-close' aria-label='Close'></button></a></td>";
                "</tr>";
                $totalGeneral = $totalGeneral + $product['total'];
            }
            echo "<tr>",
            "<td class='p-3 mb-2 bg-primary text-white'colspan=6><strong>Total général : </strong></td>",
            "<td class='p-3 mb-2 bg-success text-white'colspan=2><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
            "</tr>",
            "</tbody>",
            "</table>";
            
        }
            
            
            
            
        ?>
               


        <!-- afficher le message pour supprimer le panier  -->
        <?php
        if (isset($_SESSION['message'])) {
            // envoyer le message puis le supprime ensuite 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        //affiche le message pour supprimer un article du panier
        if (isset($_SESSION['Erreur'])) {
            // envoyer le message puis le supprime ensuite 
            echo $_SESSION['Erreur'];
            unset($_SESSION['Erreur']);
        }
        //affiche le message pour supprimer un article quand la quantité passe a 0
        if (isset($_SESSION['Erreur2'])) {
            // envoyer le message puis le supprime ensuite 
            echo $_SESSION['Erreur2'];
            unset($_SESSION['Erreur2']);
        }



        ?>

        


