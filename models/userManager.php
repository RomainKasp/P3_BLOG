<?php
	namespace models;

	class userManager extends databaseManager
	{
		public $util;
		function __construct($params){
			$this->util	= $params['utilisateur'];
		}	
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
		        $this->util->setIdentifiant($donnees['UTI_ID']);
		        $this->util->setNom($donnees['UTI_NOM']);
		        $this->util->setPassCrypt($donnees['UTI_PSW']);
		        $this->util->setDateCreation($donnees['UTI_DAT_CRE']);
		        $this->util->setDateFinDroit($donnees['UTI_DAT_FIN']);
		        $this->util->setMail($donnees['UTI_MAIL']);
				$tab[$ind] = $this->util;	
			}			
			$tab[0] = $ind;
			
			return $tab;			
		}
	}