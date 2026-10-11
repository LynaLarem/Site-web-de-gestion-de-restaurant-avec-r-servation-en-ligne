<?php
//inclure la page de connexion
 include_once "con_dbb.php";
 //verifier si une session existe
 if(!isset($_SESSION)){
    //si non demarer la session
    session_start();
 }
 //creer la session
 if(!isset($_SESSION['panier'])){
    //s'il nexiste pas une session on creer une et on mets un tableau a l'interieur 
    $_SESSION['panier'] = array();
 }
 //recuperation de l'id dans le lien
  if(isset($_GET['id'])){//si un id a ete envoye alors :
    $id = $_GET['id'] ;
    //verifier grace a l'id si le produit existe dans la base de  donnees
    $produit = mysqli_query($con ,"SELECT * FROM products WHERE id = $id") ;
    if(empty(mysqli_fetch_assoc($produit))){
        //si ce produit n'existe pas
        die("This product does not exist.");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(isset($_SESSION['panier'][$id])){// si le produit est deja dans le panier
        $_SESSION['panier'][$id]++; //Represente la quantite 
    }else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id]= 1 ;
    }

   //redirection vers la page index.php
   header("Location:index.php");


  }
?>