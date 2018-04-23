<?php
	namespace models;
	require_once("../models/databaseManager.php"); 

	class commentManager extends databaseManager
	{
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
				$tab[$ind][0] = $donnees['COM_ID'];	
				$tab[$ind][1] = $donnees['COM_USR'];	
				$tab[$ind][2] = $donnees['COM_MAIL'];	
				$tab[$ind][3] = $donnees['COM_TXT'];	
				$tab[$ind][4] = $donnees['COM_DATE'];	
				$tab[$ind][5] = $donnees['COM_NBR_RPT'];	
				$tab[$ind][6] = $donnees['COM_ETAT'];	
				$tab[$ind][7] = $donnees['COM_TIME'];	
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
				$tab[$ind][0] = $donnees['COM_ID'];	
				$tab[$ind][1] = $donnees['COM_USR'];	
				$tab[$ind][2] = $donnees['COM_MAIL'];	
				$tab[$ind][3] = $donnees['COM_TXT'];	
				$tab[$ind][4] = $donnees['COM_DATE'];	
				$tab[$ind][5] = $donnees['COM_NBR_RPT'];	
				$tab[$ind][6] = $donnees['COM_ETAT'];	
				$tab[$ind][7] = $donnees['COM_TIME'];	
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
		protected function insComm($id_bill,$COM_USR,$COM_MAIL,$COM_TXT){
			$bdd       = $this->dbConnect();
			$requete = $bdd->prepare('INSERT INTO commentaire( BIL_ID,COM_USR,COM_MAIL,COM_TXT) VALUES (:idbill,:COMUSR,:COMMAIL,:COMTXT)');
            $requete->execute(array('idbill'    => $id_bill    ,
			                        'COMUSR'    => $COM_USR    ,
                                    'COMMAIL'   => $COM_MAIL   ,
                                    'COMTXT'    => $COM_TXT    ));
			$count = $requete->rowCount();
			
			return $count;
		}			
	}