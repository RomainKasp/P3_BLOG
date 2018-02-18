<?php
	require_once("models/databaseManager.php"); 

	class commentManager extends databaseManager
	{
		private $colonnes = " UTI_ID,BIL_ID,COM_ID,COM_USR,COM_MAIL,COM_TXT,COM_DAT,COM_DAT,COM_NBR_RPT,COM_ETA ";
		private $tabComm  = " commentaire ";
		private $frmComm  = " FROM ".$tabComm." C ";
		private $joinBill = " INNER JOIN billet B ON C.BIL_ID = B.BIL_ID ";
		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/		
		/**
		* Selection des commentaires liés à un chapitre 
		**/
		protected function selectCommentPost($id_bil){
			$bdd = dbConnect();
			$chaineReq = "SELECT" . $colonnes . $frmComm . $joinBill . "WHERE BIL_ID = :id_bil";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':id_bil', $id_bil, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}
		/**
		* Selection des commentaires non validés
		*  ordonné par le nombre de report 
		**/
		protected function selectCommentnonValid(){
			$bdd = dbConnect();
			$chaineReq = "SELECT" . $colonnes . $frmComm . "WHERE COM_ETA < 2 AND COM_NBR_RPT > 0 ORDER BY COM_NBR_RPT ASC";
			$requete = $bdd->prepare($chaineReq);
			$requete->execute();
			
			return $requete;
		}		
		/***************************************************************
		* Requetes de suppression                                      *
		***************************************************************/		
		/**
		* Suppression d'un commentaire
		**/
		protected function deleteComment($id_com){
			$bdd = dbConnect();
			$chaineReq = "DELETE" . $frmComm . "WHERE COM_ID = :id_com";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':id_com', $id_com, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}	
		/***************************************************************
		* Requetes d'insertion                                         *
		***************************************************************/
		/**
		* Insertion d'un commentaire
		**/
		protected function insertComment($UTI_ID,$BIL_ID,$COM_ID,$COM_USR,$COM_MAIL,$COM_TXT,$COM_DAT,$COM_DAT,$COM_NBR_RPT,$COM_ETA){
			$bdd = dbConnect();
			$chaineReq = "INSERT INTO " . $tabComm . "(".$colonnes.") VALUES (:UTI_ID,:BIL_ID,:COM_ID,:COM_USR,:COM_MAIL,:COM_TXT,:COM_DAT,:COM_DAT,:COM_NBR_RPT,:COM_ETA)";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(':UTI_ID'     , $UTI_ID     
                                ':BIL_ID'     , $BIL_ID     
                                ':COM_ID'     , $COM_ID     
                                ':COM_USR'    , $COM_USR    
                                ':COM_MAIL'   , $COM_MAIL   
                                ':COM_TXT'    , $COM_TXT    
                                ':COM_DAT'    , $COM_DAT    
                                ':COM_DAT'    , $COM_DAT    
                                ':COM_NBR_RPT', $COM_NBR_RPT
                                ':COM_ETA'    , $COM_ETA    
                                PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}			
	}