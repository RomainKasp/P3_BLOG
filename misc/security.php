<?php
	namespace misc;
	class security
	{			
		public $usr;
		function __construct($params){
			$this->usr	= $params['user'];
		}	
		/**
		* Contrôle de la securité pour la partie administrateur
		**/
		public function securiseAdministrateur(){
			if (!isset($_SESSION['startSess'])){
			
				// si formulaire de connexion remplis on essaye de consulter la base
				if (isset($_POST['idCoUtil']) AND isset($_POST['pswCoUtil'])){
					if (isset($_SESSION['token'])) $token = $_SESSION['token'];
					else $token ="noTokenAllowed";
					if ($_POST['tok'] == $token){
						$authentified 	= $this->usr->connectUsr($_POST['idCoUtil'], $_POST['pswCoUtil']);
					} else {
						return false;
					}
				} else {
					session_destroy();
					unset($_POST['idCoUtil']); 
					unset($_POST['pswCoUtil']);
					$authentified = false;
				}
				
				//si authentification réussie on renseigne les variables globales
				// sinon on vide toutes les infos 
				if ($authentified){
					$_SESSION['identhUsr']	= $_POST['idCoUtil'];
					$_SESSION['startSess']	= new \DateTime();
					return true;
				}else{
					return false;
				}
			}else {
				return true;
			}
		}		
		/**
		* Création d'un token
		**/
		public function creerToken(){
			$has= rand(0 , 10);
			$str[0] = "JF";
			$str[1] = "JeanF";
			$str[2] = "JForte";
			$str[3] = "ForteRoche";
			$str[4] = "JFR";
			$str[5] = "Tok";
			$str[6] = "TKN";
			$str[7] = "CDB";
			$str[8] = "ALA";
			$str[9] = "SKA";
			$str[10]= "ALASKA";
			
			$token = uniqid ($str[$has]);
			$_SESSION['token']	= $token;
			
			return $token;
		}				
	}