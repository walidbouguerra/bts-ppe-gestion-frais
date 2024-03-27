<?php

class ConsulterModel extends Database{
	
	private $db;
	
	public function __construct()
	{
		$this->db=new Database();	
	}

    public function fiche($id, $mois){
        return $this->db->query("SELECT * FROM fichefrais WHERE idVisiteur = '".$id."' AND mois = '".$mois."' ");
    }
	
    public function hf_fiche($id, $mois){
        return $this->db->query("SELECT * FROM lignefraishorsforfait WHERE idVisiteur = '".$id."' AND mois = '".$mois."'");
    }

    public function qte_fiche($id, $mois){
        return $this->db->query("SELECT * FROM lignefraisforfait WHERE idVisiteur = '".$id."' AND mois = '".$mois."'");
    }

    public function etat(){
        return $this->db->query("SELECT * FROM etat ");
    }
	
}