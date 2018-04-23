<?php
	namespace controls;
	/*require_once("../models/post.php"); 
	require_once("../controls/ctlCommentaires.php"); 
	require_once("../hydratation/billet.php"); */

	class ctlFrontBillets 
	{
		/***************************************************************
		* Fonctions publique                                           *
		***************************************************************/		
		/**
		* Visu de la page d'accueil
		**/
		public function acceuil(){
			
			$bil = $this->consulterPage(1);
			$titrePage = $bil->getTitre();
			$contenuPage = $bil->getContenu();
			
			// visuels
			require("../view/frontend/view_home.php");
		}	
		
		/**
		* Visu de la page description de l'auteur
		**/
		public function auteur(){
			
			$bil = $this->consulterPage(2);
			$titrePage = $bil->getTitre();
			$contenuPage = $bil->getContenu();
			if (strlen($bil->getLienImage()) > 0)
				$photoPage = "./images/articles/".$bil->getLienImage();
			else
				$photoPage = "./images/articles/NO_IMAGE.png";
			
			// visuels
			require("../view/frontend/view_about.php");
		}	
		
		/**
		* Visu d'un chapitre
		**/
		public function chapitre(){
			
			$Com_mail  = "";
			$Com_txt   = "";

			$idchap    = $_GET['idchap'];
			$bil = $this->consulterChapitre($idchap);
			if ($bil <> false){	
				$titreChapitre = $bil->getTitre();
				$contentChapite= $bil->getContenu();
				$imgChapitre   = $bil->getLienImage();
				
				// visuels
				require("../view/frontend/view_post.php");
			
				// Partie Commentaires 
				$ctrlComment=new ctlCommentaires();
				$ctrlComment->commentChapitre($idchap);

			}else{
				echo resultAff("articl", "articles", 0, "frontend");
			}			
		}	
		
		/**
		* Liste des 10 derniers chapitres
		**/
		public function nouveautes(){
			$page = new \models\post();
			$vignettes = $page->getLastChap();
			require("../view/frontend/view_lastest.php");
		}	
		/**
		* Sommaire des chapitres
		**/
		public function sommaire(){
			
			$page = new \models\post();
			$liste = $page->getListChap();
			
	        require("../view/frontend/view_summary.php");		
		}		
		/***************************************************************
		* Fonctions privées                                            *
		***************************************************************/		
		/**
		* Retourne les données d'une page dans un tableau
		**/
		private function consulterPage($idPage){

			$page = new \models\post();
			$tab = $page->getPage($idPage);
			
			return $tab;
		}	
		/**
		* Retourne les données d'un chapitre dans un tableau
		**/
		private function consulterChapitre($idChapitre){

			$page = new \models\post();
			$tab = $page->getChapitre($idChapitre);
			
			return $tab;
		}			
		
	}