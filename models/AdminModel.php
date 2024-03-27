<?php

class AdminModel extends Database{
	
	private $db;
	
	public function __construct()
	{
		$this->db=new Database();	
	}

    public function lesVisiteurs($depart, $parPage){
        return $this->db->query('SELECT * FROM visiteur LIMIT '.$depart.', '.$parPage.'');
    }

    public function nbVisiteurs(){
        return $this->db->query("SELECT * FROM visiteur")->rowCount();
    }
    public function lesComptables(){
        return $this->db->query("SELECT * FROM comptable");
    }

    public function supprimerVisiteur($id){
        return $this->db->query("DELETE FROM visiteur WHERE id='".$id."'");
    }
	
    public function supprimerComptable($id){
        return $this->db->query("DELETE FROM comptable WHERE id='".$id."'");
    }
	

	

}