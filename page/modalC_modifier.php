<?php
session_start();
include('connexion.php');
if($_SESSION["acces"]!=true){
    header("location:authentification.php");
    exit();
}

?>

<div class="modal fade " id="modalmodifclient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="px-4">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier client</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../crud/modifier_client.php">
                        <input type='hidden' name='idcli' value='' id='idcli'>
                    <div class="mb-3">
                        <label for="nomclient" class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" value="" id="nomclient" aria-describedby="textHelp">

                    </div>
                    <div class="mb-3">
                        <label for="contactclient" class="form-label">Contact</label>
                        <input type="text" name="contact" value="" class="form-control" id="contactclient">
                    </div>


                    <div class="modal-footer">
                        <input type="submit" value="Valider" name="btn-ajouter" class="btn btn-dark">
                        
                        <button type="reset" class="btn btn-warning" data-bs-dismiss="modal">
                            Annuler
                        </button>
                    </div>

                </form>
                
                
            </div>

        </div>
    </div>
</div>