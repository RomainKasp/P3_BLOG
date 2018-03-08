<?php
	require_once("../models/databaseManager.php"); 

	class postManager extends databaseManager
	{
		private $colonnes = " BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_EST_PAGE ";
		private $tabbill  = " billet ";
		private $frm      = " FROM billet B ";
		private $joinUti  = " INNER JOIN utilisateur U ON U.UTI_ID = B.UTI_ID ";
		private $colUsr   = ",UTI_ID, UTI_NOM ";
		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/		
		/**
		* Selection d'un billet avec nom auteur
		* (pour visuel simple)
		**/
		protected function selectPost($id_bil){
			global $colonnes, $tabbill, $frm, $joinUti, $colUsr;
			$bdd = $this->dbConnect();
			$chaineReq = "SELECT" . $colonnes . $colUsr . $frm . $joinUti . "WHERE BIL_ID = :id_bil";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':id_bil', $id_bil, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}		
		/**
		* Selection d'un chapitre
		**/
		protected function selectChap($BIL_ID){
			$bdd     = $this->dbConnect();
			$tab[1]  = " ";
			$requete = $bdd->prepare("SELECT BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_CHAP, BIL_IMG FROM billet WHERE BIL_DAT_VISU < CURRENT_DATE AND BIL_CHAP > 0 AND BIL_ID =:BIL_ID");
			$requete->bindValue(':BIL_ID', $BIL_ID);
			$requete->execute();

			while ($donnees = $requete->fetch()){
				$tab[0] = $donnees['BIL_ID'];	
				$tab[1] = $donnees['UTI_ID'];	
				$tab[2] = $donnees['BIL_TITRE'];	
				$tab[3] = $donnees['BIL_DAT_CRE'];	
				$tab[4] = $donnees['BIL_DAT_MOD'];	
				$tab[5] = $donnees['BIL_TXT'];	
				$tab[6] = $donnees['BIL_DAT_VISU'];	
				$tab[6] = $donnees['BIL_CHAP'];	
				$tab[7] = $donnees['BIL_IMG'];	
			}			
			
			return $tab;
		}		
		/**
		* Selection d'une page 
		* (recup seulement le titre, le contenu)
		**/
		protected function selectPage($BIL_EST_PAGE){
			global $colonnes, $tabbill, $frm, $joinUti, $colUsr;
			$tab[1] = "";
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("SELECT BIL_TITRE, BIL_TXT, BIL_IMG FROM billet WHERE BIL_EST_PAGE = :BIL_EST_PAGE");
			$requete->bindValue(':BIL_EST_PAGE', $BIL_EST_PAGE);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$tab[0] = $donnees['BIL_TITRE'];	
				$tab[1] = $donnees['BIL_TXT'];	
				$tab[2] = $donnees['BIL_IMG'];	
			}
			
			return $tab;
		}
		/**
		* Selection des 10 derniers billets
		* (pour liste des 10 derniers articles)
		**/
		protected function selectLastest(){
			global $colonnes, $tabbill, $frm, $joinUti, $colUsr;
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$requete   = $bdd->prepare("SELECT BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_EST_PAGE,BIL_IMG FROM billet B WHERE BIL_EST_PAGE = '0' AND BIL_DAT_VISU < CURRENT_TIMESTAMP ORDER BY BIL_CHAP DESC LIMIT 0,10");

			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$tab[$ind][0] = $donnees['BIL_ID'];	
				$tab[$ind][1] = $donnees['UTI_ID'];	
				$tab[$ind][2] = $donnees['BIL_TITRE'];	
				$tab[$ind][3] = $donnees['BIL_DAT_CRE'];	
				$tab[$ind][4] = $donnees['BIL_DAT_MOD'];	
				$tab[$ind][5] = $donnees['BIL_TXT'];	
				$tab[$ind][6] = $donnees['BIL_DAT_VISU'];	
				$tab[$ind][7] = $donnees['BIL_IMG'];	
			}			
			$tab[0][0] = $ind;
			
			return $tab;
		}
		/**
		* Selection de tout les billets par ordre croissant de date
		* (pour sommaire)
		**/
		protected function selectAllPost(){
			global $colonnes, $tabbill, $frm, $joinUti, $colUsr;
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$chaineReq = "SELECT BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_EST_PAGE,BIL_IMG FROM billet B WHERE BIL_EST_PAGE = '0' AND BIL_DAT_VISU < CURRENT_TIMESTAMP ORDER BY BIL_CHAP ASC LIMIT 0,10";
			$requete   = $bdd->prepare($chaineReq);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$tab[$ind][0] = $donnees['BIL_ID'];	
				$tab[$ind][1] = $donnees['UTI_ID'];	
				$tab[$ind][2] = $donnees['BIL_TITRE'];	
				$tab[$ind][3] = $donnees['BIL_DAT_CRE'];	
				$tab[$ind][4] = $donnees['BIL_DAT_MOD'];	
				$tab[$ind][5] = $donnees['BIL_TXT'];	
				$tab[$ind][6] = $donnees['BIL_DAT_VISU'];	
				$tab[$ind][7] = $donnees['BIL_IMG'];	
			}			
			$tab[0][0] = $ind;
			
			return $tab;
		}
		/**
		* Selection de toutes les pages 
		* (pour gestion admin)
		**/
		protected function selectAllPage(){
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$chaineReq = "SELECT BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_EST_PAGE,BIL_IMG FROM billet B WHERE BIL_CHAP = '0' ORDER BY BIL_EST_PAGE ASC LIMIT 0,30";
			$requete   = $bdd->prepare($chaineReq);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$tab[$ind][0] = $donnees['BIL_ID'];	
				$tab[$ind][1] = $donnees['UTI_ID'];	
				$tab[$ind][2] = $donnees['BIL_TITRE'];	
				$tab[$ind][3] = $donnees['BIL_DAT_CRE'];	
				$tab[$ind][4] = $donnees['BIL_DAT_MOD'];	
				$tab[$ind][5] = $donnees['BIL_TXT'];	
				$tab[$ind][6] = $donnees['BIL_DAT_VISU'];	
				$tab[$ind][7] = $donnees['BIL_IMG'];	
			}			
			$tab[0][0] = $ind;
			
			return $tab;
		}
		/**
		* Selection de toutes les articles 
		* (pour gestion admin)
		**/
		protected function selectAllArticle(){
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$chaineReq = "SELECT BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_EST_PAGE,BIL_IMG FROM billet B WHERE BIL_EST_PAGE = '0' AND BIL_DAT_VISU < CURRENT_TIMESTAMP ORDER BY BIL_CHAP DESC";
			$requete   = $bdd->prepare($chaineReq);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$tab[$ind][0] = $donnees['BIL_ID'];	
				$tab[$ind][1] = $donnees['UTI_ID'];	
				$tab[$ind][2] = $donnees['BIL_TITRE'];	
				$tab[$ind][3] = $donnees['BIL_DAT_CRE'];	
				$tab[$ind][4] = $donnees['BIL_DAT_MOD'];	
				$tab[$ind][5] = $donnees['BIL_TXT'];	
				$tab[$ind][6] = $donnees['BIL_DAT_VISU'];	
				$tab[$ind][7] = $donnees['BIL_IMG'];	
			}			
			$tab[0][0] = $ind;
			
			return $tab;
		}
		/***************************************************************
		* Requetes de suppression                                      *
		***************************************************************/		
		/**
		* Suppression d'un article
		**/
		protected function deletePost($BIL_ID){
			global $colonnes, $tabbill, $frm, $joinUti, $colUsr;
			$bdd = $this->dbConnect();
			$chaineReq = "DELETE" . $frm . "WHERE BIL_ID = :BIL_ID";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':BIL_ID', $BIL_ID, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}	
		/***************************************************************
		* Requetes d'insertion                                         *
		***************************************************************/
		/**
		* Insertion d'un article
		**/
		protected function insertPost($UTI_ID,$BIL_ID,$COM_ID,$COM_USR,$COM_MAIL,$COM_TXT,$COM_DAT,$COM_DAT,$COM_NBR_RPT,$COM_ETA){
			global $colonnes, $tabbill, $frm, $joinUti, $colUsr;
			$bdd = $this->dbConnect();
			$chaineReq = "INSERT INTO " . $tabbill . "(".$colonnes.") VALUES (:BIL_ID, :UTI_ID, :BIL_TITRE, :BIL_DAT_CRE, :BIL_DAT_MOD, :BIL_TXT, :BIL_DAT_VISU, :BIL_EST_PAGE)";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(':BIL_ID      ', $BIL_ID       ,
								':UTI_ID      ', $UTI_ID       ,
								':BIL_TITRE   ', $BIL_TITRE    ,
								':BIL_DAT_CRE ', $BIL_DAT_CRE  ,
								':BIL_DAT_MOD ', $BIL_DAT_MOD  ,
								':BIL_TXT     ', $BIL_TXT      ,
								':BIL_DAT_VISU', $BIL_DAT_VISU ,
								':BIL_EST_PAGE', $BIL_EST_PAGE ,                               
                                PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}	
		/***************************************************************
		* Requetes de modification                                     *
		***************************************************************/
		/**
		* Modification d'un article
		**/
		protected function modifyPost($BIL_ID,$BIL_TITRE,$BIL_DAT_MOD,$BIL_TXT,$BIL_DAT_VISU){
			global $colonnes, $tabbill, $frm, $joinUti, $colUsr;
			$bdd = $this->dbConnect();
			$chaineReq = "UPDATE " . $tabbill . "SET BIL_TITRE = :BIL_TITRE, SET BIL_DAT_MOD = :BIL_DAT_MOD, SET BIL_TXT = :BIL_TXT, SET BIL_DAT_VISU = :BIL_DAT_VISU WHERE BIL_ID = :BIL_ID";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(':BIL_TITRE   ', $BIL_TITRE    ,
								':BIL_ID      ', $BIL_ID       ,
								':BIL_DAT_MOD ', $BIL_DAT_MOD  ,
								':BIL_TXT     ', $BIL_TXT      ,
								':BIL_DAT_VISU', $BIL_DAT_VISU ,
								PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}			
	}