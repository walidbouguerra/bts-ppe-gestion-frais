<?php

class ValiderModel extends Database{
	
	private $db;
	

	public function __construct()
	{
		$this->db=new Database();
	}

    public function lesVisiteurs(){
        return $this->db->query("SELECT * FROM visiteur");
    }
	
    public function fichesVisiteurs($id){
        return $this->db->query("SELECT * FROM fichefrais INNER JOIN etat ON fichefrais.idEtat = etat.id WHERE idVisiteur = '".$id."' ORDER BY mois DESC");
    }

    public function changerEtat($id ,$mois, $post){
        $requete="UPDATE fichefrais SET idEtat = ?, montantValide= ? WHERE idVisiteur = ? AND mois = ?  ";
		$stmt=$this->db->query($requete,[$post['etat'],$post['montantValide'], $id, $mois]);
    }
	

}