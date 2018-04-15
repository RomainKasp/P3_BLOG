<?php
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
			$page = new post();
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
			$page = new post();
			$vignettes = $page->getlistArticlAdmin();
			
			// visuels
			require("../view/backend/crud_post/view_articList.php");
		}		
		/**
		* Mise à jour d'un aticle
		**/
		public function modifierChapitre(){
			$page = new post();
			$idchap    = $_GET['id'];
			$tab       = $page->getChapitreAdmin($idchap);
			if ($tab[0] <> false){
			   $titreChap = $tab[2];
			   $numChap   = $tab[6];
			   $dateVisu  = substr ($tab[8],0 ,10);
			   $heurVisu  = substr ($tab[8],11 ,5);
			   $txtChap   = $tab[5];
			   // visuels
			   require("../view/backend/crud_post/view_postModify.php");
			}else{
				echo resultAff("articl", "articles", 0, "backend");
			}
		}	
		/**
		* Liste les pages pour l'administration
		**/
		public function listerPage(){
			$page = new post();
			$vignettes = $page->getlistPage();
			require("../view/backend/crud_post/view_pageList.php");
		}	
		/**
		* Modifier une page
		**/
		public function modifierPage(){
			$page = new post();
			$idpage    = $_GET['id'];
			$tab       = $page->getPage($idpage);
			$titreChap = $tab[0];
			$txtChap   = $tab[1];
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
			$page = new post();
			$action      = @$_GET['action']; 
			
			switch($action){
				case "updatePag";  
					$idt 	= $_POST['pid'];
					$titre	= strip_tags($_POST['pTitre']);
					$pagTxt	= $_POST['pTxt'];
					
					$nbrLgn = $page->updatePage($titre,$pagTxt,$idt);
					$objetGestion = "pagesA";
					$objet		  = "pages";
					break;    	
					
				case "deleteArt";  
					$idt = @$_GET['id'];
					$nbrLgn = $page->deletePost($idt);  
					break;
					
				case "updateArt"; 
					$titre  = strip_tags($_POST['aTitre']);
					$txt    = $_POST['aTxt'];
					$datvisu= strip_tags($_POST['aDatVis']) . " " . strip_tags($_POST['aHeuVis']).":00";
					$numchap= strip_tags($_POST['aNum']);
					$idbil  = $_POST['aid'];
					$nbrLgn = $page->updatePost($titre,$txt,$datvisu,$numchap,$idbil); 
					break;     	
					
				case "createArt";
					$titre  = strip_tags($_POST['aTitre']);
					$txt    = $_POST['aTxt'];
					$datvisu= strip_tags($_POST['aDatVis']) . " " . strip_tags($_POST['aHeuVis']).":00";
					$numchap= strip_tags($_POST['aNum']);
					$nbrLgn = $page->createPost($titre,$txt,$datvisu,$numchap); 
					break;     	
						
				default;
					$nbrLgn = 0;
					break;
			}
			
			echo resultAff($objetGestion, $objet, $nbrLgn, "backend");
		}	
	
		/***************************************************************
		* Fonctions privées                                            *
		***************************************************************/		
		
		
	}