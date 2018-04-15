<?php
	require_once("../models/post.php"); 
	require_once("../controls/ctlCommentaires.php"); 

	class ctlFrontBillets 
	{
		/***************************************************************
		* Fonctions publique                                           *
		***************************************************************/		
		/**
		* Visu de la page d'accueil
		**/
		public function acceuil(){
			
			$tab = $this->consulterPage(1);
			$titrePage = $tab[0];
			$contenuPage = $tab[1];
			
			// visuels
			require("../view/frontend/view_home.php");
		}	
		
		/**
		* Visu de la page description de l'auteur
		**/
		public function auteur(){
			
			$tab = $this->consulterPage(2);
			$titrePage = $tab[0];
			$contenuPage = $tab[1];
			if (strlen($tab[2]) > 0)
				$photoPage = "./images/articles/".$tab[2];
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
			$tab = $this->consulterChapitre($idchap);
			if ($tab[0] <> false){	
				$titreChapitre = $tab[2]; 
				$contentChapite= $tab[5];
				$imgChapitre   = $tab[7];
				
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
			$page = new post();
			$vignettes = $page->getLastChap();
			require("../view/frontend/view_lastest.php");
		}	
		/**
		* Sommaire des chapitres
		**/
		public function sommaire(){
			
			$page = new post();
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

			$page = new post();
			$tab = $page->getPage($idPage);
			
			return $tab;
		}	
		/**
		* Retourne les données d'un chapitre dans un tableau
		**/
		private function consulterChapitre($idChapitre){

			$page = new post();
			$tab = $page->getChapitre($idChapitre);
			
			return $tab;
		}			
		
	}