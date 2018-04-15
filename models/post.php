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
		* Recupere un chapitre admin version
		**/
		public function getChapitreAdmin($id_page){
			$tab[0] = "Erreur de liaison serveur";	
			$tab[1] = "Veuillez repasser plus tard";	
			$tab[7] = "";	
			
			$tab2 = $this->selectChapAdmin($id_page);

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
					$resumeArticle = strip_tags($tab[$i][5]);
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
		/**
		* Recupere le visuel de la liste des pages pour modification
		**/
		public function getlistPage(){
			$result = "Aucune page disponible";	
			$res = "";
			$tab = $this->selectAllPage();
		
			if ($tab[0][0] > 0){
				$res .= "<table>";
				for ($i = 1; $i <= $tab[0][0]; $i++) {
					$titrePage  = $tab[$i][2];
					$resumePage = $resumePage = strip_tags($tab[$i][5]);
					$idPage     = $tab[$i][0];
					
					if (strlen($resumePage) > 150){
						$resumePage = substr($resumePage,0,150) . "...";
					}

					$res .= "<tr><form method='post' action='?page=access&admin=updatePag&id=".$idPage."'><td>".$titrePage."</td>";
					$res .= "<td>".$resumePage."</td>";
					$res .= "<td><button>Modifier</button></td></form></tr>";
				}
				$res .= "</table>";
				$result = $res;
			}
			
			return $result;
		}		
		/**
		* Recupere le visuel de la liste des articles pour modification
		**/
		public function getlistArticl(){
			$result = "Aucune page disponible";	
			$res = "";
			$tab = $this->selectAllArticle();
		
			if ($tab[0][0] > 0){
				$res .= "<table width='50%'>";
				for ($i = 1; $i <= $tab[0][0]; $i++) {
					$titrePage  = $tab[$i][2];
					$resumePage = strip_tags($tab[$i][5]);
					$idPage     = $tab[$i][0];
					
					if (strlen($resumePage) > 50){
						$resumePage = substr($resumePage,0,50) . "...";
					}

					$res .= "<tr><td width='5%'>".$titrePage."</td>";
					$res .= "<td>".$resumePage."</td>";
					$res .= "<td width='15%'><form method='post' action='?page=access&admin=updateArt&id=".$idPage."'>";;
					$res .= '<button onClick="submit()">Modifier</button></form></td>';
					$res .= "<td width='15%'><form method='post' action='?page=billet&action=deleteArt&id=".$idPage."'>";
					$res .= '<button onClick="submit()">Supprimer</button></form></td>';
					$res .= "</tr>";
				}
				$res .= "</table>";
				$result = $res;
			}
			
			return $result;
		}			
		/**
		* Recupere le visuel de la liste des articles pour modification
		**/
		public function getlistArticlAdmin(){
			$result = "Aucune page disponible";	
			$res = "";
			$tab = $this->selectAllArticleAdmin();
		
			if ($tab[0][0] > 0){
				$res .= "<table width='50%'>";
				for ($i = 1; $i <= $tab[0][0]; $i++) {
					$titrePage  = $tab[$i][2];
					$resumePage = strip_tags($tab[$i][5]);
					$idPage     = $tab[$i][0];
					
					if (strlen($resumePage) > 50){
						$resumePage = substr($resumePage,0,50) . "...";
					}

					$res .= "<tr><td width='5%'>".$titrePage."</td>";
					$res .= "<td>".$resumePage."</td>";
					$res .= "<td width='15%'><form method='post' action='?page=access&admin=updateArt&id=".$idPage."'>";;
					$res .= '<button onClick="submit()">Modifier</button></form></td>';
					$res .= "<td width='15%'><form method='post' action='?page=access&admin=billet&action=deleteArt&id=".$idPage."'>";
					$res .= '<button onClick="submit()">Supprimer</button></form></td>';
					$res .= "</tr>";
				}
				$res .= "</table>";
				$result = $res;
			}
			
			return $result;
		}	
		/**
		* Recupere le prochain numéro de chapitre
		**/
		public function getNewChapNumber(){
			$result = 0;	
			$res = "";
			$nbr = $this->selectLastNumChap();
			$nbr++;
			
			return $nbr;
		}	
		/***************************************************************
		* Fonctions pour la suppression                                *
		***************************************************************/		
		/**
		* Suppression d'un article
		**/
		public function deletePost($id){

			$nbrDel = $this->supprPost($id);
			return $nbrDel;
		}	
		/***************************************************************
		* Fonctions pour la création                                *
		***************************************************************/		
		/**
		* Création d'un article
		**/
		public function createPost($titre,$txt,$datvisu,$numchap){

			$nbrIns = $this->createArticle($titre,$txt,$datvisu,$numchap);
			return $nbrIns;
		}	
		/***************************************************************
		* Fonctions pour la modification                               *
		***************************************************************/		
		/**
		* Modificarion d'un article
		**/
		public function updatePost($titre,$txt,$datvisu,$numchap,$idbil){

			$nbrUpdt = $this->updtPost($titre,$txt,$datvisu,$numchap,$idbil);
			return $nbrUpdt;
		}			
		/**
		* Modificarion d'une page
		**/
		public function updatePage($titre,$txt,$idbil){

			$nbrUpdt = $this->updtPage($titre,$txt,$idbil);
			return $nbrUpdt;
		}			
	}