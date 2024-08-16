<?php
    session_start();
    require_once('../page/connexion.php');
    
    if($_SESSION["acces"]!=true){
        header("location:../page/authentification.php");
        exit();
    }
    if(isset($_POST['idvoit'])){
        $id =str_replace("V","",$_POST['idvoit']) ;
        require_once('../page/connexion.php');
        $query="SELECT idvoit FROM achat WHERE idvoit='$id'";
        $res=mysqli_query($connexion,$query);
        if(mysqli_num_rows($res)>0){
            $query = "DELETE voiture,achat FROM voiture INNER JOIN achat ON achat.idvoit=voiture.idvoit WHERE voiture.idvoit='$id'";
        $resultat= mysqli_query($connexion,$query);
        }
        else{
            $query = "DELETE  FROM voiture  WHERE  idvoit='$id'";
            $resultat= mysqli_query($connexion,$query);
        }

        
    }

    mysqli_close($connexion);
    header("location:../page/affichage_voiture.php");
    exit;
?>