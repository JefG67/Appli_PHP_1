 <?php
    session_start();
    
    $index = isset($_GET['id']) ? $_GET['id'] : null; // on récupére la valeur d'un parametre id dans URL si elle existe sinon on lui attribue la valeur "null", (?)= operateur ternaire pour cree une condition
    
    // je verifie si une action est spécifiée dans l'url
    if(isset($_GET['action'])) {
        switch($_GET['action']){

            //action pour ajouter un produit
            case "add":

                    if (isset($_POST['submit'])) {
                        //je crée des filtres pour les données du formulaire
                        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
                        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                        if ($name && $price && $qtt) {
                            //création d'un tableau représentant le produit et le calcul total
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
                        } elseif //je crée une condition si les données rentrer dans le formaulaire son incorect pour renvoyer un message d'erreur
                            (isset($_POST['submit'])){ //je verifie l'existence de la clé "submit" dans le tableau $_POST, la clé correspond à l'attribut "name" du bouton input type="submit" name="submit" du formulaire.La condition sera alors vraie seulement si la requete POST transmet bien une clé "submit" au serveur
                                
                                $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>
                                Votre produit n'a pas été enregistré ! 
                                </div>";   

                            }// je crée ma redirection vers la page index.php
                            header("Location:index.php");
                            die;
                    
                        }
                        break;
            //action vider le panier            
            case "clear":
                    if (isset($_SESSION['products'])){

                        //retire l'élément de la session
                        unset($_SESSION['products']);

                        //avec un message de succes 
                        $_SESSION['message'] = "<div class='alert alert-success' role='alert'>
                        Votre panier a bien été supprimé.
                        </div>";
            
                                                
                        header("Location:recap.php");
                        die;
                    }
                    break;
            //action pour supprimer un produit du panier         
            case "del":
                    if (isset($_SESSION['products'][$index])){

                        $nomProduitDelete = $_SESSION['products'][$index]['name']; // je cree une variable pour recuperer le nom du produit 

                        $_SESSION['message']="<div class='alert alert-success' role='alert'>
                        Le produit ".$nomProduitDelete. " a bien été supprimé.
                        </div>";
                        unset($_SESSION['products'][$index]); //suppresion du produit spécifier de la session

                        header("Location:recap.php");
                        die;
                    }
                    
                    break;
            //action pour rajouter la quandtité des produits
            case "up-qtt":
                    $_SESSION['products'][$index]['qtt'] +=1;
                    $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt']*$_SESSION['products'][$index]['price'];
                    header("Location:recap.php");
                    exit;
                    
                    
            //action pour diminuer la quantité des produits     
            case "down-qtt":
                $_SESSION['products'][$index]['qtt'] -=1;
                    $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt']*$_SESSION['products'][$index]['price'];
                //rajout de la condition si la quantité passe a 0 le produit est supprimé avec un message
                if ($_SESSION['products'][$index]['qtt']<= 0 ){
                    $_SESSION['message']="<div class='alert alert-success' role='alert'>
                    Le produit a bien été supprimé. 
                    </div>";
                    
                    unset($_SESSION['products'][$index]);
                }   
                    header("Location:recap.php");
                    exit;
                    




        }
        //renvoie un message d'erreur si action est lancé
    $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>
    Cette page n'existe pas 
    </div>";   
    header("Location:index.php");
    die;
    }
   













 