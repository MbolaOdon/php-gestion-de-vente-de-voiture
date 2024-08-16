<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="px-4">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout client</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../crud/ajoutVoiture.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Designation</label>
                                <input type="text" name="design" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" required> 

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Prix unitaire(Ar)</label>
                                <input type="text" name="prix" class="form-control" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="exampleInputPassword1" required>
                            </div>
                            


                            <div class="modal-footer">
                                <input type="submit" value="Valider" name="btn-ajouter" class="btn btn-dark">
                                <input type="reset" value="annuler" class="btn btn-warning">
                            </div>

                        </form>
                        <?php
                        include('../crud/ajoutClient.php');
                        if (!empty($messageErreur)) {
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <p>$messageErreur</p>
                                <button type='button' class='btn-close' data-bs-dismissble='alert' arial-label='Close'></button>
                            </div>    
                        ";
                        }

                        if (!empty($messagesucces)) {

                            echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <p>$messagesucces</p>
                            <button type='button' class='btn-close' data-bs-dismissble='alert' arial-label='Close'></button>
                        </div>    
                    ";
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>