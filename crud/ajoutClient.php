<?php



require_once('../page/connexion.php');

$nom = "";
$contact = "";

$messageErreur = "";
$messagesucces = "";

extract($_POST);
if(isset($_POST['contact']) && isset($_POST['nom'])){
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $contact = $_POST['contact'];
    echo $contact;

    do {

        if (empty($nom) || empty($contact)) {
            echo" <script>alert(Client existe déja)</script>";
            $messageErreur = "Veillez remplir tous les champ";
            break;
        } 
        else {
            
            $query = "SELECT * FROM client WHERE nom='$nom' AND contact='$contact'";
            $resultat = mysqli_query($connexion, $query);

            if($rows=mysqli_fetch_assoc($resultat)){
                echo" <script>alert(Client existe déja)</script>";
                $messageErreur="Client existe déja";
                break;
            }
            else{
                $query = "INSERT INTO client (nom,contact)" . "VALUES('$nom','$contact')";
                $resultat = mysqli_query($connexion, $query);
    
                if (!$resultat) {
                    $messageErreur = "invalide query";
                    break;
                }
                
                $messagesucces = " $nom Ajouter avec succès";
    
                $nom = "";
                $contact = "";

                header('location:../page/affichage_client.php');
               

            }
            
           
        }
    } while (false);
    mysqli_close($connexion);
}
?>
