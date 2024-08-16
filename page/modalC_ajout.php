<?php
session_start();
if($_SESSION["acces"]!=true){
    header("location:authentification.php");
    exit();
}

?>


<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="px-4">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><img src="../image/login.gif" alt="" style="width:100px; height:50px;">Ajout client</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../crud/ajoutClient.php">
                            <select name="" id="client" hidden>
                            <?php
                                        require_once('connexion.php');
                                        $query = "SELECT nom FROM client";
                                        $resultat = mysqli_query($connexion, $query);
                                         while ($rows = mysqli_fetch_assoc($resultat)) {
                                          echo " <option value='$rows[nom]'>".$rows['nom']. "</option>";
                                        }

                                    ?>
                            </select>
                            <select name="" id="contact" hidden>
                            <?php
                                        require_once('connexion.php');
                                        $query = "SELECT contact FROM client";
                                        $resultat = mysqli_query($connexion, $query);
                                         while ($rows = mysqli_fetch_assoc($resultat)) {
                                          echo " <option value='$rows[contact]'>".$rows['contact']. "</option>";
                                        }

                                    ?>
                            </select>
                            <div class="mb-3">
                                <label for="nomclient" class="form-label">Nom</label>
                                <input type="text" name="nom" onkeyup="verifvaluenom(this.value);" class="form-control" id="nomclient" aria-describedby="textHelp" required>

                            </div>
                            <div class="mb-3">
                                <label for=" contactclient" class="form-label">Contact</label>
                                <input type="text" name="contact" onkeyup="verifvalue(this.value);" class="form-control" id="contactclient" required>
                            </div>


                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-dark">Valider</button>
                                <!-- <input type="submit" value="Valider" name="btn-ajouter" class="btn btn-dark"> -->
                                <input type="reset" value="annuler" class="btn btn-warning">
                                
                            </div>

                        </form>
                        
                    </div>

                </div>
            </div>
        </div>
        <script src="../js/jquery-3.6.0.min.js"></script>

        <script>
            var value;
            let valuenom;
            let regExp=/\./;
            let regExpC = /[0-9]/;

          function  verifvaluenom(valuenom){
            if(regExp.test(value)){
                    alert("Nom ne doit pas contenir un point");
                }
                if(regExpC.test(value)){
                    alert("Nom ne doit pas contenir un chiffre");
                }
            }
         function   verifvalue(value){
            let client = document.getElementById('client');
            let contact = document.getElementById('contact');
            let nom = document.getElementById('nomclient').value;
            var optiontC= contact.options;
            var options = client.options;
            console.log(nom);
            for (var i = 0; i < options.length; i++) {
                if(options[i].value === nom){
                    if ( optiontC[i].value === value)  {
                     alert("client existe deja");
                    break;
                    }
                
                }
        }
     
               
                
            }

        </script>

           
                                 