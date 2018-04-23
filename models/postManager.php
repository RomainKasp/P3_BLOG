<?php
	namespace models;
	require_once("../models/databaseManager.php"); 
	require_once("../hydratation/billet.php"); 
	
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
			$bil  = false;
			$requete = $bdd->prepare("SELECT BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_CHAP, BIL_IMG FROM billet WHERE BIL_DAT_VISU < current_time AND BIL_CHAP > 0 AND BIL_ID =:BIL_ID");
			$requete->bindValue(':BIL_ID', $BIL_ID);
			$requete->execute();

			while ($donnees = $requete->fetch()){
				$bil = new \hydratation\billet();
		        $bil->setIdentifiant($donnees['BIL_ID']);
		        $bil->setCreateur($donnees['UTI_ID']);
		        $bil->setTitre($donnees['BIL_TITRE']);
		        $bil->setDateCrea($donnees['BIL_DAT_CRE']);
		        $bil->setDateModif($donnees['BIL_DAT_MOD']);
		        $bil->setContenu($donnees['BIL_TXT']);
		        $bil->setDateVisu($donnees['BIL_DAT_VISU']);
		        $bil->setNumeroPage(0);
		        $bil->setNumeroChapitre($donnees['BIL_CHAP']);
		        $bil->setLienImage($donnees['BIL_IMG']);			
			}			
			
			return $bil;
		}	
		/**
		* Selection d'un chapitre sans restriction de date
		**/
		protected function selectChapAdmin($BIL_ID){
			$bdd     = $this->dbConnect();
			$bil  = false;
			$requete = $bdd->prepare("SELECT BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_CHAP, BIL_IMG FROM billet WHERE BIL_CHAP > 0 AND BIL_ID =:BIL_ID");
			$requete->bindValue(':BIL_ID', $BIL_ID);
			$requete->execute();

			while ($donnees = $requete->fetch()){
				$bil = new \hydratation\billet();
		        $bil->setIdentifiant($donnees['BIL_ID']);
		        $bil->setCreateur($donnees['UTI_ID']);
		        $bil->setTitre($donnees['BIL_TITRE']);
		        $bil->setDateCrea($donnees['BIL_DAT_CRE']);
		        $bil->setDateModif($donnees['BIL_DAT_MOD']);
		        $bil->setContenu($donnees['BIL_TXT']);
		        $bil->setDateVisu($donnees['BIL_DAT_VISU']);
		        $bil->setNumeroPage(0);
		        $bil->setNumeroChapitre($donnees['BIL_CHAP']);
		        $bil->setLienImage($donnees['BIL_IMG']);
			}			
			
			return $bil;
		}		
		/**
		* Selection d'une page 
		* (recup seulement le titre, le contenu)
		**/
		protected function selectPage($BIL_EST_PAGE){
			$bil  = false;
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("SELECT BIL_TITRE, BIL_TXT, BIL_IMG FROM billet WHERE BIL_EST_PAGE = :BIL_EST_PAGE");
			$requete->bindValue(':BIL_EST_PAGE', $BIL_EST_PAGE);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$bil = new \hydratation\billet();
				$bil->setTitre($donnees['BIL_TITRE']);
				$bil->setContenu($donnees['BIL_TXT']);
				$bil->setLienImage($donnees['BIL_IMG']);
			}
			
			return $bil;
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
				$bil = new \hydratation\billet();
		        $bil->setIdentifiant($donnees['BIL_ID']);
		        $bil->setCreateur($donnees['UTI_ID']);
		        $bil->setTitre($donnees['BIL_TITRE']);
		        $bil->setDateCrea($donnees['BIL_DAT_CRE']);
		        $bil->setDateModif($donnees['BIL_DAT_MOD']);
		        $bil->setContenu($donnees['BIL_TXT']);
		        $bil->setDateVisu($donnees['BIL_DAT_VISU']);
		        $bil->setNumeroPage($donnees['BIL_EST_PAGE']);
		        $bil->setNumeroChapitre(0);
		        $bil->setLienImage($donnees['BIL_IMG']);
				$tab[$ind] = $bil;	
			}			
			$tab[0] = $ind;
			
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
				$bil = new \hydratation\billet();
		        $bil->setIdentifiant($donnees['BIL_ID']);
		        $bil->setCreateur($donnees['UTI_ID']);
		        $bil->setTitre($donnees['BIL_TITRE']);
		        $bil->setDateCrea($donnees['BIL_DAT_CRE']);
		        $bil->setDateModif($donnees['BIL_DAT_MOD']);
		        $bil->setContenu($donnees['BIL_TXT']);
		        $bil->setDateVisu($donnees['BIL_DAT_VISU']);
		        $bil->setNumeroPage($donnees['BIL_EST_PAGE']);
		        $bil->setNumeroChapitre(0);
		        $bil->setLienImage($donnees['BIL_IMG']);
				$tab[$ind] = $bil;		
			}			
			$tab[0] = $ind;
			
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
				$bil = new \hydratation\billet();
		        $bil->setIdentifiant($donnees['BIL_ID']);
		        $bil->setCreateur($donnees['UTI_ID']);
		        $bil->setTitre($donnees['BIL_TITRE']);
		        $bil->setDateCrea($donnees['BIL_DAT_CRE']);
		        $bil->setDateModif($donnees['BIL_DAT_MOD']);
		        $bil->setContenu($donnees['BIL_TXT']);
		        $bil->setDateVisu($donnees['BIL_DAT_VISU']);
		        $bil->setNumeroPage($donnees['BIL_EST_PAGE']);
		        $bil->setNumeroChapitre(0);
		        $bil->setLienImage($donnees['BIL_IMG']);
				$tab[$ind] = $bil;		
			}			
			$tab[0] = $ind;
			
			return $tab;
		}
		/**
		* Selection de toutes les articles sans restriction de date
		* (pour gestion admin)
		**/
		protected function selectAllArticleAdmin(){
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$chaineReq = "SELECT BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_EST_PAGE,BIL_IMG FROM billet B WHERE BIL_EST_PAGE = '0' ORDER BY BIL_CHAP DESC";
			$requete   = $bdd->prepare($chaineReq);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$bil = new \hydratation\billet();
		        $bil->setIdentifiant($donnees['BIL_ID']);
		        $bil->setCreateur($donnees['UTI_ID']);
		        $bil->setTitre($donnees['BIL_TITRE']);
		        $bil->setDateCrea($donnees['BIL_DAT_CRE']);
		        $bil->setDateModif($donnees['BIL_DAT_MOD']);
		        $bil->setContenu($donnees['BIL_TXT']);
		        $bil->setDateVisu($donnees['BIL_DAT_VISU']);
		        $bil->setNumeroPage($donnees['BIL_EST_PAGE']);
		        $bil->setNumeroChapitre(0);
		        $bil->setLienImage($donnees['BIL_IMG']);
				$tab[$ind] = $bil;		
			}			
			$tab[0] = $ind;
			
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
				$bil = new \hydratation\billet();
		        $bil->setIdentifiant($donnees['BIL_ID']);
		        $bil->setCreateur($donnees['UTI_ID']);
		        $bil->setTitre($donnees['BIL_TITRE']);
		        $bil->setDateCrea($donnees['BIL_DAT_CRE']);
		        $bil->setDateModif($donnees['BIL_DAT_MOD']);
		        $bil->setContenu($donnees['BIL_TXT']);
		        $bil->setDateVisu($donnees['BIL_DAT_VISU']);
		        $bil->setNumeroPage(0);
		        $bil->setNumeroChapitre($donnees['BIL_CHAP']);
		        $bil->setLienImage($donnees['BIL_IMG']);
				$tab[$ind] = $bil;	
			}			
			$tab[0] = $ind;
			
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
		protected function supprPost($bil){
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("DELETE FROM billet WHERE BIL_ID = :BIL_ID");
            $requete->execute(array('BIL_ID'     => $bil->getIdentifiant()    ));
			$count = $requete->rowCount();
			
			return $count;
		}	
		/***************************************************************
		* Requetes d'insertion                                         *
		***************************************************************/
		/**
		* Insertion d'un article
		**/
		protected function createArticle($bil){
			$bdd       = $this->dbConnect();
			$requete = $bdd->prepare("INSERT INTO billet(BIL_TITRE, BIL_TXT, BIL_DAT_VISU, BIL_CHAP) VALUES (:BILTITRE, :BILTXT, :DATVISU, :BILCHAP)");
            $requete->execute(array('BILTITRE'   => $bil->getTitre() 	,
                                    'BILTXT'     => $bil->getContenu()   ,
                                    'DATVISU'    => $bil->getDateVisu()  ,
                                    'BILCHAP'    => $bil->getNumeroChapitre()  ));
			$count = $requete->rowCount();
			
			return $count;
		}	
		/***************************************************************
		* Requetes de modification                                     *
		***************************************************************/
		/**
		* Modification d'un article
		**/
		protected function updtPost($bil){		
			$bdd = $this->dbConnect();
			//echo 'titre'.$bil->getTitre().'txt'.$bil->getContenu().'datvisu'.$bil->getDateVisu().'numchap'.$bil->getNumeroChapitre().'idbil'.$bil->getIdentifiant(); 
			$requete = $bdd->prepare("UPDATE billet SET BIL_TITRE=:titre,BIL_DAT_MOD=CURRENT_TIMESTAMP,BIL_TXT=:txt,BIL_DAT_VISU=:datvisu,BIL_CHAP=:numchap WHERE BIL_ID = :idbil");
            $requete->execute(array('titre'     => $bil->getTitre()   , 
                                    'txt'       => $bil->getContenu()     , 
                                    'datvisu'   => $bil->getDateVisu() , 
                                    'numchap'   => $bil->getNumeroChapitre() , 
                                    'idbil'     => $bil->getIdentifiant()  ));
			$count = $requete->rowCount();
			
			return $count;		
		}
		/**
		* Modification d'une page
		**/
		protected function updtPage($bil){		
			$bdd = $this->dbConnect();
			//echo 'titre'.$bil->getTitre().'txt'.$bil->getContenu().'idbil'.$bil->getIdentifiant(); 
			$requete = $bdd->prepare("UPDATE billet SET BIL_TITRE=:titre,BIL_TXT=:txt WHERE BIL_ID = :idbil");
            $requete->execute(array('titre'     => $bil->getTitre()   , 
                                    'txt'       => $bil->getContenu()     , 
                                    'idbil'     => $bil->getIdentifiant()   ));
			$count = $requete->rowCount();
			
			return $count;		
		}			
	}