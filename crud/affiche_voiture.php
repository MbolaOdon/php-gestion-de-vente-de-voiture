<?php 

function listvoiture(){
    include('../page/connexion.php');

    $query = "SELECT  idvoit,design,prix,nombre FROM voiture";
    $resultat = mysqli_query($connexion, $query);
    $num = mysqli_num_rows($resultat);
    $numberpages = 5;
    $totalpage = ceil($num / $numberpages);

    //creer button pagination
    for ($page = 1; $page <= $totalpage; $page++) {
        echo ' <button class="btn btn-dark  mx-1">
                    <a href ="../page/affichage_voiture.php?page=' . $page . '" class="text-warning">' . $page . '</a></button>
                </button> ';
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $startinglimit = ($page - 1) * $numberpages;
    $query = "SELECT * FROM voiture LIMIT " . $startinglimit . ',' . $numberpages;
    $resultat = mysqli_query($connexion, $query);


    while ($rows = mysqli_fetch_assoc($resultat)) {
        $prix=number_format($rows['prix'],0,""," ");
        echo "
                    <tr>
                        
                        <td>V$rows[idvoit]</td>
                        <td>$rows[design]</td>
                        <td>$prix</td>
                        <td>$rows[nombre]</td>
                        <td>
                            <a href=''  data-bs-toggle='modal' class='btn btn-warning btn-sm editebtn' data-bs-toggle='modal' ><i class='icon-pencil''></i></a>
                            <a href='' data-bs-toggle='modal' class='btn btn-danger text-white btn-sm deletebtn'><i class='icon-trash'></i></a>   
                        </td>
                    </tr>";
                    
                      
    }
    mysqli_close($connexion);
  
}

function searchvoiture($value){
    include('../page/connexion.php');
        
        $idvalue=str_replace("V", "", $value);

        $query = "SELECT  idvoit,design,prix,nombre FROM voiture WHERE idvoit LIKE '%$idvalue%' OR design LIKE '%$value%'";
        $resultat = mysqli_query($connexion, $query);

        if (mysqli_num_rows($resultat)) {
            foreach ($resultat as $rows) {
                $prix=number_format($rows['prix'],0,""," ");
                echo "
                    <tr>
                        
                        <td>V$rows[idvoit]</td>
                        <td>$rows[design]</td>
                        <td>$prix</td>
                        <td>$rows[nombre]</td>
                        <td>
                            <a href=''  data-bs-toggle='modal' class='btn btn-warning btn-sm editebtn' ><i class='icon-pencil'></i></a>
                            <a href='' data-bs-toggle='modal' class='btn btn-danger text-white btn-sm deletebtn'><i class='icon-trash'></i></a>   
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr>
                        <td colspan='6'>Acun resultat</td>
                    </tr>";
        }
        mysqli_close($connexion);
    }

    // function meilleurvoiture(){
    //     include('../page/connexion.php');
    // $query="SELECT idvoit
    // FROM achat,voiture
    // WHERE voiture.idvoit = achat.idvoit 
    // GROUP BY idvoit
    // HAVING SUM(prix*qte) >= ALL
    // (SELECT SUM(prix*qte)
    // FROM achat,voiture
    // WHERE voiture.idvoit = achat.idvoit 
    // GROUP BY idvoit )";

    // $rslt=mysqli_query($connexion,$query);
    // while($rows=mysqli_fetch_assoc($rslt)){
    //     $meilleurcli=$rows['idcli'];
    // }

    // $query="SELECT nom FROM client WHERE idcli='$meilleurcli'";
    // $rslt=mysqli_query($connexion,$query);
    // while($rows=mysqli_fetch_assoc($rslt)){
    //     $nommeilleurcli=$rows['nom'];
    // }
    // echo $nommeilleurcli;


    // mysqli_close($connexion);
    // }

?>

