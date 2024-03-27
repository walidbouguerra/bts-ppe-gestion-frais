<?php

class ConsulterController extends Controller 
{
	private $consult;

	public function __construct(){
		$this->consult = new ConsulterModel();	
	}

	public function afficherFiche($id, $mois){
		return $this->consult->fiche($id, $mois)->fetchAll();
	}

    public function afficherHFiche($id, $mois){
		return $this->consult->hf_fiche($id, $mois)->fetchAll();
	}

    public function afficherQteFiche($id, $mois){
		return $this->consult->qte_fiche($id, $mois)->fetchAll();
	}

    public function etat(){
        return $this->consult->etat()->fetchAll();
    }

	public function index($montantUniaire)
	{   
        if(isset($_GET['id'])){
            $tab=[];
            $fiche= $this->afficherFiche($_GET['id'], $_GET['mois']);
            $hf_fiche = $this->afficherHFiche($_GET['id'], $_GET['mois']);
            $qte_fiche = $this->afficherQteFiche($_GET['id'], $_GET['mois']);
            $etat = $this->etat();
            array_push($tab, $fiche);
            array_push($tab, $montantUniaire);
            array_push($tab, $hf_fiche);
            array_push($tab, $qte_fiche);
            array_push($tab, $etat);
          
            $this->render('consulter', $tab);
        }
        else{
            $this->render('consulter');
        }
	} 
}