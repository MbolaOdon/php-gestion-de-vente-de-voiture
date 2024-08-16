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
    <link rel="stylesheet" href="../sideutility/css/style.css">
    <title>Rapport</title>
</head>

<body class="d-flex">

    <?php 
        include('sidebar.php');   
    ?>
    <!-- Page Content  -->
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
        <div class="recette">
            
            <table  class=" table table-striped table-hover caption-top w-50">
                    <caption class="text-dark fw-bold">Recette de ces six dernier mois</caption>
                    <thead class="bg-dark text-warning">
                        <th class>Mois</th>
                        <th>Recette</th>
                    </thead>
                    <tbody>
                        <?php 
                            include('../crud/affiche_achat.php');
                            recetteSixDernmois();
                        ?>
                    </tbody>
                </table>
        </div>
            

    </div>
      </div>
    
    
   
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src=" ../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../js/sidebars.js"></script>
    <script src="../sideutility/js/jquery.min.js"></script>
   <script src="../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
   <script src="../sideutility/js/popper.js"></script>
  <script src="../sideutility/js/main.js"></script>
</body>

</html>



