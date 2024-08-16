<?php
session_start();
require_once('../page/connexion.php');

// if($_SESSION["acces"]!=true){
//     header("location:../page/authentification.php");
//     exit();
// }


$idvoit = "";
$design = "";
$prix = "";
$nombre = "";

$messageErreur = "";
$messagesucces = "";

if (isset($_POST['idvoit']) && isset($_POST['design']) && isset($_POST['prix']) && isset($_POST['nombre'])) {

   
   
    if (!isset($_POST['idvoit'])) {
        header("location:../page/affichage_voiture.php");
        exit;
    }
   

    $idvoit = str_replace("V","",$_POST['idvoit']);
    $design = $_POST['design'];
    $prix = str_replace(" ","",$_POST['prix']);
    $nombre = $_POST['nombre'];
    

    do {
        if ( empty($design) || empty($prix) || empty($nombre)) {
            $messageErreur = "Veillez remplir tous les champ";
            break;
        }
        
            $queryy = "UPDATE voiture SET design='$design',prix='$prix',nombre='$nombre' WHERE idvoit='$idvoit'";
            $resulta = mysqli_query($connexion, $queryy);
            echo $idvoit;
            echo $prix;
        
            if (!$resulta) {
                $messageErreur = "invalide query";
                break;
            }
    
            $idvoit = "";
            $design = "";
            $prix = "";
            $nombre = "";
    
            $messagesucces = "Modification du client avec succès";
            header("Location:../page/affichage_voiture.php");
        
        
    } while (true);

    mysqli_close($connexion);
} 
 

?>