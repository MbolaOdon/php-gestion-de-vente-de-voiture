<?php
session_start();
require_once('../page/connexion.php');

// if($_SESSION["acces"]!=true){
//     header("location:../page/authentification.php");
//     exit();
// }

$id = "";
$nom = "";
$contact = "";

$messageErreur = "";
$messagesucces = "";


if(isset($_POST['idcli']) && isset($_POST['nom']) && isset($_POST['contact'])){
    $id = str_replace("C","",$_POST['idcli']);
    $nom = $_POST['nom'];
    $contact = $_POST['contact'];

    do {
        if (empty($nom) || empty($contact)) {
            $messageErreur = "Veillez remplir tous les champ";
            break;
        }

        $query = "UPDATE client SET nom='$nom',contact='$contact' WHERE idcli='$id'";
        $resultat = mysqli_query($connexion, $query);

        if (!$resultat) {
            $messageErreur = "invalide query";
            break;
        }

        $id = "";
        $nom = "";
        $contact = "";

        mysqli_close($connexion);
        $messagesucces = "Modification du client avec succès";
        header("location:../page/affichage_client.php");
    } while (true);

    mysqli_close($connexion);
}

    
?>
