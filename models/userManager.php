<?php
	require_once("../models/databaseManager.php"); 

	class userManager extends databaseManager
	{
		private $colonnes = " UTI_ID, UTI_NOM, UTI_PSW, UTI_DAT_CRE, UTI_DAT_FIN, UTI_MAIL ";
		private $tabuti  = " utilisateur ";

		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/		
		/**
		* Selection d'un utilisateur via son identifiant
		**/
		protected function selectUsr($id_uti){
			$bdd = dbConnect();
			$chaineReq = "SELECT UTI_ID, UTI_NOM, UTI_PSW, UTI_DAT_CRE, UTI_DAT_FIN, UTI_MAIL FROM utilisateur WHERE UTI_ID = :id_uti";
			$requete = $bdd->prepare($chaineReq);
			$requete->bindValue(':id_uti', $id_uti);
			$requete->execute();
			
			return $requete;
		}
		/**
		* Selection des utilisateurs 
		**/
		protected function selectAllUsr(){
			$bdd       = $this->dbConnect();
			$ind       = 0;	
			$chaineReq = "SELECT UTI_ID, UTI_NOM, UTI_PSW, UTI_DAT_CRE, UTI_DAT_FIN, UTI_MAIL FROM utilisateur" ;
			$requete = $bdd->prepare($chaineReq);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$tab[$ind][0] = $donnees['UTI_ID'];	
				$tab[$ind][1] = $donnees['UTI_NOM'];	
				$tab[$ind][2] = $donnees['UTI_DAT_CRE'];	
				$tab[$ind][3] = $donnees['UTI_DAT_FIN'];	
				$tab[$ind][4] = $donnees['UTI_MAIL'];		
			}			
			$tab[0][0] = $ind;
			
			return $tab;			
			
			return $tab;			
		}
		/***************************************************************
		* Requetes d'insertion                                         *
		***************************************************************/
		/**
		* Insertion d'un itilisateur
		**/
		protected function insertUsr($UTI_ID,$UTI_NOM,$UTI_PSW,$UTI_DAT_CRE,$UTI_DAT_FIN,$UTI_MAIL){
			$bdd = dbConnect();
			$chaineReq = "INSERT INTO  utilisateur ( UTI_ID, UTI_NOM, UTI_PSW, UTI_DAT_CRE, UTI_DAT_FIN, UTI_MAIL ) VALUES (:UTI_ID, :UTI_NOM, :UTI_PSW, :UTI_DAT_CRE, :UTI_DAT_FIN, :UTI_MAIL)";
			$requete = $bdd->prepare($chaineReq);
            $requete->bindValue(':UTI_ID'      , $UTI_ID      ,
								':UTI_NOM'     , $UTI_NOM     ,
								':UTI_PSW'     , $UTI_PSW     ,
								':UTI_DAT_CRE' , $UTI_DAT_CRE ,
								':UTI_DAT_FIN' , $UTI_DAT_FIN , 
								':UTI_MAIL'    , $UTI_MAIL    );
			$requete->execute();
			
			return $requete;
		}	
		/***************************************************************
		* Requetes de modification                                     *
		***************************************************************/
		
	}