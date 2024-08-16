<?php
session_start();
require_once('../page/connexion.php');

if($_SESSION["acces"]!=true){
    header("location:../page/authentification.php");
    exit();
}

    if(isset($_POST['idcli'])){
        $id =str_replace("C","",$_POST['idcli']) ;

        require_once('../page/connexion.php');
        $query="SELECT idcli FROM achat WHERE idcli='$id'";
        $res=mysqli_query($connexion,$query);
        if(mysqli_num_rows($res)>0){
            $query = "DELETE client,achat FROM client INNER JOIN achat ON 
            achat.idcli=client.idcli WHERE  client.idcli='$id'";
            $resultat= mysqli_query($connexion,$query);
        }
        else{
            $query = "DELETE  FROM client  WHERE  idcli='$id'";
            $resultat= mysqli_query($connexion,$query);
        }

        
        
    }
    mysqli_close($connexion);
     header("location:../page/affichage_client.php");
    exit;
?>