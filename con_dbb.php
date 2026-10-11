<?php 
//connexion a la base de données
$con = mysqli_connect("localhost","root","","mydb");
//verifier la connexion
if(!$con) die('Erreur : '.mysqli_connect_error());



?>