<?php
session_start();

require '../app/Autoloader.php';
require '../app/Database.php';


Autoloader::register();



$url=($_GET['url'])??null;

$url=explode("/",filter_var($url,FILTER_SANITIZE_URL));


$ctrl_url=$url[0]??null;
$action_url=($url[1])??'index';
$param1_url=($url[2])??null;




if(isset($_SESSION['login']) AND $_SESSION['login']=='Visiteur médical' AND isset($_SESSION['id'])){
	if($ctrl_url=="saisie"){
		
		$controller= new SaisirFraisController();
		
		if(isset($_POST['periode'])){
			$controller->ficheFrais($_SESSION['id'], $_POST);
		}
		$controller->index();

	
	}
	elseif($ctrl_url=="consulter"){
		$controller= new SaisirFraisController();
		$montantUnitaire= $controller->afficherMontantsUnitaires();
		$controller= new ConsulterController();
		$controller->index($montantUnitaire);

	}
	elseif($ctrl_url=="fiche"){
		
		$controller= new ConsulterFicheController();
		$controller->index();

	}

	else{
		$controller = new AccueilController();
		$controller->index();
	
	}
}
elseif(isset($_SESSION['login']) AND $_SESSION['login']=='Comptable'){
	if($ctrl_url=="valider" AND isset($_POST['visiteur'])){
		$controller = new ValiderController();
		$controller->index($_POST['visiteur']);
		
	}
	elseif($ctrl_url=="valider" AND isset($_POST['etat'])){
		$controller = new ValiderController();
		$controller->changerEtat($_GET['id'], $_GET['mois'], $_POST);
		$controller->index($_GET['id']);
	}

	elseif($ctrl_url=="consulter"){
		$controller= new SaisirFraisController();
		$montantUnitaire= $controller->afficherMontantsUnitaires();
		$controller= new ConsulterController();
		$controller->index($montantUnitaire);

	}
	else{
	
		$controller = new ValiderController();
		$controller->index();
	
	}
}
elseif(isset($_SESSION['login']) AND $_SESSION['login']=='Admin'){
	$controller = new AdminController();
	if(isset($_GET['supprimerVisiteur'])){
		$controller->supprimerVisiteur($_GET['id']);
	}
	if(isset($_GET['supprimerComptable'])){
		$controller->supprimerComptable($_GET['id']);
	}
	if(isset($_GET['depart'])){
		$controller->index($_GET['depart'], 8);
	}else{
		$controller->index(0, 8);
	}
	

}
elseif(isset($_POST['username'])){
	
	$controller= new Logincontroller();
	$controller->verif();
	
}
	else{
		$controller= new Logincontroller();
		$controller->index();
		
	}
		


?>