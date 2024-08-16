<?php 

function listachat()
{

    include('../page/connexion.php');
    $query = "SELECT * FROM achat";
    $resultat = mysqli_query($connexion, $query);
                    

                    $num = mysqli_num_rows($resultat);
                    $numberpages = 5;
                    $totalpage = ceil($num/$numberpages);

                    //creer button pagination
                    for($page=1;$page<=$totalpage;$page++){
                        echo ' <button class="btn btn-dark  mx-1">
                            <a href ="affichage_achat.php?page='.$page.'" class="text-warning">'.$page.'</a></button>
                        </button> ';
                    }
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                        
                    }
                    else{
                        $page=1;
                    }

                        $startinglimit=($page-1)*$numberpages;

                        
                        $query = "SELECT  * FROM achat LIMIT ".$startinglimit.','.$numberpages;
                        $resultat = mysqli_query ($connexion,$query);
                       

                    while ($rows=mysqli_fetch_assoc($resultat) ) {
                        
                        echo "
                            <tr>
                                <td>A$rows[numAchat]</td>
                                <td>C$rows[idcli]</td>
                                <td>V$rows[idvoit]</td>
                                <td>$rows[dateachat]</td>
                                <td>$rows[qte]</td>
                                <td>
                                    <a href='' data-bs-toggle='modal'  class='btn btn-warning btn-sm editebtn'><i class='icon-pencil''></i></a>
                                    <a href='' data-bs-toggle='modal' class='btn btn-danger text-white btn-sm deletebtn'><i class='icon-trash'></i></a>
                                </td>
                            </tr>";
                    }

                    mysqli_close($connexion);

}

function searchachat($value,$date1,$date2){
    include('../page/connexion.php');
        if(empty($date1) && empty($date2)){
            $idvalue=str_replace("V", "", $value);
            $idcli=str_replace("C", "", $value);

            $query = "SELECT  * FROM achat WHERE idvoit LIKE '%$idvalue%' OR idcli LIKE '%$idcli%'";
            $resultat = mysqli_query($connexion, $query);

            if (mysqli_num_rows($resultat)) {
                foreach ($resultat as $rows) {
                    echo "
                        <tr>
                            <td>V$rows[numAchat]</td>
                            <td>C$rows[idcli]</td>
                            <td>V$rows[idvoit]</td>
                            <td>$rows[dateachat]</td>
                            <td>$rows[qte]</td>
                            <td>
                            <a href='' data-bs-toggle='modal'  class='btn btn-warning btn-sm editebtn'><i class='icon-pencil''></i></a>
                            <a href='' data-bs-toggle='modal' class='btn btn-danger text-white btn-sm deletebtn'><i class='icon-trash'></i></a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr>
                            <td colspan='6'>Acun resultat</td>
                        </tr>";
            }
        }
        if(!empty($date1) && !empty($date2) && empty($value)){
            $idvalue=str_replace("V", "", $value);
            $idcli=str_replace("C", "", $value);

            $query = "SELECT  * FROM achat WHERE dateachat BETWEEN '$date1' AND '$date2' ORDER BY dateachat";
            $resultat = mysqli_query($connexion, $query);

            if (mysqli_num_rows($resultat)) {
                foreach ($resultat as $rows) {
                    echo "
                        <tr>
                            <td>V$rows[numAchat]</td>
                            <td>C$rows[idcli]</td>
                            <td>V$rows[idvoit]</td>
                            <td>$rows[dateachat]</td>
                            <td>$rows[qte]</td>
                            <td>
                            <a href='' data-bs-toggle='modal'  class='btn btn-warning btn-sm editebtn'><i class='icon-pencil''></i></a>
                            <a href='' data-bs-toggle='modal' class='btn btn-danger text-white btn-sm deletebtn'><i class='icon-trash'></i></a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr>
                            <td colspan='6'>Acun resultat</td>
                        </tr>";
            }
        }
        if(!empty($date1) && !empty($date2) && !empty($value)){
            $idvalue=str_replace("V", "", $value);
            $idcli=str_replace("C", "", $value);

            $query = "SELECT  * FROM achat WHERE (idcli LIKE  '%$idcli%' OR idvoit LIKE '%$idvalue%') AND dateachat BETWEEN '$date1' AND '$date2'   ORDER BY dateachat";
            $resultat = mysqli_query($connexion, $query);

            if (mysqli_num_rows($resultat)) {
                foreach ($resultat as $rows) {
                    echo "
                        <tr>
                            <td>V$rows[numAchat]</td>
                            <td>C$rows[idcli]</td>
                            <td>V$rows[idvoit]</td>
                            <td>$rows[dateachat]</td>
                            <td>$rows[qte]</td>
                            <td>
                            <a href='' data-bs-toggle='modal'  class='btn btn-warning btn-sm editebtn'><i class='icon-pencil''></i></a>
                            <a href='' data-bs-toggle='modal' class='btn btn-danger text-white btn-sm deletebtn'><i class='icon-trash'></i></a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr>
                            <td colspan='6'>Acun resultat</td>
                        </tr>";
            }
        }
        mysqli_close($connexion);
        
}

function recetteaccumuler()
{
    include('../page/connexion.php');
    $recetteqry = "SELECT SUM(voiture.prix * achat.qte) AS recette
    FROM voiture
    INNER JOIN achat ON voiture.idvoit = achat.idvoit";

    $resultat= mysqli_query($connexion,$recetteqry);
    
    while($rows = mysqli_fetch_assoc($resultat)){
        $recette=$rows['recette'];
    }
    echo  number_format($recette,0," "," ")." Ar";

}

function recetteSixDernmois(){
    require('../page/connexion.php');
    //  $query="SELECT v.design, v.prix FROM voiture v INNER JOIN achat a ON a.idvoit = v.idvoit 
    //   WHERE a.dateachat BETWEEN DATE_SUB(NOW(), INTERVAL 6 MONTH) AND NOW() GROUP BY v.design, v.prix";

    $query="SELECT  CASE MONTH(dateachat)
    WHEN 1 THEN 'Janvier'
    WHEN 2 THEN 'Février'
    WHEN 3 THEN 'Mars'
    WHEN 4 THEN 'Avril'
    WHEN 5 THEN 'Mai'
    WHEN 6 THEN 'Juin'
    WHEN 7 THEN 'Juillet'
    WHEN 8 THEN 'Août'
    WHEN 9 THEN 'Septembre'
    WHEN 10 THEN 'Octobre'
    WHEN 11 THEN 'Novembre'
    ELSE 'Décembre' END as mois, SUM(prix * qte) as nombre_recettes FROM achat,voiture
             WHERE achat.dateachat BETWEEN DATE_SUB(NOW(), INTERVAL 6 MONTH) AND NOW() GROUP BY MONTH(dateachat)
            ORDER BY dateachat ASC ";
    $totalrecette=0;
    $resultat= mysqli_query($connexion,$query);
    while($rows=mysqli_fetch_assoc($resultat)){
        
        $recette=number_format($rows['nombre_recettes'],0," "," ");
        $totalrecette=$totalrecette +$rows['nombre_recettes'];
        echo "
        <tr>
            <td>$rows[mois]</td>
            <td>$recette  Ar</td>
         </tr>
        ";
    }
    $recettet=number_format($totalrecette,0," "," ");
    echo"<tr>
    <td>TOTAL</td>
    <td>$recettet Ar</td>
 </tr>";
    mysqli_close($connexion);
}

?>

