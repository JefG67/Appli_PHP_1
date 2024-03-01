 <?php
    session_start();



    if (isset($_POST['submit'])) {

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if ($name && $price && $qtt) {
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price * $qtt,

            ];
            $_SESSION['products'][] = $product;
            //message a afficher quand l'ajout d'un produit c'est bien passé
            $_SESSION['message'] = "<div class='alert alert-success' role='alert'>
                Votre produit à bien été enrengistré !
              </div>";
        } elseif
            (isset($_POST['submit'])){ //je verifie l'existence de la clé "submit" dans le tableau $_POST, la clé correspond à l'attribut "name" du bouton input type="submit" name="submit" du formulaire.La condition sera alors vraie seulement si la requete POST transmet bien une clé "submit" au serveur
                
                $_SESSION['Erreur'] = "<div class='alert alert-danger' role='alert'>
                Votre produit n'a pas été enregistré ! 
                </div>";   

            }
        
    }

    header("Location:index.php");




