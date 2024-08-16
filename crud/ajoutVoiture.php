<?php

$design = "";
$prix = "";
$nombre = "";

$messageErreur = "";
$messagesucces = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $design = $_POST['design'];
    $prix = $_POST['prix'];
    $nombre = $_POST['nombre'];

    do {

        if ( empty($design) || empty($prix) || empty($nombre)) {
            $messageErreur = "Veillez remplir tous les champ";
            break;
        }

        $query = "INSERT INTO voiture (design,prix,nombre)" . "VALUES('$design','$prix','$nombre')";
        $resultat = mysqli_query($connexion, $query);

        if (!$resultat) {
            $messageErreur = "invalide query";
            
            break;
        }

        $design = "";
        $prix = "";
        $nombre = "";

        $messagesucces = "Ajout de client avec succès";
        header('location:../page/affichage_voiture.php');
    } while (false);

    mysqli_close($connexion);
}

?>
