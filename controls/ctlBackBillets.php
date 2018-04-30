<?php
	namespace controls;

	class ctlBackBillets 
	{
		public $page;
		public $bil;
		public $info;
		function __construct($params){
			$this->page	= $params['post'];
			$this->bil	= $params['billet'];
			$this->info	= $params['info'];
		}	
		/***************************************************************
		* Fonctions publique                                           *
		***************************************************************/		
		/**
		* Création d'un chapitre
		**/
		public function creerChapitre(){
			$numChap   = $this->page->getNewChapNumber();
			$numChapMax = $numChap; 
			$numChapMax++;
			
			// visuels
			require("../view/backend/crud_post/view_postCreate.php");
		}		
		/**
		* Liste les articles pour la modération
		**/
		public function listerChapitre(){
			$vignettes = $this->page->getlistArticlAdmin();
			
			// visuels
			require("../view/backend/crud_post/view_articList.php");
		}		
		/**
		* Mise à jour d'un aticle
		**/
		public function modifierChapitre(){
			$idchap = $_GET['id'];
			$chap   = $this->page->getChapitreAdmin($idchap);
			if ($chap <> false){
			   $titreChap = $chap->getTitre();
			   $numChap   = $chap->getNumeroChapitre();
			   
			   $dateVisu  = substr ($chap->getDateVisu(),0 ,10);
			   $heurVisu  = substr ($chap->getDateVisu(),11 ,5);
			   $txtChap   = $chap->getContenu();
			   // visuels
			   require("../view/backend/crud_post/view_postModify.php");
			}else{
				echo $this->info->resultAff("articl", "articles", 0, "backend");
			}
		}	
		/**
		* Liste les pages pour l'administration
		**/
		public function listerPage(){
			$vignettes = $this->page->getlistPage();
			require("../view/backend/crud_post/view_pageList.php");
		}	
		/**
		* Modifier une page
		**/
		public function modifierPage(){
			$idpage    = $_GET['id'];
			$tab       = $this->page->getPage($idpage);
			$titreChap = $tab->getTitre();
			$txtChap   = $tab->getContenu();
			// visuels
			require("../view/backend/crud_post/view_pageModify.php");
		}	
		/**
		* Action finale sur une page
		**/
		public function actionPage(){
			// Variables
			$objetGestion = "articl";
			$objet		  = "articles";
			$action      = @$_GET['action']; 
			
			switch($action){
				case "updatePag";  
					$this->bil->setIdentifiant($_POST['pid']);
					$this->bil->setTitre(strip_tags($_POST['pTitre']));
					$this->bil->setContenu($_POST['pTxt']);
					
					$nbrLgn = $this->page->updatePage($this->bil);
					$objetGestion = "pagesA";
					$objet		  = "pages";
					break;    	
					
				case "deleteArt";  
					$this->bil->setIdentifiant(@$_GET['id']);
					$nbrLgn = $this->page->deletePost($this->bil);  
					break;
					
				case "updateArt"; 
					$this->bil->setIdentifiant($_POST['aid']);
					$this->bil->setTitre(strip_tags($_POST['aTitre']));
					$this->bil->setContenu($_POST['aTxt']);
					$this->bil->setDateVisu(strip_tags($_POST['aDatVis']) . " " . strip_tags($_POST['aHeuVis']).":00");
					$this->bil->setNumeroChapitre(strip_tags($_POST['aNum']));
					
					$nbrLgn = $this->page->updatePost($this->bil); 
					break;     	
					
				case "createArt";
					$this->bil->setTitre(strip_tags($_POST['aTitre']));
					$this->bil->setContenu($_POST['aTxt']);
					$this->bil->setDateVisu(strip_tags($_POST['aDatVis']) . " " . strip_tags($_POST['aHeuVis']).":00");
					$this->bil->setNumeroChapitre(strip_tags($_POST['aNum']));
					$nbrLgn = $this->page->createPost($this->bil); 
					break;     	
						
				default;
					$nbrLgn = 0;
					break;
			}
			
			echo $this->info->resultAff($objetGestion, $objet, $nbrLgn, "backend");
		}	
	
		/***************************************************************
		* Fonctions privées                                            *
		***************************************************************/		
		
		
	}