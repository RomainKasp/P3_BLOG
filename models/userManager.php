<?php
	namespace models;
	require_once("../models/databaseManager.php"); 
	require_once("../hydratation/utilisateur.php"); 

	class userManager extends databaseManager
	{
		/***************************************************************
		* Requetes de selections                                       *
		***************************************************************/		
		/**
		* Selection d'un utilisateur via son identifiant
		**/
		protected function selectUser($id_uti){
			$ind       = 0;
			$bdd       = $this->dbConnect();
			$requete   = $bdd->prepare("SELECT UTI_ID, UTI_NOM, UTI_PSW, UTI_DAT_CRE, UTI_DAT_FIN, UTI_MAIL FROM utilisateur WHERE UTI_NOM = :id_uti");
			$requete->bindValue(':id_uti', $id_uti);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$util = new \hydratation\utilisateur();
		        $util->setIdentifiant($donnees['UTI_ID']);
		        $util->setNom($donnees['UTI_NOM']);
		        $util->setPassCrypt($donnees['UTI_PSW']);
		        $util->setDateCreation($donnees['UTI_DAT_CRE']);
		        $util->setDateFinDroit($donnees['UTI_DAT_FIN']);
		        $util->setMail($donnees['UTI_MAIL']);
				$tab[$ind] = $util;	
			}			
			$tab[0] = $ind;
			
			return $tab;			
		}
	}