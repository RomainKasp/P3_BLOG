<?php
	require_once("../models/commentManager.php"); 

	class comment extends commentManager
	{
		/***************************************************************
		* Fonctions pour les lectures                                  *
		***************************************************************/		
		/**
		* Recupere un commentaire
		**/
		public function getComment($id_com){
			$tab[0] = "Erreur de liaison serveur";	
			$tab[1] = "Veuillez repasser plus tard";	
			
			$tab2 = $this->selectComm($id_com);
			if(isset($tab2[0])){
				$tab = $tab2;
			}
			
			return $tab;
		}		
		/**
		* Recupere les commentaires non validés
		**/
		public function getComNonVld(){

		}		
		/**
		* Recupere les commentaires reportés
		**/
		public function getComRprt(){

		}	
		/***************************************************************
		* Fonctions pour l'insertion                                   *
		***************************************************************/		
		/**
		* Insertion un commentaire
		**/
		public function insertCom($nom, $mail, $txt){

			$nbrInsr = $this->insComm($nom, $mail, $txt);
			return $nbrInsr;
		}			
		/***************************************************************
		* Fonctions pour la suppression                                *
		***************************************************************/		
		/**
		* Suppression d'un commentaire
		**/
		public function supprCom($id){

			$nbrDel = $this->delComm($id);
			return $nbrDel;
		}			
	}