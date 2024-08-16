<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <title>Authentification</title>
    <style>
        body{
            background-image: url('../image/imagef/istockphoto-1388822365-2048x2048.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
    <script>

    </script>
</head>

<body>
    <nav class="navbar bg-body-tertiary bg-dark">
        <div class="container-fluid d-flex">
            <a class="navbar-brand ms-5 text-warning fw-bold" href="#">
                <img src=""  width="30" height="24" class="d-inline-block align-text-top">
                Car Shop
            </a>
            <button type="button" class="btn btn-warning text-white btn-rounded me-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="icon icon-unlock-alt"></i> Se connecter
            </button>
        </div>
        
    </nav>
    
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true" style=" max-width: 100% !important;">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <!-- <div class="modal-content">
                <div class="modal-header  w-100">
                    <h5 class="text-center">Authentification</h5>
                    
                </div>
                <div class="modal-body  mb-1">
                    <form method="POST" action="login.php" class="px-5">
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="psswd" class="form-control " id="exampleInputPassword1">
                        </div>
                        
                        <div class="text-center mt-4 ">
                            
                            <button type="submit"  name="boutonconnection" class="btn btn-dark "><i class="icon-signin me-2"></i>Connexion</button>
                            
                        </div>
                        
                    </form>
                </div>

            </div> -->
            <div class="container modal-content">
            <div class="row">
                <div class="col-lg-9 col-md-12 login-card">
                    <div class="row">
                        <div class="col-md-5 detail-part">
                            <!-- <h1>Awesome Login Page Design</h1>
                            <p>Please use your credentials to login.
                                If you are not a member, please register. </p> -->
                                <img src="../image/samuele-errico-piccarini-MyjVReZ5GLQ-unsplash.jpg" alt="" class="h-100 w-100">
                        </div>
                        <div class="col-md-7 logn-part">
                          <div class="row">
                              <div class="col-lg-10 col-md-12 mx-auto">
                                  <div class="logo-cover">
                                       <img src="" alt="">
                                   </div>
                                    <div class="form-cover">
                                     <form method="POST" action="login.php">
                                        <h6>Authentification</h6>
                                         <input placeholder="Entrer Email" type="email" class="form-control" name="email">
                                         <input Placeholder="Entrer PAssword" type="password" class="form-control" name="psswd">
                                         <div class="row form-footer">
                                             <!-- <div class="col-md-6 forget-paswd">
                                                 <a href="">Forget Password ?</a>    
                                             </div> -->
                                             <div class="col-lg-6 button-div">
                                                 <button class="btn btn-primary" type="submit"  name="boutonconnection"><i class="icon-signin me-2"></i></button>
                                             </div>
                                         </div>
                                     </form>
                                    </div>
                              </div>
                          </div>
                           
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>









    <script src=" ../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../buttonautre/js/popper.js"></script>
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
