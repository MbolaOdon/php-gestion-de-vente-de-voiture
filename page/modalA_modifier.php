<?php
session_start();
if ($_SESSION["acces"] != true) {
    header("location:authentification.php");
    exit();
}

?>

<div class="modal fade " id="modalemodifachat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="px-4">


    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modification d'achat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../crud/modifier_achat.php">
                    <input type="hidden" name="numAchat" id="numAchat" value="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Client</label>
                        <select name="idcli" id="idcli" class="form-select form-select-lg px-3 form-control" aria-label=".form-select-lg example">
                            <?php
                            require_once('connexion.php');
                            $query = "SELECT CONCAT('C',idcli)as idcli,nom FROM client";
                            $resultat = mysqli_query($connexion, $query);
                            while ($rows = mysqli_fetch_assoc($resultat)) {
                                echo " <option value='$rows[idcli]'>" . $rows['idcli'] . "      -" . $rows['nom'] . "</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Voiture</label>
                        <select name="idvoit" id="idvoit" onchange="getValue(this.value);" class="form-control form-select form-select-lg px-3 " aria-label=".form-select-lg example">
                            <?php

                            require_once('connexion.php');
                            $query = "SELECT CONCAT('V',idvoit)as idvoit,design FROM voiture";
                            $resultat = mysqli_query($connexion, $query);
                            while ($rows = mysqli_fetch_assoc($resultat)) {
                                echo " <option value='$rows[idvoit]'>" . $rows['idvoit'] . "     -" . $rows['design'] . "</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Date achat</label>
                        <input type="date" name="dateachat" value="" class="form-control" id="dateachat">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Quantité</label>
                        <input type="number" name="qte" value="" onkeyup="verifNombre(this.value);" class="form-control" id="qte">
                    </div>

                    <div class="modal-footer">
                        <input type="submit" value="Valider" name="btn-ajouter" class="btn btn-dark">
                        <button type="button" class="btn btn-warning">Annuler</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</div>

<script>
    var qte;
    var nbre;
    var nombre;

    function getValue(nbre) {
        nombre = nbre.replace(/.*-/, '');

        console.log(nombre);
    }

    function verifNombre(qte) {
        if (nombre.toString().length < qte.toString().length) {

            if (parseInt(nombre) < parseInt(qte)) {
                alert("Voiture insuffisante. Il rest" + " " + nombre);
                document.getElementById('btnvalider').disabled = true;
            } else {
                document.getElementById('btnvalider').disabled = false;
            }
        }

        if (nombre.toString().length == qte.toString().length) {
            if (parseInt(nombre) < parseInt(qte)) {
                alert("Voiture insuffisante. Il rest" + " " + nombre);
                document.getElementById('btnvalider').disabled = true;
            } else {
                document.getElementById('btnvalider').disabled = false;
            }
        }


    }
</script>