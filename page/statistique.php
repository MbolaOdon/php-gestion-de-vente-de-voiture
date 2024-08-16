<?php
session_start();

if ($_SESSION["acces"] != true) {
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
    <link rel="stylesheet" href="../css/sidebars.css">
    <link rel="stylesheet" href="../sideutility/css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Statistique</title>
</head>

<body class="d-flex">

    <?php 
        include('sidebar.php'); 

        
    ?>
    <div id="content" class="p-3">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="icon icon-reorder"></i>
      <span class="sr-only">Gestion de vente de voiture</span>
    </button>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="icon icon-reorder"></i>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <h5 class="ms-5 fw-bold text-center">Rapport</h5>
      <ul class="nav navbar-nav ml-auto">

        
        <li class="nav-item">
          <a class="nav-link" href="#">Utilisateur</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class=" w-100 d-flex">
    <div class="table mx-4 my-2 w-100 px-5 py-3">
    <div class="container-fluid  mini-chart">
               
        <div class="">
                
            

        </div>
        <div class="container-fluid  mini-chart ">


            <!-- <div class="col-md-12 px-3  table-responsive h-75 me-3 shadow bg-body-tertiary rounded" style="width: 80%;height:50rem;">
            <form action="../crud/chartDynamic.php" method="post" class="d-flex mx-5 ">
                   
                    <div class=" d-flex" >
                        <input type="date" name="date1" id="" class="form-control">
                        <input type="date" name="date2" id="" class="form-control">
                    </div>
                    <input type="submit" value="Voir" class="btn btn-dark px-2">
                    
                    
                </form>
                <canvas id="bargraphDynamic"></canvas>
              

            </div> -->
            <br>
            <div class="col-md-6 px-5   h-25 shadow bg-body-tertiary rounded" style="width: 80%;height:50rem;">
                <h4>Recette de ces six dernier mois</h4>
                <canvas id="bargraph"></canvas>
                <?php include('createChart.php'); ?>

            </div>
        </div>
        
    </div>
      

    </div>
</div>


    

   
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src=" ../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../js/sidebars.js"></script>
    <script src="../sideutility/js/popper.js"></script>
  <script src="../sideutility/js/main.js"></script>
</body>

</html>



