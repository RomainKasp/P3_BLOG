<?php
	namespace controls;

	class ctlFrontBillets 
	{
		private $page;
		private $ctrlComment;
		private $info;
		function __construct($params){
			$this->page 		= $params['post'];
			$this->ctrlComment 	= $params['ctlCommentaires'];
			$this->info			= $params['info'];
		}
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
				$this->ctrlComment->commentChapitre($idchap);

			}else{
				echo $this->info->resultAff("articl", "articles", 0, "frontend");
			}			
		}	
		
		/**
		* Liste des 10 derniers chapitres
		**/
		public function nouveautes(){
			$vignettes = $this->page->getLastChap();
			require("../view/frontend/view_lastest.php");
		}	
		/**
		* Sommaire des chapitres
		**/
		public function sommaire(){
			$liste = $this->page->getListChap();
			
	        require("../view/frontend/view_summary.php");		
		}		
		/***************************************************************
		* Fonctions privées                                            *
		***************************************************************/		
		/**
		* Retourne les données d'une page dans un tableau
		**/
		private function consulterPage($idPage){
			$tab = $this->page->getPage($idPage);
			
			return $tab;
		}	
		/**
		* Retourne les données d'un chapitre dans un tableau
		**/
		private function consulterChapitre($idChapitre){
			$tab = $this->page->getChapitre($idChapitre);
			
			return $tab;
		}			
		
	}