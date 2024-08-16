<?php
session_start();
if($_SESSION["acces"]!=true){
    header("location:authentification.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../sideutility/css/style.css">
    <!-- <link rel="stylesheet" href="../buttonautre/css/style.css"> -->
    <title>Facturation</title>

</head>
<style>
  *{
    
  }
</style>
<body class="d-flex">
<div class="wrapper d-flex align-items-stretch">
    <?php
    include('sidebar.php');
    ?>


    <!-- Page Content  -->
    <div id="content" class="p-3 me-3">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="icon icon-reorder"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon icon-reorder"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <header class="ms-5">
              <h3 class="text-dark fw-bolder">Facturation</h3></header>
            <ul class="nav navbar-nav ml-auto">
              
              <li class="nav-item">
                <a class="nav-link" href="#">Utilisateur</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      
      <div class="facture me-2  w-100 ">
        
        <div class="col-md-12 form-group d-flex w-100 justify-content-end  position-relative top-0 start-0 shadow-lg p-2  rounded" style="">
       
               <form action="createpdf.php" method="post" class="me-5">
                    <input type="hidden" name="numfact">
                    <input type="hidden" name="idcli" value="<?php echo str_replace("C","",$_POST['idcli']);?>">
                    <input type="hidden" name="date" value="<?php if(isset($_POST['date'])){echo $_POST['date'];}?>">
                    <button type="submit" class="btn btn-primary btn-block btn-round"><i class="icon-print text-white me-2"></i>Imprimer</button>
                    
                </form>
                <form action="" method="post" class="w-50 d-flex " >
                  
                    <select name="idcli" id="idcli" class="form-select form-select-sm  selectclient" style="" aria-label=".form-select-lg example">
                                <?php
                                require_once('connexion.php');
                                $query = "SELECT  idcli,nom FROM client";
                                $resultat = mysqli_query($connexion, $query);
                                while ($rows = mysqli_fetch_assoc($resultat)) {
                                    echo " <option value='$rows[idcli]'>" . "C".$rows['idcli']."-".$rows['nom']. "</option>";
                                }

                                ?>

                            </select>
                        
                        
                        <input type="date" name="date" id="" class="w-50 ms-2 " value="<?php if(isset($_POST['date'])){echo $_POST['date'];}?>" required>
                        
                        <button type="submit" name="submit"  class="btn btn-dark btnsubmit"><i class="icon-search"></i></button>
                        
                        
                    
                </form>
                
            </div>
        <br>

        

        <table class="table  table-striped table-hover shadow-lg px-2" style="width:100%;">
            <thead class="bg-dark text-warning">
                <tr>
                            <th>N°</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>contact</th>
                            <th>Voiture</th>
                            <th>Quantite</th>
                            <th>PU</th>
                            <th>Total</th>
                </tr>
            </thead>
            <tbody>
            <?php

            require_once('connexion.php');
            $idcli = "";
            $date = "";

            $messageErreur = "";
            $messagesucces = "";
            
               
            
                if(isset($_POST['submit'])){
                    
                    $idcli = str_replace("C","",$_POST['idcli']);
                    $date = $_POST['date'];
                    $idcli=str_replace("$rows[nom]","",$idcli);
                 
                    include('../crud/affiche_facture.php');
                   
                    
                }
                
            


               

                ?>
            </tbody>
        </table>


        
    </div>
    </div>
  </div>
   
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src=" ../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../js/sidebars.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../sideutility/js/popper.js"></script>
  <script src="../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="../sideutility/js/main.js"></script>
 
    <script>
    $(document).ready(function(){
        $('.selectclient').on('selected',function(){
            $id =$('#idcli').val();
        });
    $('.btnsubmit').on('click',function(){
        
        $('#idcli').val($id);
       
    });
    


});
</script>

</body>

</html>