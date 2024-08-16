<?php

    session_start();
    require_once('connexion.php');

    @$email = $_POST['email'];
    @$passwd = $_POST['psswd'];
    @$valider=$_POST['boutonconnection'];
    if(isset($valider)){
        $email = stripcslashes($email);
        $passwd = stripcslashes($passwd);
        $email = mysqli_real_escape_string($connexion , $email);
        $passwd = mysqli_real_escape_string($connexion , $passwd);
    
        $query = "SELECT * FROM utilisateur  WHERE email='$email' AND passwd='$passwd'";
        $resultat= mysqli_query($connexion,$query);
        $final= mysqli_fetch_assoc($resultat);
    
        if($final){
            $_SESSION["acces"]=true;
            header("location:dashboard.php");
        }else{
            header("location:authentification.php?info=1");
        }
    }

    


?>