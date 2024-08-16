<?php
    $hostname="localhost";
    $login = "root";
    $passwd = "";
    $database="dBventeVoiture";

    $connexion = mysqli_connect($hostname,$login,$passwd);
    mysqli_select_db($connexion,$database);

    
    if(!$connexion){
        die('Impossible de se connecter à la base de données'.mysqli_connect_error()); 
    }
    
?>