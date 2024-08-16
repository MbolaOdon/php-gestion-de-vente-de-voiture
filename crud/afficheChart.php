<?php

    header('Content-Type: application/json');


    
    require('../page/connexion.php');



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
    ELSE 'Décembre' END as mois, SUM(prix * qte) as nombre_recettes FROM achat 
            INNER JOIN voiture ON achat.idvoit = voiture.idvoit GROUP BY MONTH(dateachat)
            ORDER BY dateachat ASC LIMIT 6";


    $result = mysqli_query($connexion,$sqlQuery);


    $data = [];


    foreach ($result as $row) {

        $data[] = $row;

    }


     mysqli_close($connexion);


    echo json_encode($data);

?>