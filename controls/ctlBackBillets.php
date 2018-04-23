<?php
	namespace controls;
	require_once("../models/post.php"); 

	class ctlBackBillets 
	{
		/***************************************************************
		* Fonctions publique                                           *
		***************************************************************/		
		/**
		* Création d'un chapitre
		**/
		public function creerChapitre(){
			$page = new \models\post();
			$numChap   = $page->getNewChapNumber();
			$numChapMax = $numChap; 
			$numChapMax++;
			
			// visuels
			require("../view/backend/crud_post/view_postCreate.php");
		}		
		/**
		* Liste les articles pour la modération
		**/
		public function listerChapitre(){
			$page = new \models\post();
			$vignettes = $page->getlistArticlAdmin();
			
			// visuels
			require("../view/backend/crud_post/view_articList.php");
		}		
		/**
		* Mise à jour d'un aticle
		**/
		public function modifierChapitre(){
			$page   = new \models\post();
			$idchap = $_GET['id'];
			$chap   = $page->getChapitreAdmin($idchap);
			if ($chap <> false){
			   $titreChap = $chap->getTitre();
			   $numChap   = $chap->getNumeroChapitre();
			   
			   $dateVisu  = substr ($chap->getDateVisu(),0 ,10);
			   $heurVisu  = substr ($chap->getDateVisu(),11 ,5);
			   $txtChap   = $chap->getContenu();
			   // visuels
			   require("../view/backend/crud_post/view_postModify.php");
			}else{
				echo \models\resultAff("articl", "articles", 0, "backend");
			}
		}	
		/**
		* Liste les pages pour l'administration
		**/
		public function listerPage(){
			$page = new \models\post();
			$vignettes = $page->getlistPage();
			require("../view/backend/crud_post/view_pageList.php");
		}	
		/**
		* Modifier une page
		**/
		public function modifierPage(){
			$page = new \models\post();
			$idpage    = $_GET['id'];
			$tab       = $page->getPage($idpage);
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
			$page = new \models\post();
			$action      = @$_GET['action']; 
			
			switch($action){
				case "updatePag";  
					$bil = new \hydratation\billet();
					$bil->setIdentifiant($_POST['pid']);
					$bil->setTitre(strip_tags($_POST['pTitre']));
					$bil->setContenu($_POST['pTxt']);
					
					$nbrLgn = $page->updatePage($bil);
					$objetGestion = "pagesA";
					$objet		  = "pages";
					break;    	
					
				case "deleteArt";  
					$bil = new \hydratation\billet();
					$bil->setIdentifiant(@$_GET['id']);
					$nbrLgn = $page->deletePost($bil);  
					break;
					
				case "updateArt"; 
					$bil = new \hydratation\billet();
					$bil->setIdentifiant($_POST['aid']);
					$bil->setTitre(strip_tags($_POST['aTitre']));
					$bil->setContenu($_POST['aTxt']);
					$bil->setDateVisu(strip_tags($_POST['aDatVis']) . " " . strip_tags($_POST['aHeuVis']).":00");
					$bil->setNumeroChapitre(strip_tags($_POST['aNum']));
					
					$nbrLgn = $page->updatePost($bil); 
					break;     	
					
				case "createArt";
					$bil = new \hydratation\billet();
					//$bil->setIdentifiant($_POST['aid']);
					$bil->setTitre(strip_tags($_POST['aTitre']));
					$bil->setContenu($_POST['aTxt']);
					$bil->setDateVisu(strip_tags($_POST['aDatVis']) . " " . strip_tags($_POST['aHeuVis']).":00");
					$bil->setNumeroChapitre(strip_tags($_POST['aNum']));
					$nbrLgn = $page->createPost($bil); 
					break;     	
						
				default;
					$nbrLgn = 0;
					break;
			}
			
			echo \models\resultAff($objetGestion, $objet, $nbrLgn, "backend");
		}	
	
		/***************************************************************
		* Fonctions privées                                            *
		***************************************************************/		
		
		
	}