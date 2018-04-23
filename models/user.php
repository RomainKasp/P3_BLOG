<?php
	namespace models;
	//require_once("../models/userManager.php"); 

	class user extends userManager
	{
		/***************************************************************
		* Fonctions de consultation des utilisateurs                   *
		***************************************************************/		
		/**
		* Connexion d'un utilisateur 
		* true = ok / false = non autorisé 
		**/
		public function connectUsr($identhUsr, $identhPass){
			$passDB="";
			$tab = $this->selectUser($identhUsr);
			if($tab[0]>0){
				$passDB = $tab[1]->getPassCrypt();
				
			   if (password_verify($identhPass, $passDB))  return TRUE;
			   else                                        return FALSE;
			}else{
				return FALSE;
			}
		}		
			
	}