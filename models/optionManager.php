<?php
	require_once("models/databaseManager.php"); 

	class optionManager extends databaseManager
	{
		private $colonnes = " PARAM_LIB, PARAM_VAL ";
		private $tabPar  = " parametre ";
		private $frm      = " FROM ".$tabPar." P ";

		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/		
		/**
		* Selection d'un parametre via son libellé
		**/
		protected function selectPrm($PARAM_LIB){
			$bdd = dbConnect();
			$chaineReq = "SELECT" . $colonnes . $frm . "WHERE PARAM_LIB = :PARAM_LIB";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':PARAM_LIB', $PARAM_LIB, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}
		/**
		* Selection des parametres 
		**/
		protected function selectAllPrm(){
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
		* Suppression d'un parametre
		**/
		protected function deletePrm($PARAM_LIB){
			$bdd = dbConnect();
			$chaineReq = "DELETE" . $frm . "WHERE PARAM_LIB = :PARAM_LIB";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':PARAM_LIB', $PARAM_LIB, PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}	
		/***************************************************************
		* Requetes d'insertion                                         *
		***************************************************************/
		/**
		* Insertion d'un itilisateur
		**/
		protected function insertUsr($PARAM_LIB,$PARAM_VAL){
			$bdd = dbConnect();
			$chaineReq = "INSERT INTO " . $tabuti . "(".$colonnes.") VALUES (:PARAM_LIB, :PARAM_VAL)";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(:PARAM_LIB      , $PARAM_LIB      ,
								:PARAM_VAL     , $PARAM_VAL     ,                         
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
		protected function modifyUsr($PARAM_LIB,$PARAM_VAL){
			$bdd = dbConnect();
			$chaineReq = "UPDATE " . $tabuti . "SET PARAM_VAL = :PARAM_VAL WHERE PARAM_LIB = :PARAM_LIB";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(:PARAM_LIB      , $PARAM_LIB    ,
								:PARAM_VAL      , $PARAM_VAL    ,
								PDO::PARAM_STR);
			$requete->execute();
			
			return $requete;
		}			
	}