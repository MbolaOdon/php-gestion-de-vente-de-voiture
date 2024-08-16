<?php
session_start();

if ($_SESSION["acces"] != true) {
  header("location:authentification.php");
  exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Car Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  

  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bootstrap-5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../sideutility/css/style.css">
  <link rel="stylesheet" href="../buttonautre/css/style.css">
  <link rel="stylesheet" href="../buttondashboard/css/style.css">
  <link rel="stylesheet" href="../buttondashboard/css/ionicons.min.css">
</head>

<style>
  * {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
  }
</style>

<body class="">

  <div class="wrapper d-flex align-items-stretch">
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
          <h5 class="ms-5 fw-bold text-center">Tableau de bord</h5>
            <ul class="nav navbar-nav ml-auto">

              
              <li class="nav-item">
                <a class="nav-link" href="#">Utilisateur</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    
      <div class=" w-100 d-flex flex-wrap ">
            <div class="d-flex h-50 mx-2 my-5 bg-white shadow bg-body-tertiary rounded">
              <div class="bg-warning text-white p-4"><i class="icon-group fw-bold " style="font-size:2rem;"></i></div>
              <div class="p-4">
                <p class="fs-5"><?php include('../crud/affiche_client.php') ;
                      totalclient();
                ?></p>
                
                <h4 class="fw-bold">Total client</h4>
              </div>
            </div>
            
            <div class="d-flex mx-2 my-5  h-50 bg-white shadow bg-body-tertiary rounded">
              <div class="bg-warning text-white p-4"><i class="icon-tags fw-bold " style="font-size: 2rem;"></i></div>
                <div class="p-4">
                  <p class="fs-5">
                  <?php include('../crud/affiche_achat.php') ;
                        recetteaccumuler();
                  ?>
                  </p>
                  
                  <h4 class="fw-bold">Recette total</h4>
                </div>
            </div>

            <div class="d-flex mx-2 my-5  h-50 bg-white shadow  rounded">
              <div class="bg-dark text-white p-4"><i class="icon-tags fw-bold" style="font-size: 2rem;"></i></div>
                <div class="p-4 w-100">
                  <p class="fs-5 ">
                    <?php  
                          meilleurClient();
                    ?>
                  </p>
                  
                  <h4 class="fw-bold">Meilleur client</h4>
                </div>
            </div>
            <div class="d-flex mx-2 my-5  h-50 bg-white shadow  rounded">
              <div class="bg-dark text-white p-4"><i class="icon-tags fw-bold" style="font-size: 2rem;"></i></div>
                <div class="p-4 w-100">
                  <p class="fs-5 ">
                    <?php  
                          include('../crud/affiche_voiture.php');
                          meilleurClient();
                    ?>
                  </p>
                  
                  <h4 class="fw-bold">Meilleur client</h4>
                </div>
            </div>
      </div>
      </div>

      
  </div>
  

   <script src="../sideutility/js/jquery.min.js"></script>
   <script src="../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
   <script src="../sideutility/js/popper.js"></script>
  <script src="../sideutility/js/main.js"></script>
  <!--
  
  <script src="../buttonautre/js/main.js"></script>
  <script src="../buttondashboard/js/main.js"></script> -->
</body>

</html>