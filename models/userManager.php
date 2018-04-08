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
			$requete   = $bdd->prepare("SELECT UTI_ID, UTI_NOM, UTI_PSW, UTI_DAT_CRE, UTI_DAT_FIN, UTI_MAIL FROM utilisateur WHERE UTI_ID = :id_uti");
			$requete->bindValue(':id_uti', $id_uti);
			$requete->execute();
			
			while ($donnees = $requete->fetch()){
				$ind++;
				$tab[$ind][0] = $donnees['BIL_ID'];	
				$tab[$ind][1] = $donnees['UTI_ID'];	
				$tab[$ind][2] = $donnees['BIL_TITRE'];	
				$tab[$ind][3] = $donnees['BIL_DAT_CRE'];	
				$tab[$ind][4] = $donnees['BIL_DAT_MOD'];	
				$tab[$ind][5] = $donnees['BIL_TXT'];	
				$tab[$ind][6] = $donnees['BIL_DAT_VISU'];	
				$tab[$ind][7] = $donnees['BIL_IMG'];	
			}			
			$tab[0][0] = $ind;
			
			return $tab;			
		}
	}