
<div class="modal fade " id="modalmodifvoiture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="px-4">
    
<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier voiture</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../crud/modifier_voiture.php">
                    <input type="hidden" class="form-control" id="idvoit" name="idvoit" value="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Designation</label>
                        <input type="text" name="design" class="form-control" value="" id="design" aria-describedby="textHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix unitaire(Ar)</label>
                        <input type="text" name="prix" class="form-control" value="" id="prix">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="" id="nombre">
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
