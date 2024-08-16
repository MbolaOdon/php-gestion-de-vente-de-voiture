<?php
session_start();
require_once('../page/connexion.php');

if($_SESSION["acces"]!=true){
    header("location:../page/authentification.php");
    exit();
}

$id = "";
$idcli = "";
$idvoit = "";
$dateachat = "";
$quantite = "";

$messageErreur = "";
$messagesucces = "";



if (isset($_POST['numAchat']) && isset($_POST['idcli']) && isset($_POST['idvoit']) && isset($_POST['dateachat']) && isset($_POST['qte'])) {

    if (!isset($_POST['numAchat'])) {
        header("location:../page/affichage_achat.php");
        exit();
    }
     
    $id =str_replace("A","",$_POST['numAchat']) ;
    $idcli = str_replace("C", "", $_POST['idcli']);
    $idvoit = preg_replace('/-.*/', '',$_POST['idvoit'] );
    $idvoit = str_replace("V", "", $_POST['idvoit']);
    $dateachat = $_POST['dateachat'];
    $quantite = $_POST['qte'];
    
    do {
        
        if ( empty($quantite) || empty($idcli)|| empty($idvoit) || empty($dateachat) || empty($id) ) {
            $messageErreur = "Veillez remplir tous les champ";
            break;
        }
        
    			$sqlselect= "SELECT nombre FROM voiture WHERE idvoit='$idvoit'";
        		$rsltselect= mysqli_query($connexion,$sqlselect);
        		$nombre=mysqli_fetch_assoc($rsltselect);
        		 if( $nombre['nombre']< $quantite ){
           			 $messageErreur = "Voiture insuffisante il reste $quantite";
           			 
            		break;
        
        		}else{
                $selectqry= "SELECT qte FROM achat WHERE numAchat= $id";
                $resutlselect=mysqli_query($connexion, $selectqry);
            
                while( $ligne = mysqli_fetch_assoc($resutlselect)){
                    $qte=$ligne['qte'];
                }

                $query = "UPDATE achat SET idcli='$idcli',idvoit='$idvoit',dateachat='$dateachat',qte='$quantite' WHERE numAchat='$id'";
                $updatevoitqry= "UPDATE voiture SET nombre=nombre+$qte-$quantite WHERE idvoit='$idvoit'" ;
                mysqli_query($connexion, $query);mysqli_query($connexion,$updatevoitqry);
                
                

                $id = "";
                $idcli = "";
                $idvoit = "";
                $dateachat = "";
                $quantite = "";

                $messagesucces = "Modification d'achat avec succès";
               
        
        
                header("location:../page/affichage_achat.php");
                }
    } while (true);
    mysqli_close($connexion);
}
?>
