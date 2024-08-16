<?php
session_start();
if($_SESSION["acces"]!=true){
    header("location:authentification.php");
    exit();
}

?>

<div class="modal fade " id="modaldeleteachat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="px-4">

<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression achat</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="d-flex text-center container-fluid ps-5">
             <i class="icon icon-warning-sign text-danger text-center " style="font-size: 2rem;"></i>
            <h6 class="">Voulez vous vraiment supprimer ?<br>Cette action est irreversible</h6>
        </div>
        
        <div class="modal-body">
            <form method="post" action="../crud/supprimer_achat.php">
                    <input type='hidden' name='numAchat' value='' id='numAchat'>


                <div class="modal-footer">
                    <button type="submit" name="btn-ajouter" class="btn btn-danger">Supprimer<i class="ms-2 icon-remove-sign"></i></button>
                    <!-- <input type="submit" value="Supprimer" name="btn-ajouter" class="btn btn-danger"> -->
                    <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">
                        Annuler
                    </button>
                </div>

            </form>
            
            
        </div>

    </div>
</div>
</div>