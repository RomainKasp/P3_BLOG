<?php
	namespace misc;
	class router
	{
		private $matches;
		private $matchesAdmin;
		private $ctlFrtBil;
		private $ctlBckBil;
		private $ctlComment;
		private $secure;
		private $vue;
		
		function __construct($params){
			$this->matches 		= $params['matches'];
			$this->matchesAdmin	= $params['matchesAdm'];
			$this->ctlFrtBil 	= $params['ctlFrtBil'];
			$this->ctlBckBil 	= $params['ctlBckBil'];
			$this->ctlComment 	= $params['ctlComment'];
			$this->secure 		= $params['secure'];
			$this->vue	 		= $params['routerViews'];
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
		
			$controller = $this->matches[$page]['controleur'];
			$action 	= $this->matches[$page]['action'];	
				
			if ($page=="access"){ 
				$aut= $this->$controller->$action();
				$this->adminPanel($aut);
			}else{
				$this->$controller->$action();
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

				if (array_key_exists(@$_GET['admin'], $this->matchesAdmin)){
					$controller = $this->matchesAdmin[@$_GET['admin']]['controleur'];
					$action 	= $this->matchesAdmin[@$_GET['admin']]['action'];	
					$this->$controller->$action();
				}else{
					$this->vue->adminHome();
				}
			}else{
				$token = $this->secure->creerToken();
				$this->vue->formulaireConnexion($token);   
			}
		}						
	}