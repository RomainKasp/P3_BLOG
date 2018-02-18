<?php
	require_once("models/databaseManager.php"); 

	class userManager extends databaseManager
	{
		private $colonnes = " UTI_ID, UTI_NOM, UTI_PSW, UTI_DAT_CRE, UTI_DAT_FIN, UTI_MAIL ";
		private $tabuti  = " utilisateur ";
		private $frm      = " FROM ".$tabuti." U ";

		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/		
		/**
		* Selection d'un itilisateur via son identifiant
		**/
		protected function selectUsr($id_uti){
			$bdd = dbConnect();
			$chaineReq = "SELECT" . $colonnes . $frm . "WHERE UTI_ID = :id_uti";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':id_uti', $id_uti, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}
		/**
		* Selection des utilisateurs 
		**/
		protected function selectAllUsr(){
			$bdd = dbConnect();
			$chaineReq = "SELECT" . $colonnes . $frm ;
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}
		/***************************************************************
		* Requetes de suppression                                      *
		***************************************************************/		
		/**
		* Suppression d'un utilisateur
		**/
		protected function deleteUsr($id_uti){
			$bdd = dbConnect();
			$chaineReq = "DELETE" . $frm . "WHERE UTI_ID = :id_uti";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':id_uti', $id_uti, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}	
		/***************************************************************
		* Requetes d'insertion                                         *
		***************************************************************/
		/**
		* Insertion d'un itilisateur
		**/
		protected function insertUsr($UTI_ID,$UTI_NOM,$UTI_PSW,$UTI_DAT_CRE,$UTI_DAT_FIN,$UTI_MAIL){
			$bdd = dbConnect();
			$chaineReq = "INSERT INTO " . $tabuti . "(".$colonnes.") VALUES (:UTI_ID, :UTI_NOM, :UTI_PSW, :UTI_DAT_CRE, :UTI_DAT_FIN, :UTI_MAIL)";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(:UTI_ID      , $UTI_ID      ,
								:UTI_NOM     , $UTI_NOM     ,
								:UTI_PSW     , $UTI_PSW     ,
								:UTI_DAT_CRE , $UTI_DAT_CRE ,
								:UTI_DAT_FIN , $UTI_DAT_FIN , 
								:UTI_MAIL    , $UTI_MAIL    ,                           
                                PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}	
		/***************************************************************
		* Requetes de modification                                     *
		***************************************************************/
		/**
		* Modification d'un itilisateur
		**/
		protected function modifyUsr($UTI_NOM,$UTI_PSW,$UTI_DAT_FIN,$UTI_MAIL){
			$bdd = dbConnect();
			$chaineReq = "UPDATE " . $tabuti . "SET UTI_NOM = :UTI_NOM, SET UTI_PSW = :UTI_PSW, SET UTI_DAT_FIN = :UTI_DAT_FIN, SET UTI_MAIL = :UTI_MAIL";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(:UTI_NOM      , $UTI_NOM    ,
								:UTI_PSW      , $UTI_PSW    ,
								:UTI_DAT_FIN  , $UTI_DAT_FIN,
								:UTI_MAIL     , $UTI_MAIL   ,
								PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}			
	}