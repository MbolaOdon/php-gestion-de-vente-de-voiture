
 <?php
            session_start();
            require_once('../page/connexion.php');
            
            // if($_SESSION["acces"]!=true){
            //     header("location:../page/authentification.php");
            //     exit();
            // }
        
        $query = "SELECT A.dateachat,C.nom,C.contact,V.design,A.qte,V.prix,V.prix*A.qte as total FROM achat A INNER JOIN client C ON C.idcli=A.idcli INNER JOIN voiture V ON A.idvoit = V.idvoit WHERE C.idcli = '$idcli' AND A.dateachat LIKE '%$date%' ";
        $resultat = mysqli_query($connexion, $query);

         if (mysqli_num_rows($resultat)) {
             foreach ($resultat as $rows) {
                 echo "
                 <tr>
                     <td>1</td>
                     <td>$rows[dateachat]</td>
                     <td>$rows[nom]</td>
                     <td>$rows[contact]</td>
                    <td>$rows[design]</td>
                     <td>$rows[qte]</td>
                     <td>$rows[prix]</td>
                     <td>$rows[total]</td>
                
            </tr>";
           }
         } else {
             echo "<tr>
                         <td colspan='8'>Aucun  resultat . Aucun achat n'a été effectuer</td>
                     </tr>";
         }
       
         mysqli_close($connexion);

        
       

 ?>

    