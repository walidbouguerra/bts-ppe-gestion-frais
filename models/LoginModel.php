<?php

class LoginModel extends Database{
	
	private $db;
	

	public function __construct()
	{
		$this->db=new Database();
	}

	public function verifLogin($post){
		$username = $post['username'];
		$password = $post['password'];
		$array =  $this->db->query("SELECT * FROM visiteur WHERE `login`='".$username."'");
		$res = $array->fetch(PDO::FETCH_ASSOC);
		
		if(password_verify($password, $res['mdp'])){
			
			$_SESSION['prenom'] = $res['prenom'];
			$_SESSION['nom'] = $res['nom'];
			$_SESSION['id'] = $res['id'];
			$_SESSION['login'] = 'Visiteur médical';
			return true;
		}
		else{
			$array =  $this->db->query("SELECT * FROM comptable WHERE `login`='".$username."'");
			$res = $array->fetch(PDO::FETCH_ASSOC);
			if(password_verify($password, $res['mdp'])){
				
				$_SESSION['prenom'] = $res['prenom'];
				$_SESSION['nom'] = $res['nom'];
				$_SESSION['id'] = $res['id'];
				$_SESSION['login'] = 'Comptable';
				return true;
			}
		
			else{
				$array =  $this->db->query("SELECT * FROM admin WHERE `login`='".$username."'");
				$res = $array->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $res['mdp'])){
					
					$_SESSION['prenom'] = $res['prenom'];
					$_SESSION['nom'] = $res['nom'];
					$_SESSION['id'] = $res['id'];
					$_SESSION['login'] = 'Admin';
					return true;
				}
				else{
					return false;
				}
			
			}
		}	

	}

}