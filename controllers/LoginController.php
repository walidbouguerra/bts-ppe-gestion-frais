<?php

class LoginController extends Controller 
{
	public function verif()
	{	
		$connection = false;
		if(isset($_POST)){
			$verifLogin = new LoginModel();
			if($verifLogin->verifLogin($_POST)){
				$connection = true;
				session_start();
			}
			else{
				$connection = false;
			}	
		}
		if($connection == true){
			header('Location: index.php');
		}
		elseif($connection == false){
			header('Location: index.php?erreur');
		}		
	} 

	public function index(){
		$this->render('login');
	}
	
}
