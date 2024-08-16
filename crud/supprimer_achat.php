<?php
session_start();
require_once('../page/connexion.php');

if($_SESSION["acces"]!=true){
    header("location:../page/authentification.php");
    exit();
}

    if(isset($_POST['numAchat'])){
        $numAchat =str_replace("A","",$_POST['numAchat']) ;
        
        require_once('../page/connexion.php');

        $query = "DELETE FROM achat WHERE numAchat='$numAchat'";
        $query3="SELECT idvoit,qte FROM achat WHERE numAchat='$numAchat'";
        $resultat3= mysqli_query($connexion,$query3);
        $rows=mysqli_fetch_assoc($resultat3);
        
        $quantite=$rows['qte'];
        $idvoit=$rows['idvoit'];
        
        $sqlupdate= "UPDATE voiture SET nombre=nombre+'$quantite' WHERE  idvoit='$idvoit'";
        $resultat= mysqli_query($connexion,$query);
        $resultat2= mysqli_query($connexion,$sqlupdate);
    }
    mysqli_close($connexion);
    header("location:../page/affichage_achat.php");
    exit;
?>