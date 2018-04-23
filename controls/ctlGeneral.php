<?php
	namespace controls;
	require_once("../controls/ctlFrontBillets.php"); 
	require_once("../controls/ctlBackBillets.php"); 
	class ctlGeneral
	{
		/***************************************************************
		* Fonctions publique                                           *
		***************************************************************/		
		/**
		* Redirige vers le controleur associer au menu et sa fonction
		**/
		public function lanceur(){	
			if (isset($_GET['page']))
				$page = @$_GET['page']; 
			else 
				$page = "home";
	
			switch($page){
				case "home";  
					$ctlFrtBil = new ctlFrontBillets();
					$ctlFrtBil -> acceuil();
					break;    
				case "about";  
					$ctlFrtBil = new ctlFrontBillets();
					$ctlFrtBil -> auteur();
					break;      
				case "latest";  
					$ctlFrtBil = new ctlFrontBillets();
					$ctlFrtBil -> nouveautes();
					break;          
				case "summary";  
					$ctlFrtBil = new ctlFrontBillets();
					$ctlFrtBil -> sommaire();
					break;    
				case "chapitre";  
					$ctlFrtBil = new ctlFrontBillets();
					$ctlFrtBil -> chapitre();
					break;    
				case "commentaire";   
					$ctlComment = new ctlCommentaires();
					$ctlComment -> commentaireAction();     
					break;     
				case "access";  
					$aut = $this->securiseAdministrateur();
					$this->adminPanel($aut); 
					break;  		
			}
		}			
		
		/***************************************************************
		* Fonctions privées                                            *
		***************************************************************/	
		/**
		* Redirige vers le controleur associer au menu et sa fonction
		**/
		private function adminPanel($authentification){
			if ($authentification){
				switch(@$_GET['admin']){
					case "connect";  
						require("../view/backend/view_home.php");     
						break;    	
					case "home";  
						require("../view/backend/view_home.php");  
						break;     	
					case "articl";  
						$ctlBckBil = new ctlBackBillets();
						$ctlBckBil -> listerChapitre(); 
						break;     	
					case "pagesA";  
						$ctlBckBil = new ctlBackBillets();
						$ctlBckBil -> listerPage(); 
						break;      	
					case "commen";  
						$ctlComment = new ctlCommentaires();
						$ctlComment -> listerReportComm(); 
						break;      	
					case "createArt";  
						$ctlBckBil = new ctlBackBillets();
						$ctlBckBil -> creerChapitre(); 
						break;      	
					case "updateArt";  
						$ctlBckBil = new ctlBackBillets();
						$ctlBckBil -> modifierChapitre();  
						break;      	
					case "updatePag";  
						$ctlBckBil = new ctlBackBillets();
						$ctlBckBil -> modifierPage();  
						break;   	
					case "billet";  
						$ctlBckBil = new ctlBackBillets();
						$ctlBckBil -> actionPage();	
						break;
					case "disconnect";  
						session_destroy();
						session_start();
						$token = $this->creerToken();
						require("../view/backend/crud_user/view_userConnect.php");   
						break;    		

					default;
						require("../view/backend/view_home.php"); 
						break;
				}
			}else{
				$token = $this->creerToken();
				require("../view/backend/crud_user/view_userConnect.php");   
			}
		}			
		
		/**
		* Contrôle de la securité pour la partie administrateur
		**/
		private function securiseAdministrateur(){
			if (!isset($_SESSION['startSess'])){
			
				// si formulaire de connexion remplis on essaye de consulter la base
				if (isset($_POST['idCoUtil']) AND isset($_POST['pswCoUtil'])){
					if (isset($_SESSION['token'])) $token = $_SESSION['token'];
					else $token ="noTokenAllowed";
					if ($_POST['tok'] == $token){
						require ("../models/user.php");
						$user      		= new \models\user();
						$authentified 	= $user->connectUsr($_POST['idCoUtil'], $_POST['pswCoUtil']);
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
		private function creerToken(){
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