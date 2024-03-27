<?php

class FraisModel extends Database{
	
	private $db;
	

	public function __construct()
	{
		$this->db=new Database();	
	}
	
	public function saisirFiche($id, $post){
		extract($post);
		
		
		$requete="INSERT INTO fichefrais (idVisiteur, mois, montanttotal, HFmontant, Fmontant, dateModif) VALUES (?,?,?,?,?, NOW()) ";
		$stmt=$this->db->query($requete,[$id, date("mY", strtotime($periode)), $total, $hf_total, $frais_total]);
		
		
		$requete="INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite, montant) VALUES (?,?,?,?,?) ";
		$stmt=$this->db->query($requete,[$id, date("mY", strtotime($periode)), 'ETP', (int)$etp_1, $etp_total]);
		
		$requete="INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite, montant) VALUES (?,?,?,?,?) ";
		$stmt=$this->db->query($requete,[$id, date("mY", strtotime($periode)), 'KM', (int)$km_1, $km_total]);

		$requete="INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite, montant) VALUES (?,?,?,?,?) ";
		$stmt=$this->db->query($requete,[$id, date("mY", strtotime($periode)), 'NUI', (int)$nui_1, $nui_total]);

		$requete="INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite, montant) VALUES (?,?,?,?,?) ";
		$stmt=$this->db->query($requete,[$id, date("mY", strtotime($periode)), 'REP', (int)$rep_1, $rep_total]);
		

		for($i=1; $i<=intval($hf_count); $i++){
			if(isset(${'hf_libelle' . $i})){
				if(${'hf_date' . $i}==''){
					${'hf_date' . $i}=NULL;
				}
				$requete="INSERT INTO lignefraishorsforfait (idVisiteur, mois, libelle, date, montant) VALUES (? ,?, ?, ?, ?)";
				$stmt=$this->db->getPDO()->prepare($requete);
				$periode= date("mY", strtotime($periode));
				$stmt->bindParam(1, $id);
				$stmt->bindParam(2, $periode);
				$stmt->bindParam(3, ${'hf_libelle' . $i});
				$stmt->bindParam(4, ${'hf_date' . $i});
				$stmt->bindParam(5, ${'hf_montant' . $i});
				$stmt->execute();
			}
		
		}
		
	}

	public function checkExiste($id, $post){
		extract($post);
		$requete = "SELECT COUNT(*) FROM fichefrais WHERE idVisiteur = ? AND mois = ? " ;
		$req = $this->db->query($requete, [$id, date("mY", strtotime($periode))]);
		$count = $req->fetchColumn();
		if($count>0){
			return true;
		}
		else{
			return false;
		}

	}
	public function supprimerFiche($id, $post){
		extract($post);
		$requete = "DELETE FROM lignefraisforfait WHERE idVisiteur = ? AND mois = ?";
		$req = $this->db->query($requete, [$id,  date("mY", strtotime($periode))]);
		$requete = "DELETE FROM lignefraishorsforfait WHERE idVisiteur = ? AND mois = ?";
		$req = $this->db->query($requete, [$id,  date("mY", strtotime($periode))]);
		$requete = "DELETE FROM fichefrais WHERE idVisiteur = ? AND mois = ?";
		$req = $this->db->query($requete, [$id,  date("mY", strtotime($periode))]);
		

	}

	public function lesMontantsUnitaires(){
		return $this->db->query('SELECT * FROM fraisforfait');
	}

	
	

}