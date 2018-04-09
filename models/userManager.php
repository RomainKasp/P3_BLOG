<?php
	require_once("../models/databaseManager.php"); 

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
				$tab[$ind][0] = $donnees['UTI_ID'];	
				$tab[$ind][1] = $donnees['UTI_NOM'];	
				$tab[$ind][2] = $donnees['UTI_PSW'];	
				$tab[$ind][3] = $donnees['UTI_DAT_CRE'];	
				$tab[$ind][4] = $donnees['UTI_DAT_FIN'];	
				$tab[$ind][5] = $donnees['UTI_MAIL'];	
			}			
			$tab[0][0] = $ind;
			
			return $tab;			
		}
	}