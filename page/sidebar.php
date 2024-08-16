<nav id="sidebar">
				<div class="p-4 pt-5">
		  		        <a href="#" class="img logo w-100 mb-5" style="background-image: url(../image/voiture-image-animee-0017.gif);"></a>
	                <ul class="list-unstyled components mb-5">
	                    <li class="active">
	                        <a href="dashboard.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="icon-dashboard"></i>
                    Tableau de bord</a>
	            
	          </li>
	          <li>
	              <a href="affichage_client.php"><i class="icon-user"></i>Client</a>
	          </li>
              <li>
	              <a href="affichage_voiture.php"><i class="icon-truck"></i>Voiture</a>
	          </li>
              <li>
	              <a href="affichage_achat.php"><i class="icon-shopping-cart"></i>Achat</a>
	          </li>
              <li>
	              <a href="facturation.php"><i class="icon-ticket"></i>Facturation</a>
	          </li>
	          <li>
              <a href="rapport.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="icon-book"></i>Rapport</a>
              
	          </li>
	          
              <li>
                    <a href="statistique.php"><i class="icon-bar-chart"></i> Statistique</a>
                </li>
	          <li>
              <a href="#" class="btndeconnexion text-white nav-link"  href="" data-bs-toggle="modal" data-bs-target="#modaldeconnexion"><i class="icon-signout"></i> Déconnexion</a>
	          </li>
	        </ul>

	        <div class="modal fade " id="modaldeconnexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="px-4">
    
    <div class="modal-dialog bg-white">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h6 class="">Voulez vous vraiment déconnecter ?</h6>
                <div class="modal-body ms-5">
                    <a href="logout.php" class="btn btn-danger">Déconnexion</a>
                    <button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                    
                </div>
    
            </div>
        </div>
    </div>

	      </div>
    	</nav>

        <script src="../sideutility/js/jquery.min.js"></script>
  <script src="../sideutility/js/popper.js"></script>
  <script src="../bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="../sideutility/js/main.js"></script>
        <script>
$(document).ready(function(){
    $('.btndeconnexion').on('click',function(){
        $("#modaldeconnexion").modal('show');
    
       
    });
});
</script>