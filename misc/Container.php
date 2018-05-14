<?php
	namespace misc;
	class Container{
		private $matches;
		private $matchesAdmin;
		private $configPdo;
		function __construct($params){
			$this->matches 		= $params['matches'];
			$this->matchesAdmin	= $params['matchesAdm'];
			$this->configPdo 	= $params['configPdo'];
		}
		/***************************************************************
		**                          MISC                              **
		***************************************************************/
		public function getRouter(){
			static $instance;
			if (!isset($instance)){
				$params = [	"ctlFrtBil"    	=> $this->getCtlFrontBillets(),
				           	"ctlBckBil"    	=> $this->getCtlBackBillets(),
							"ctlComment" 	=> $this->getCtlCommentaires(),
							"secure" 		=> $this->getSecurity(),
							"routerViews" 	=> $this->getRouterViews(),
							"matches" 		=> $this->matches,
							"matchesAdm" 	=> $this->matchesAdmin,
						 ];
				$instance = new \misc\router($params);
			}

			return $instance;
		}
		public function getRouterViews(){
			static $instance;
			
			if (!isset($instance)){
				$instance = new \misc\routerViews();
			}

			return $instance;
		}
		/*------------------------------------------------------------*/
		public function getSecurity(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"user"=> $this->getUser()
						 ];					
				$instance = new \misc\security($params);
			}
			return $instance;
		}	
		/*------------------------------------------------------------*/
		public function getInfo(){
			static $instance;
			
			if (!isset($instance)){
				$instance = new \misc\info();
			}
			return $instance;
		}			
		/***************************************************************
		**                        CONTROLS                            **
		***************************************************************/	
		public function getCtlCommentaires(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"Comment"    => $this->getComment(),
							"info" 		 => $this->getInfo(),
							"Commentaire"=> $this->getCommentaire()
						 ];
				$instance = new \controls\ctlCommentaires($params);
			}

			return $instance;
		}
		/*------------------------------------------------------------*/
		public function getCtlFrontBillets(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"post"  			=> $this->getPost(),
							"ctlCommentaires"	=> $this->getCtlCommentaires(),
							"info"				=> $this->getInfo()
						 ];
				$instance = new \controls\ctlFrontBillets($params);
			}

			return $instance;
		}
		/*------------------------------------------------------------*/
		public function getCtlBackBillets(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"post"  => $this->getPost(),
							"billet"=> $this->getBillet(),
							"info"	=> $this->getInfo()
						 ];
				$instance = new \controls\ctlBackBillets($params);
			}

			return $instance;
		}				
		/***************************************************************
		**                        ENTITIES                            **
		***************************************************************/
		public function getBillet(){
			static $instance;
			
			if (!isset($instance)){
				$instance = new \entities\billet();
			}

			return $instance;
		}	
		/*------------------------------------------------------------*/	
		public function getCommentaire(){
			static $instance;
			
			if (!isset($instance)){
				$instance = new \entities\commentaire();
			}

			return $instance;
		}	
		/*------------------------------------------------------------*/	
		public function getUtilisateur(){
			static $instance;
			
			if (!isset($instance)){
				$instance = new \entities\utilisateur();
			}

			return $instance;
		}	
		/***************************************************************
		**                         MODELS                             **
		***************************************************************/
		public function getPDO(){
			static $instance;
			if (!isset($instance)){
				$host  = $this->configPdo['host'];
				$db    = $this->configPdo['db'];
				$usrDb = $this->configPdo['usrDb'];                                           
				$pswDb = $this->configPdo['pswDb'];			
				$instance = new \PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $usrDb, $pswDb);
				$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			}

			return $instance;
		}	
		/*------------------------------------------------------------*/	
		public function getPost(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"connexionBDD" 	=> $this->getPDO(),
							"billet"=> $this->getBillet()
						 ];				
				$instance = new \models\post($params);
			}

			return $instance;
		}	
		/*------------------------------------------------------------*/	
		public function getComment(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"connexionBDD" 	=> $this->getPDO(),
							"commentaire"	=> $this->getCommentaire()
						 ];	
				$instance = new \models\comment($params);
			}

			return $instance;
		}	
		/*------------------------------------------------------------*/	
		public function getUser(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"connexionBDD" 	=> $this->getPDO(),
							"utilisateur"=> $this->getUtilisateur()
						 ];				
				$instance = new \models\user($params);
			}

			return $instance;
		}				
		/*------------------------------------------------------------*/	
		public function getCommentManager(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"connexionBDD" 	=> $this->getPDO(),
							"commentaire"=> $this->getCommentaire()
						 ];				
				$instance = new \models\commentManager($params);
			}

			return $instance;
		}	
		/*------------------------------------------------------------*/	
		public function getUserManager(){
			static $instance;
			
			if (!isset($instance)){
				$params = [	"connexionBDD" 	=> $this->getPDO(),
							"utilisateur"=> $this->getUtilisateur()
						 ];				
				$instance = new \models\userManager($params);
			}

			return $instance;
		}		
		/*------------------------------------------------------------*/	
		public function getPostManager(){
			static $instance;
			
			if (!isset($instance)){				 
				$params = [	"connexionBDD" 	=> $this->getPDO(),
							"billet"		=> $this->getBillet()
						 ];					
				$instance = new \models\postManager($params);
			}

			return $instance;
		}			
	}
