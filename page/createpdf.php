
<?php
// Inclusion des librairies

include("../fpdf185/fpdf.php");



/**
 * Classe PDF hérite de fpdf, permet de générer des fichiers PDF
 */

class pdf extends FPDF{
	 
//En-tête de la facture
function hautDePage(){
	$idcli = $_POST['idcli'];
	$date = $_POST['date'];
	$position=0;
	$numfact=0;
	$nomclient="";
	$contact="";
	
	//Logo
	include('connexion.php');
	$sql="UPDATE numero SET num=num+1";
	mysqli_query($connexion, $sql);
	$sql_facture="SELECT num FROM numero ";
	$sql_result=mysqli_query($connexion,$sql_facture);
	while($row=mysqli_fetch_assoc($sql_result)){
		$numfact=$row['num'];
	}
	
	$query = "SELECT C.nom,C.contact FROM achat A INNER JOIN client C ON C.idcli=A.idcli INNER JOIN voiture V ON A.idvoit = V.idvoit WHERE C.idcli = '$idcli' AND A.dateachat ='$date' ";
	
   $resultat = mysqli_query($connexion, $query);
   
	while ($rows = mysqli_fetch_assoc($resultat)) {
		$contact=$rows['contact'];
		$nomclient=$rows['nom'];
		
		//0$prixTotalHorsTaxes+=20;
	}
	//Informations Facture
	$this->SetXY(80,30);
	$this->SetFillColor(0,0,0);
	$this->SetFont('Arial','B',15);
	
	$this->Cell(10,1,utf8_decode("FACTURE N°$numfact"),2,'B');
	$this->SetFont('Arial','',12);
	$this->SetXY(20,50);
	$this->MultiCell(130,5,"Date de facturation : ".date("m l Y")."\nNom du Client :  $nomclient",'','L',false);
	
	$this->SetXY(20,62);
	$this->Cell(10,1,utf8_decode("Contact   :  $contact"),2,'B');
	$this->SetTitle("");
	if($this->getY()>$position){
		$position=$this->getY();
	}
	$this->SetXY(10,$position+5);
}
 
//Préparation de la génération de la table
function tableArticles(){
	$idcli = $_POST['idcli'];
	$date = $_POST['date'];

	$position=0;
	$prixTotal=0;
	include('connexion.php');
	 
	 $query = "SELECT A.dateachat,C.nom,C.contact,V.design,A.qte,V.prix,V.prix*A.qte as total FROM achat A INNER JOIN client C ON C.idcli=A.idcli INNER JOIN voiture V ON A.idvoit = V.idvoit WHERE C.idcli = '$idcli' AND A.dateachat ='$date' ";
	

	$resultat = mysqli_query($connexion, $query);
	
	//Création des données qui seront contenues la table
	$datas = array();
	$totaux=0;
	while ($rows = mysqli_fetch_assoc($resultat)) {
		$datas[] = array("$rows[design]","$rows[qte]","$rows[prix]","$rows[total]");
		
	}
	$qry="SELECT SUM(V.prix*A.qte) as totaux FROM achat A INNER JOIN client C ON C.idcli=A.idcli INNER JOIN voiture V ON A.idvoit = V.idvoit WHERE C.idcli = '$idcli' AND A.dateachat ='$date' ";
	$result=mysqli_query($connexion, $qry);
	while($row = mysqli_fetch_assoc($result)){
		$totaux=$row['totaux'];
	}

	//Tableau contenant les titres des colonnes
	$header=array(utf8_decode('Désignation'),utf8_decode('Quantité'),utf8_decode('Prix unitaire'),utf8_decode('Total'));
	//Tableau contenant la largeur des colonnes
	$w=array(80,20,30,50);
	//Tableau contenant le centrage des colonnes
	$al=array('C','L','C','C','C');
 
	//Génération de la table à proprement dite
	$this->table($header,$w,$al,$datas);
 
	//On se positionne en dessous de la table pour écrire le total
	$this->SetY($this->GetY());
 
	$this->setX(110);
	$this->Cell(30,6,"Total ",1,0,'C');
	$this->Cell(50,6,$totaux,1,2,'C');
 
	$this->SetXY(68,$this->GetY()+ $pdf->LineHeight);
	$this->Cell(10,40,utf8_decode("Arrêté par la présente facture à la somme de $totaux .") ,2,'B');
 
}
 
//Pied de page
function Footer(){
	//Positionnement à 1,5 cm du bas
	$this->SetY(-15);
	//Police Arial italique 8
	$this->SetFont('Arial','I',8);
	//Numéro de page
	$this->Cell(0,4,'Page '.$this->PageNo().'/{nb}',0,2,'C');
	$this->MultiCell(0,4,"www.Crac-Design.com\n",0,'C',false);
}
 
 
//Impression de l'entête du tableau
function printTableHeader($header,$w){
	//Couleurs, épaisseur du trait et police grasse
	$this->SetFillColor(200,200,200);
	$this->SetTextColor(0);
	$this->SetDrawColor(0,0,0);
	$this->SetFont('Arial','B',9);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
	$this->Ln();
	//Restauration des couleurs et de la police pour les données du tableau
	$this->SetFillColor(245,245,245);
	$this->SetTextColor(0);
	$this->SetFont('Arial');
 
}
 
//Génération du tableau
// table(données de l'entête tableau, largeur des colonnes, alignement des colonnes, données)
function table($header,$w,$al,$datas){
	//Impression de l'entête tableau
	$this->SetLineWidth(.3);
	$this->printTableHeader($header,$w);
 
	$posStartX=$this->getX();	
	$posBeforeX=$posStartX;
 
	$posBeforeY=$this->getY();
	$posAfterY=$posBeforeY;
	$posStartY=$posBeforeY;
 
	//On parcours le tableau des données
	foreach($datas as $row){
		$posBeforeX=$posStartX;
		$posBeforeY=$posAfterY;
 
		//On vérifie qu'il n'y a pas débordement de page.
		$nb=0;
		for($i=0;$i<count($header);$i++){
			$nb=max($nb,$this->NbLines($w[$i],$row[$i]));
		}
		$h=6*$nb;
 
		//Effectue un saut de page si il y a débordement
		$resultat = $this->CheckPageBreak($h,$w,$header,$posStartX,$posStartY,$posAfterY);
		if($resultat>0){
			$posAfterY=$resultat;
			$posBeforeY=$resultat;
			$posStartY=$resultat;
		}
 
		//Impression de la ligne
		for($i=0;$i<count($header);$i++){
			$this->MultiCell($w[$i],6,strip_tags($row[$i]),'',$al[$i],false);
			//On enregistre la plus grande hauteur de cellule
			if($posAfterY<$this->getY()){
				$posAfterY=$this->getY();
			}
			$posBeforeX+=$w[$i];
			$this->setXY($posBeforeX,$posBeforeY);
		}
		//Tracé de la ligne du dessous
		$this->Line($posStartX,$posAfterY,$posBeforeX,$posAfterY);
		$this->setXY($posStartX,$posAfterY);
	}
 
	//Tracé des colonnes
	$this->PrintCols($w,$posStartX,$posStartY,$posAfterY);
}
 
//Tracé des colonnes
function PrintCols($w,$posStartX,$posStartY,$posAfterY){
	$this->Line($posStartX,$posStartY,$posStartX,$posAfterY);
	$colX=$posStartX;
	//On trace la ligne pour chaque colonne
	foreach($w as $row){
		$colX+=$row;
		$this->Line($colX,$posStartY,$colX,$posAfterY);
	}
}
 
//Vérification du débordement de page
function CheckPageBreak($h,$w,$header,$posStartX,$posStartY,$posAfterY){
	//Si la hauteur h provoque un débordement, saut de page manuel
	if($this->GetY()+$h>$this->PageBreakTrigger){
		//On imprime les colonnes de la page actuelle
		$this->PrintCols($w,$posStartX,$posStartY,$posAfterY);
		//On ajoute une page
		$this->AddPage();
		//On réimprime l'entête du tableau
		$this->printTableHeader($header,$w);
		//On renvoi la position courante sur la nouvelle page
		return $this->GetY();
	}
	//On a pas effectué de saut on revoie 0
	return 0;
}
 
//Calcule le nombre de lignes qu'occupe un MultiCell de largeur w
function NbLines($w,$txt){
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
 
}
 
//Instanciation de la classe
$pdf = new pdf;

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->hautDePage();
$pdf->tableArticles();
$pdf->Output();
 
?>
