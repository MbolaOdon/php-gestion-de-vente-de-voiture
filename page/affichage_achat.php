<?php
session_start();
include('connexion.php');
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
    <title>Achat</title>

</head>
<style>
  *{
    margin: 0;
    padding: 0;
    overflow-x: hidden;
  }
</style>

<body class="d-flex">
<div class="wrapper d-flex align-items-stretch">
    <?php
    include('sidebar.php');
    ?>


    <!-- Page Content  -->
    <div id="content" class="p-3 ">

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
              <h3 class="text-dark fw-bolder"><img src="../image/vendeur-image-animee-0047.gif"  alt="" style="height: 5rem;width:6rem;">Liste achat
</h3>
            </header>
            <ul class="nav navbar-nav ml-auto">
             
              
              <li class="nav-item">
                <a class="nav-link" href="#">Utilisateur</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      
      <div class="client container-fluid px-5">

                
             <form class="d-flex justify-content-end w-100 position-relative top-0 shadow-lg p-2  rounded" style="" role="search" method="get">
                
                <div class="d-flex justify-item-center">
                
                    <input type="date" name="date1" id="" class="form-control" value="<?php if (isset($_GET['date1'])) {echo $_GET['date1']; } ?>">
                    <input type="date" name="date2" class="form-control " value="<?php if (isset($_GET['date2'])) {echo $_GET['date2']; } ?>">
                    
                </div>
                <input class="form-control" style="width: 20rem;" type="search" value="<?php if (isset($_GET['searchvalue'])) {echo $_GET['searchvalue']; } ?>" name="searchvalue" placeholder="id ou nom" aria-label="Search">
                <button class="btn btn-dark" type="submit" name="btnsearch"><i class="icon icon-search"></i></button>
                <button class=" btn btn-dark ms-2" name="btnrefresh"><i class="icon icon-refresh"></i></button>
            </form>

            
        
        <br>

        <!-- Modal -->
        <?php
        include('modalA_ajout.php');
        ?>

        <table class="table  table-striped table-hover shadow-lg px-2" style="width:100%;">
            <thead class="bg-dark text-warning">
                <tr>
                    <th>Num Achat</th>
                    <th>ID Client</th>
                    <th>ID Voiture</th>
                    <th>Date Achat</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require_once('connexion.php');
                include('../crud/affiche_achat.php');
                if (isset($_GET['btnsearch'])) {
                    $value = $_GET['searchvalue'];
                    $date1=$_GET['date1'];
                    $date2=$_GET['date2'];

                    searchachat($value,$date1,$date2);
                } else if (isset($_GET['btnrefresh']) || !isset($_GET['btnsearch'])) {
                    listachat();
                } else {
                    listachat();
                }


                include('modalA_modifier.php');
                include('modalA_supprimer.php');


                ?>

            </tbody>
        </table>


        <button type="button" class="btn btn-dark me-5" data-bs-toggle="modal" data-bs-target="#exampleModalA">
                    <i class="icon icon-plus"></i> Nouveau achat
        </button>
    </div>
    </div>
  </div>
   

    
    

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src=" ../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../js/sidebars.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../sideutility/js/main.js"></script>
 

    <script>
        $(document).ready(function() {
            $('.editebtn').on('click', function() {
                $("#modalemodifachat").modal('show');


                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#modalemodifachat #numAchat').val(data[0]);
                $('#modalemodifachat #idcli').val(data[1]);
                $('#modalemodifachat #idvoit').val(data[2]);
                $('#modalemodifachat #dateachat').val(data[3]);
                $('#modalemodifachat #qte').val(data[4]);

            });



        });

        $(document).ready(function() {
            $('.deletebtn').on('click', function() {
                $("#modaldeleteachat").modal('show');


                $trs = $(this).closest('tr');
                var datas = $trs.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(datas);

                $('#modaldeleteachat #numAchat').val(datas[0]);


            });

        });
    </script>
</body>

</html>