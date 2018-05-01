<?php
	namespace models;

	class commentManager extends databaseManager
	{
		private $com;
		function __construct($params){
			$this->com	= $params['commentaire'];
			$this->connexion= $params['connexionBDD'];
		}	
		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/		
		/**
		* Selection des commentaires liés à un chapitre 
		**/
		protected function selectLastCom($id_bil){
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$requete   = $bdd->prepare("SELECT COM_ID, COM_USR, COM_MAIL, COM_TXT, date(COM_DAT) as COM_DATE,time(COM_DAT) as COM_TIME, COM_NBR_RPT, COM_ETAT FROM commentaire WHERE BIL_ID = :CHAP ORDER BY COM_DAT DESC LIMIT 0,50");
			$requete->bindValue(':CHAP', $id_bil);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$cmt= new \entities\commentaire();
				$cmt->setIdentifiant($donnees['COM_ID']);
				$cmt->setNom($donnees['COM_USR']);
				$cmt->setMail($donnees['COM_MAIL']);
				$cmt->setContenu($donnees['COM_TXT']);
				$cmt->setDatePost($donnees['COM_DATE']);	
				$cmt->setNbrReport($donnees['COM_NBR_RPT']);		
				$cmt->setEtat($donnees['COM_ETAT']);		
				$cmt->setHeurePost($donnees['COM_TIME']);	
				$tab[$ind] = $cmt;	
			}			
			$tab[0][0] = $ind;
			
			return $tab;
		}
		/**
		* Selection des commentaires reportés 
		**/
		protected function selectRprtCom(){
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$requete   = $bdd->prepare("SELECT COM_ID, COM_USR, COM_MAIL, COM_TXT, date(COM_DAT) as COM_DATE,time(COM_DAT) as COM_TIME, COM_NBR_RPT, COM_ETAT FROM commentaire WHERE COM_NBR_RPT > 0 AND COM_ETAT < 3 ORDER BY COM_NBR_RPT DESC LIMIT 0,50");
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$cmt= new \entities\commentaire();
				$cmt->setIdentifiant($donnees['COM_ID']);
				$cmt->setNom($donnees['COM_USR']);
				$cmt->setMail($donnees['COM_MAIL']);
				$cmt->setContenu($donnees['COM_TXT']);
				$cmt->setDatePost($donnees['COM_DATE']);	
				$cmt->setNbrReport($donnees['COM_NBR_RPT']);		
				$cmt->setEtat($donnees['COM_ETAT']);		
				$cmt->setHeurePost($donnees['COM_TIME']);	
				$tab[$ind] = $cmt;		
			}			
			$tab[0][0] = $ind;
			
			return $tab;
		}
	
		/***************************************************************
		* Requetes de suppression                                      *
		***************************************************************/		
		/**
		* Suppression d'un commentaire
		**/
		protected function supprCom($id_com){
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("DELETE FROM commentaire WHERE COM_ID = :id_com");
            $requete->execute(array('id_com'     => $id_com    ));
			$count = $requete->rowCount();
			
			return $count;
		}	
	
		/***************************************************************
		* Requetes de mises à jour                                     *
		***************************************************************/		
		/**
		* Report d'un commentaire
		**/
		protected function rprtComm($id_com,$nbr_Rupt){
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("UPDATE commentaire SET COM_NBR_RPT = :nbr_Rupt WHERE COM_ID = :idcom");
            $requete->execute(array('nbr_Rupt'  => $nbr_Rupt    ,
			                        'idcom'     => $id_com    ));
			$count = $requete->rowCount();
			
			return $count;
		}	
		/**
		* Remise à zero du nombre de report
		**/
		protected function resetCom($id_com){
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("UPDATE commentaire SET COM_NBR_RPT = 0 WHERE COM_ID = :idcom");
            $requete->execute(array('idcom'     => $id_com    ));
			$count = $requete->rowCount();
			
			return $count;
		}	
		/**
		* Remise à zero du nombre de report + forcer la validation
		**/
		protected function validateCom($id_com){
			$bdd = $this->dbConnect();
			$requete = $bdd->prepare("UPDATE commentaire SET COM_NBR_RPT = 0, COM_ETAT =3 WHERE COM_ID = :idcom");
            $requete->execute(array('idcom'     => $id_com    ));
			$count = $requete->rowCount();
			
			return $count;
		}	
		/***************************************************************
		* Requetes d'insertion                                         *
		***************************************************************/
		/**
		* Insertion d'un commentaire
		**/
		protected function insComm($com){
			$bdd       = $this->dbConnect();
			$requete = $bdd->prepare('INSERT INTO commentaire( BIL_ID,COM_USR,COM_MAIL,COM_TXT) VALUES (:idbill,:COMUSR,:COMMAIL,:COMTXT)');
            $requete->execute(array('idbill'    => $com->getIdBillet() 	,
			                        'COMUSR'    => $com->getNom()			,
                                    'COMMAIL'   => $com->getMail()		,
                                    'COMTXT'    => $com->getContenu()  	))
			//						or die(print_r($requete->errorInfo(), TRUE))
			                         ;
			$count = $requete->rowCount();
			
			return $count;
		}			
	}