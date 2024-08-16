<?php



require_once('../page/connexion.php');

$idcli = "";
$idvoit = "";
$dateachat = "";
$quantite = "";

$messageErreur = "";
$messagesucces = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idcli = str_replace('C', '', $_POST['idcli']);
    $idvoit = preg_replace('/-.*/', '',$_POST['idvoit'] );
    $idvoit = str_replace('V', '', $idvoit);
    $dateachat = $_POST['date'];
    $quantite = $_POST['qte'];
  


    do {

        if (empty($dateachat) || empty($quantite)) {
            $messageErreur = "Veillez remplir tous les champ";
            break;
        }

        $sqlselect= "SELECT nombre FROM voiture WHERE idvoit='$idvoit'";
        $rsltselect= mysqli_query($connexion,$sqlselect);
        $nombre=mysqli_fetch_assoc($rsltselect);
        $sql = "INSERT INTO achat (idcli,idvoit,dateachat,qte)" . "VALUES('$idcli','$idvoit','$dateachat','$quantite')";
        $sqlupdate= "UPDATE voiture SET nombre=nombre-'$quantite' WHERE  idvoit='$idvoit'";
        
        
        if( $nombre['nombre']< $quantite ){
            $messageErreur = "Voiture insuffisante il reste $quantite";
            break;
        
        }
        else{
            $resultat = mysqli_query($connexion, $sql);
            $resultat2= mysqli_query($connexion,$sqlupdate);
            $resultat3 = mysqli_query($connexion, $query3);
            
        

                // if (!$resultat) {
                //     $messageErreur = "invalide query";
                //     break;
                // }

                $idcli = "";
                $idvoit = "";
                $dateachat = "";
                $quantite = "";

            
                
             }
             ob_start();
                header('location:../page/affichage_achat.php');
                ob_end_flush();
             
    } while (false);
    mysqli_close($connexion);
}


?>
