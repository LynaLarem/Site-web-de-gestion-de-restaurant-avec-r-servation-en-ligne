<?php 
   session_start();
   include_once "con_dbb.php";

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="panier">
    <a href="index.php" class="link">Online Order</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php 
              $total = 0 ;
              // liste des produits
              //recuperer les cles du tableau session
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune cle dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
                echo <a href="menu.php">Return to Menu page</a> 
              }else {
                //si oui 
                $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");

                //lise des produit avec une boucle foreach
                foreach($products as $product):
                    //calculer le total ( prix unitaire * quantite) 
                    //et aditionner chaque resutats a chaque tour de boucle
                    $total = $total + $product['price'] * $_SESSION['panier'][$product['id']] ;
                ?>
                <tr>
                    <td><img src="project_images/<?=$product['img']?>"></td>
                    <td><?=$product['name']?></td>
                    <td><?=$product['price']?>Da</td>
                    <td><?=$_SESSION['panier'][$product['id']] // Quantite?></td>
                    <td><a href="panier.php?del=<?=$product['id']?>"><i class="fa-solid fa-trash-can fa-lg" style="color: #ffa200;"></i></a></td>
                </tr>

            <?php endforeach ;} ?>

            <tr class="total">
                <th>Total : <?=$total?>Da</th>
            </tr>
        </table>
    </section>
</body>
</html>