<?php
    ob_start();
?>


    
    <div class="d-flex flex-column align-items-center m-5">

        </p>
        <h1 class="text-primary">Ajouter un produit</h1>
        <form action="traitement.php?action=add" method="post">

            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name" class="form-control mx-3">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit en € :
                    <input type="text" step="any" name="price" class="form-control mx-3">
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
                    <a href="recap.php" class="btn btn-primary position-relative">
                        Panier
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php
                            include "function.php";
                            echo panier();
                            ?>
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

// je verifie si la variable existe et est non nul 
if (isset($_SESSION['message'])) {
    // envoyer le message puis le supprime ensuite 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
                    
 ?>
<?php
    $title = "Ajouter produit";
    $content = ob_get_clean();

    require_once "template.php"; 
 ?>



