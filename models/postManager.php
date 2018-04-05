<?php
	require_once("../models/databaseManager.php"); 

	class postManager extends databaseManager
	{
		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/			
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
				$tab[8] = $donnees['BIL_DAT_VISU'];	
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
		/**
		* Selection du numéro de chapitre maximum 
		**/
		protected function selectLastNumChap(){
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$requete   = $bdd->prepare("SELECT MAX(BIL_CHAP) AS dernChap FROM billet");
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$result = $donnees['dernChap'];		
			}			
			
			return $result;
		}
		/***************************************************************
		* Requetes de suppression                                      *
		***************************************************************/		
		/**
		* Suppression d'un article
		**/
		protected function supprPost($BIL_ID){
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("DELETE FROM billet WHERE BIL_ID = :BIL_ID");
            $requete->execute(array('BIL_ID'     => $BIL_ID    ));
			$count = $requete->rowCount();
			
			return $count;
		}	
		/***************************************************************
		* Requetes d'insertion                                         *
		***************************************************************/
		/**
		* Insertion d'un article
		**/
		protected function createArticle($BILTITRE,$BILTXT,$DATVISU,$BILCHAP){
			$bdd       = $this->dbConnect();
			$requete = $bdd->prepare("INSERT INTO billet(BIL_TITRE, BIL_TXT, BIL_DAT_VISU, BIL_CHAP) VALUES (:BILTITRE, :BILTXT, :DATVISU, :BILCHAP)");
            $requete->execute(array('BILTITRE'   => $BILTITRE ,
                                    'BILTXT'     => $BILTXT   ,
                                    'DATVISU'    => $DATVISU  ,
                                    'BILCHAP'    => $BILCHAP  ));
			$count = $requete->rowCount();
			
			return $count;
		}	
		/***************************************************************
		* Requetes de modification                                     *
		***************************************************************/
		/**
		* Modification d'un article
		**/
		protected function updtPost($titre,$txt,$datvisu,$numchap,$idbil){		
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("UPDATE billet SET BIL_TITRE=:titre,BIL_DAT_MOD=CURRENT_TIMESTAMP,BIL_TXT=:txt,BIL_DAT_VISU=:datvisu,BIL_CHAP=:numchap WHERE BIL_ID = :idbil");
            $requete->execute(array('titre'     => $titre   , 
                                    'txt'       => $txt     , 
                                    'datvisu'   => $datvisu , 
                                    'numchap'   => $numchap , 
                                    'idbil'     => $idbil   ));
			$count = $requete->rowCount();
			
			return $count;		
		}
		/**
		* Modification d'une page
		**/
		protected function updtPage($titre,$txt,$idbil){		
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("UPDATE billet SET BIL_TITRE=:titre,BIL_TXT=:txt WHERE BIL_ID = :idbil");
            $requete->execute(array('titre'     => $titre   , 
                                    'txt'       => $txt     , 
                                    'idbil'     => $idbil   ));
			$count = $requete->rowCount();
			
			return $count;		
		}			
	}