<?php
	require_once("../models/databaseManager.php"); 

	class commentManager extends databaseManager
	{
		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/		
		/**
		* Selection des commentaires liés à un chapitre 
		**/
		protected function selectCommentPost($id_bil){
			$bdd = dbConnect();
			$chaineReq = "SELECT UTI_ID,BIL_ID,COM_ID,COM_USR,COM_MAIL,COM_TXT,COM_DAT,COM_DAT,COM_NBR_RPT,COM_ETA  FROM commentaire  BIL_ID = :id_bil";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':id_bil', $id_bil, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}
	
		/***************************************************************
		* Requetes de suppression                                      *
		***************************************************************/		
		/**
		* Suppression d'un commentaire
		**/
		protected function supprCom($id_com){
			$bdd = dbConnect();
			$chaineReq = "DELETE FROM commentaire WHERE COM_ID = :id_com";
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
		protected function insertComment($COM_USR,$COM_MAIL,$COM_TXT){
			$bdd = dbConnect();
			$chaineReq = "INSERT INTO " . $tabComm . "( COM_USR,COM_MAIL,COM_TXT,COM_DAT,COM_DAT,COM_NBR_RPT,COM_ETA) VALUES (:COM_USR,:COM_MAIL,:COM_TXT,:COM_DAT,NOW(),:COM_NBR_RPT,:COM_ETA)";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(':COM_USR'    , $COM_USR    ,
                                ':COM_MAIL'   , $COM_MAIL   ,
                                ':COM_TXT'    , $COM_TXT    ,
                                ':COM_NBR_RPT', 0           ,
                                ':COM_ETA'    , -1          );
			$requete->execute();
			
			return $requete;
		}			
	}