<?php

class AdminController extends Controller 
{
	private $users;

	public function __construct(){
		$this->users = new AdminModel();	
	}

    public function afficherVisiteurs($depart, $parPage){
        return $this->users->lesVisiteurs($depart, $parPage)->fetchAll();
    }

    public function afficherComptables(){
        return $this->users->lesComptables()->fetchAll();
    }

    public function nbVisiteurs(){
        return $this->users->nbVisiteurs();
    }

    public function supprimerVisiteur($id){
         $this->users->supprimerVisiteur($id);
    }

    public function supprimerComptable($id){
        $this->users->supprimerComptable($id);
    }

	public function index($depart, $parPage)
	{
        $tab=[];
        $nbVisiteurs = $this->nbVisiteurs();
        $visiteurs= $this->afficherVisiteurs($depart, $parPage);
        $comptables= $this->afficherComptables();
        array_push($tab, $visiteurs);
        array_push($tab, $comptables);
        array_push($tab, $nbVisiteurs);
		$this->render('admin', $tab);
	} 
}
