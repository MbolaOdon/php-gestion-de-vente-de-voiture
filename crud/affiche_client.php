<?php

function listclient()
{
    include('../page/connexion.php');
    $query = "SELECT CONCAT('C',idcli)as idcli,nom,contact FROM client";
    $resultat = mysqli_query($connexion, $query);


    $num = mysqli_num_rows($resultat);
    $numberpages = 5;
    $totalpage = ceil($num / $numberpages);

    //creer button pagination
    for ($page = 1; $page <= $totalpage; $page++) {
        echo ' <button class="btn btn-dark  mx-1">
                            <a href ="affichage_client.php?page=' . $page . '" class="text-warning">' . $page . '</a></button>
                        </button> ';
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $startinglimit = ($page - 1) * $numberpages;


    $query = "SELECT  idcli,nom,contact FROM client LIMIT " . $startinglimit . ',' . $numberpages;
    $resultat = mysqli_query($connexion, $query);

        if($resultat){
            foreach($resultat as $rows){
                echo "
                <tr>
                    <td>C$rows[idcli]</td>
                    <td>$rows[nom]</td>
                    <td>$rows[contact]</td>
                    <td>
                        <a href='' data-bs-toggle='modal'  class='btn btn-warning btn-sm editbnt'><i class='icon-pencil''></i></a>
                        <a href='' data-bs-toggle='modal' class='btn btn-danger text-white btn-sm deletebtn'><i class='icon-trash'></i></a>
                    </td>
                </tr>";
            }
        }

    // while ($rows = mysqli_fetch_assoc($resultat)) {
        mysqli_close($connexion);
       
    // }
}

function searchclient($value){

    include('../page/connexion.php');
    $query = "SELECT CONCAT('C',idcli)as idcli,nom,contact FROM client WHERE nom LIKE '%$value%'";
    $resultat = mysqli_query($connexion, $query);

   


    $num = mysqli_num_rows($resultat);
    $numberpages = 5;
    $totalpage = ceil($num / $numberpages);

    //creer button pagination
    for ($page = 1; $page <= $totalpage; $page++) {
        echo ' <button class="btn btn-dark my-2 mx-1">
                            <a href ="affichage_client.php?page=' . $page . '" class="text-warning">' . $page . '</a></button>
                        </button> ';
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $startinglimit = ($page - 1) * $numberpages;


    $query = "SELECT  idcli,nom,contact FROM client WHERE nom LIKE '%$value%' LIMIT " . $startinglimit . ',' . $numberpages;
    $resultat = mysqli_query($connexion, $query);


    while ($rows = mysqli_fetch_assoc($resultat)) {

        echo "
                            <tr>
                                <td>C$rows[idcli]</td>
                                <td>$rows[nom]</td>
                                <td>$rows[contact]</td>
                                <td>
                                    <a href'' data-bs-toggle='modal'  class='btn btn-warning btn-sm editbnt'><i class='icon-pencil''></i></a>
                                    <a href'' data-bs-toggle='modal' class='btn btn-danger text-white btn-sm deletebtn'><i class='icon-trash'></i></a>
                                </td>
                            </tr>";
    }
    mysqli_close($connexion);
    
}

function totalclient(){
    include('../page/connexion.php');
    $totalquery="SELECT COUNT(*) as totalclient FROM client";
    $rslt=mysqli_query($connexion,$totalquery);
    while($rows=mysqli_fetch_assoc($rslt)){
        $totalcli=$rows['totalclient'];
    }
    echo $totalcli;
    mysqli_close($connexion);
}


function meilleurClient(){
    include('../page/connexion.php');
    $query="SELECT idcli
    FROM achat,voiture
    WHERE voiture.idvoit = achat.idvoit 
    GROUP BY idcli
    HAVING SUM(prix*qte) >= ALL
    (SELECT SUM(prix*qte)
    FROM achat,voiture
    WHERE voiture.idvoit = achat.idvoit 
    GROUP BY idcli)";

    $rslt=mysqli_query($connexion,$query);
    while($rows=mysqli_fetch_assoc($rslt)){
        $meilleurcli=$rows['idcli'];
    }

    $query="SELECT nom FROM client WHERE idcli='$meilleurcli'";
    $rslt=mysqli_query($connexion,$query);
    while($rows=mysqli_fetch_assoc($rslt)){
        $nommeilleurcli=$rows['nom'];
    }
    echo $nommeilleurcli;


    mysqli_close($connexion);
}


?>
