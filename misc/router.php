<?php
	namespace misc;
	class router
	{
		public $ctlFrtBil;
		public $ctlBckBil;
		public $ctlComment;
		public $secure;
		
		function __construct($params){
			$this->ctlFrtBil 	= $params['ctlFrtBil'];
			$this->ctlBckBil 	= $params['ctlBckBil'];
			$this->ctlComment 	= $params['ctlComment'];
			$this->secure 		= $params['secure'];
		}
		
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
					$this->ctlFrtBil->acceuil();
					break;    
				case "about";  
					$this->ctlFrtBil->auteur();
					break;      
				case "latest";  
					$this->ctlFrtBil->nouveautes();
					break;          
				case "summary";  
					$this->ctlFrtBil->sommaire();
					break;    
				case "chapitre";  
					$this->ctlFrtBil->chapitre();
					break;    
				case "commentaire";   
					$this->ctlComment->commentaireAction();     
					break;     
				case "access"; 
					$aut = $this->secure->securiseAdministrateur();
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
						$this->ctlBckBil->listerChapitre(); 
						break;     	
					case "pagesA";  
						$this->ctlBckBil->listerPage(); 
						break;      	
					case "commen";  
						$this->ctlComment->listerReportComm(); 
						break;      	
					case "createArt";  
						$this->ctlBckBil->creerChapitre(); 
						break;      	
					case "updateArt";  
						$this->ctlBckBil->modifierChapitre();  
						break;      	
					case "updatePag";  
						$this->ctlBckBil->modifierPage();  
						break;   	
					case "billet";  
						$this->ctlBckBil->actionPage();	
						break;
					case "disconnect";  
						session_destroy();
						session_start();
						$token = $this->secure->creerToken();
						require("../view/backend/crud_user/view_userConnect.php");   
						break;    		

					default;
						require("../view/backend/view_home.php"); 
						break;
				}
			}else{
				$token = $this->secure->creerToken();
				require("../view/backend/crud_user/view_userConnect.php");   
			}
		}						
	}