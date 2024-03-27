<?php

class ValiderController extends Controller 
{
	private $valider;

	public function __construct(){
		$this->valider = new ValiderModel();	
	}

	public function afficherLesVisiteurs(){
		return $this->valider->lesVisiteurs()->fetchAll();
	}

    public function afficherFiches($id){
        return $this->valider->fichesVisiteurs($id)->fetchAll();
    }

    public function changerEtat($id, $mois, $post){
        return $this->valider->changerEtat($id, $mois, $post);
    }

	public function index($id=false)
	{
        $variables=[];
        $tab= $this->afficherLesVisiteurs();
        $tab2= $this->afficherFiches($id);
        array_push($variables, $tab);
        array_push($variables, $tab2);
        $this->render('valider', $variables);        
	} 
}
