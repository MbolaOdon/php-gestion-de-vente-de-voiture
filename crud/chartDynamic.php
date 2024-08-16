<?php

    header('Content-Type: application/json');


    
    require('../page/connexion.php');
if(isset($_POST['date1']) && isset($_POST['date2'])){
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];

}




    $sqlQuery = "SELECT  CASE MONTH(dateachat)
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
    ELSE 'Décembre' END as moisd, SUM(prix * qte) as nombre_recettesd FROM achat 
            INNER JOIN voiture ON achat.idvoit = voiture.idvoit   WHERE dateachat BETWEEN MONTH($date1) AND MONTH($date2) GROUP BY MONTH(dateachat)
            ORDER BY dateachat ASC ";


    $resultd = mysqli_query($connexion,$sqlQuery);


    $data1 = [];


    foreach ($resultd as $rowd) {

        $data1[] = $rowd;

    }

    
     mysqli_close($connexion);


    echo json_encode($data1);

    header('location:../page/statistique.php');

    

?>