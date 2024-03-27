<?php

class FicheModel extends Database{
	
	private $db;

	public function __construct()
	{
		$this->db=new Database();
	}

    public function lesFiches($id){
        return $this->db->query("SELECT * FROM fichefrais INNER JOIN etat ON fichefrais.idEtat = etat.id WHERE idVisiteur = $id ORDER BY mois DESC");
    }
}