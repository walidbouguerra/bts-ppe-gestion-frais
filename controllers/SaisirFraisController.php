<?php

class SaisirFraisController extends Controller 
{

	private $frais;

	public function __construct(){
		$this->frais = new FraisModel();	
	}

	public function ficheFrais($id, $post){
		if($this->frais->checkExiste($id, $post)==false){
			$this->frais->saisirFiche($id, $post);
		}else{
			$this->frais->supprimerFiche($id, $post);
			$this->frais->saisirFiche($id, $post);
		}
	}
	
	public function afficherMontantsUnitaires(){
		return $this->frais->lesMontantsUnitaires()->fetchAll();

	}

	public function index()
	{
		$montantUnitaire = $this->afficherMontantsUnitaires();
		$this->render('saisie', $montantUnitaire);
	} 
}
