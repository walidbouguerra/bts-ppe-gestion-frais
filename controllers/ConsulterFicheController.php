<?php

class ConsulterFicheController extends Controller 
{
	private $fiche;

	public function __construct(){
		$this->fiche = new FicheModel();	
	}

	public function afficherFiches($id){
		return $this->fiche->lesFiches($id)->fetchAll();
	}
	
	public function index()
	{
		$fiches= $this->afficherFiches($_SESSION['id']);
		if(!empty($fiches)){
			$this->render('fiche', $fiches);
		}
		else{
			$this->render('fiche');
		}
	} 
}
