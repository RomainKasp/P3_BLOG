<?php
	require_once("models/databaseManager.php"); 

	class postManager extends databaseManager
	{
		private $colonnes = " BIL_ID, UTI_ID, BIL_TITRE, BIL_DAT_CRE, BIL_DAT_MOD, BIL_TXT, BIL_DAT_VISU, BIL_EST_PAGE ";
		private $tabbill  = " billet ";
		private $frm      = " FROM ".$tabComm." B ";
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
			$bdd = dbConnect();
			$chaineReq = "SELECT" . $colonnes . $colUsr . $frm . $joinUti . "WHERE BIL_ID = :id_bil";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':id_bil', $id_bil, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}
		/**
		* Selection des 10 derniers billets
		* (pour liste des 10 derniers articles)
		**/
		protected function selectLatest($id_bil){
			$bdd = dbConnect();
			$chaineReq = "SELECT" . $colonnes . $colUsr . $frm . $joinUti . "WHERE BIL_EST_PAGE = 0 ORDER BY BIL_DAT_VISU DESC LIMIT 0,10";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}
		/**
		* Selection de tout les billets par ordre croissant de date
		* (pour sommaire)
		**/
		protected function selectAllPost(){
			$bdd = dbConnect();
			$chaineReq = "SELECT" . $colonnes . $colUsr . $frm . $joinUti . "WHERE BIL_EST_PAGE = 0 ORDER BY BIL_DAT_VISU ASC";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}
		/***************************************************************
		* Requetes de suppression                                      *
		***************************************************************/		
		/**
		* Suppression d'un article
		**/
		protected function deletePost($BIL_ID){
			$bdd = dbConnect();
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
			$bdd = dbConnect();
			$chaineReq = "INSERT INTO " . $tabbill . "(".$colonnes.") VALUES (:BIL_ID, :UTI_ID, :BIL_TITRE, :BIL_DAT_CRE, :BIL_DAT_MOD, :BIL_TXT, :BIL_DAT_VISU, :BIL_EST_PAGE)";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(:BIL_ID      , $BIL_ID       ,
								:UTI_ID      , $UTI_ID       ,
								:BIL_TITRE   , $BIL_TITRE    ,
								:BIL_DAT_CRE , $BIL_DAT_CRE  ,
								:BIL_DAT_MOD , $BIL_DAT_MOD  ,
								:BIL_TXT     , $BIL_TXT      ,
								:BIL_DAT_VISU, $BIL_DAT_VISU ,
								:BIL_EST_PAGE, $BIL_EST_PAGE ,                               
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
			$bdd = dbConnect();
			$chaineReq = "UPDATE " . $tabbill . "SET BIL_TITRE = :BIL_TITRE, SET BIL_DAT_MOD = :BIL_DAT_MOD, SET BIL_TXT = :BIL_TXT, SET BIL_DAT_VISU = :BIL_DAT_VISU WHERE BIL_ID = :BIL_ID";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(:BIL_TITRE   , $BIL_TITRE    ,
								:BIL_ID      , $BIL_ID       ,
								:BIL_DAT_MOD , $BIL_DAT_MOD  ,
								:BIL_TXT     , $BIL_TXT      ,
								:BIL_DAT_VISU, $BIL_DAT_VISU ,
								PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}			
	}