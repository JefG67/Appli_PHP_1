<?php
session_start();
//afficher la quantité d'article
function panier()
{
    $totalProduit = 0   ;
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {  //verifie si la session products est vide
    } else {
        foreach ($_SESSION['products'] as $index => $product) { //sinon il calcule le nombre d'article
            
                $totalProduit = $totalProduit + $product["qtt"];
                
            }
        }
        return $totalProduit;
    }

    