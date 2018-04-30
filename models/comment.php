<?php
	namespace models;

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
		* Recupere les 50 derniers comms
		**/
		public function getLastCom($idChap){
			$result = "";	
			$res = "";
			$tab = $this->selectLastCom($idChap);
		
			if ($tab[0][0] > 0){
				for ($i = 1; $i <= $tab[0][0]; $i++) {
					$idcomX        = $tab[$i]->getIdentifiant();
					$pseudoCOmX    = $tab[$i]->getNom();
					$dateCOmX      = $tab[$i]->getDatePost();
					$timeCOmX      = $tab[$i]->getHeurePost();
					$txtCOmX       = $tab[$i]->getContenu();
					$nbrRprtCOmX   = $tab[$i]->getNbrReport();
					$etatCOmX 	   = $tab[$i]->getEtat();
					
					$nbrRprtCOmX++;
					
					include("../view/frontend/template/template_commentList.php");
					$res .= $commentaireX;
				}
				$result = $res;
			}
			
			return $result;
		}
		/**
		* Recupere les commentaires reportés (par tranche de 100)
		**/
		public function getRprtCom(){
			$result = "";	
			$res = "";
			$tab = $this->selectRprtCom();
		
			if ($tab[0][0] > 0){
				for ($i = 1; $i <= $tab[0][0]; $i++) {
					$idcomX        = $tab[$i]->getIdentifiant();
					$pseudoCOmX    = $tab[$i]->getNom();
					$dateCOmX      = $tab[$i]->getDatePost();
					$timeCOmX      = $tab[$i]->getHeurePost();
					$txtCOmX       = $tab[$i]->getContenu();
					$nbrRprtCOmX   = $tab[$i]->getNbrReport();
					
					include("../view/backend/template/template_commentList.php");
					$res .= $commentaireX;
				}
				$result = $res;
			}
			
			return $result;
		}		
		/**
		* Recupere les commentaires non validés
		**/
		public function getComNonVld(){

		}		
		/***************************************************************
		* Fonctions pour l'insertion                                   *
		***************************************************************/		
		/**
		* Insertion un commentaire
		**/
		public function insertCom($cmt){

			$nbrInsr = $this->insComm($cmt);
			return $nbrInsr;
		}			
		/***************************************************************
		* Fonctions pour la mise à jour                                *
		***************************************************************/
		/**
		* Metre à jour le nombre de report d'un commentaire
		**/
		public function reportComment ($id_bill,$nbrRprt){
			
			$nbrUpd = $this->rprtComm($id_bill,$nbrRprt);
			return $nbrUpd;
		}
		/**
		* Metre à jour le nombre de report d'un commentaire
		**/
		public function resetReport ($id_bill){
			
			$nbrUpd = $this->rprtComm($id_bill,0);
			return $nbrUpd;
		}
		/**
		* Valider le commentaire (état à 3 + nbrRprt = 0)
		**/
		public function confirmComment ($id_bill){
			
			$nbrUpd = $this->validateCom($id_bill);
			return $nbrUpd;
		}
		/***************************************************************
		* Fonctions pour la suppression                                *
		***************************************************************/		
		/**
		* Suppression d'un commentaire
		**/
		public function deleteComment($id){

			$nbrDel = $this->supprCom($id);
			return $nbrDel;
		}			
	}