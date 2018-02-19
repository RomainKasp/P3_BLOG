<?php
	require_once("../models/postManager.php"); 

	class post extends postManager
	{
		/***************************************************************
		* Fonctions pour les pages                                     *
		***************************************************************/		
		/**
		* Recupere une page
		**/
		public function getPage($id_page){
			$tab[0] = "Erreur de liaison serveur";	
			$tab[1] = "Veuillez repasser plus tard";	
			
			$tab2 = $this->selectPage($id_page);
			if(isset($tab2[0])){
				$tab = $tab2;
			}
			
			return $tab;
		}		
		/**
		* Recupere un chapitre
		**/
		public function getChapitre($id_page){
			$tab[0] = "Erreur de liaison serveur";	
			$tab[1] = "Veuillez repasser plus tard";	
			$tab[7] = "";	
			
			$tab2 = $this->selectChap($id_page);

			if(isset($tab2[0])){
				$tab = $tab2;
			}
			
			return $tab;
		}
		/**
		* Recupere le visuel de la liste des 10 derniers articles
		**/
		public function getLastChap(){
			$result = "Aucun chapitre disponible";	
			$res = "";
			$tab = $this->selectLastest();
		
			if ($tab[0][0] > 0){
				for ($i = 1; $i <= $tab[0][0]; $i++) {
					$dateArticle   = $tab[$i][3];
					$titreArticle  = $tab[$i][2];
					$resumeArticle = $tab[$i][5];
					$imageArticle  = $tab[$i][7];
					$id            = $tab[$i][0];
					
					if (strlen($resumeArticle) > 150){
						$resumeArticle = substr($resumeArticle,0,150) . "...";
					}
					
					include("../view/frontend/template/template_articleTimeline.php");
					$res .= $temp_artTime;
				}
				$result = $res;
			}
			
			return $result;
		}	
		/**
		* Crée une liste numérotée des chapitre disponibles
		**/
		public function getListChap(){
			$result = "Aucun chapitre disponible";	
			$res = "";
			$tab = $this->selectAllPost();			
			if ($tab[0][0] > 0){
				$res .= "<ol>";
				for ($i = 1; $i <= $tab[0][0]; $i++) {
					$res .= '<li><a href="?page=chapitre&idchap='.$tab[$i][0].'">'.$tab[$i][2]."</a> </li>";
				}
				$res .= "</ol>";
				$result = $res;
			}
			
			return $result;
		}			
	}