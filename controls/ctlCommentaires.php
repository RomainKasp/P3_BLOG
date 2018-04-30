<?php
	namespace controls;

	class ctlCommentaires
	{
		public $com;
		public $cmt;
		public $info;
		function __construct($params){
			$this->com 	= $params['Comment'];
			$this->cmt 	= $params['Commentaire'];
			$this->info	= $params['info'];
		}		
		
		/***************************************************************
		* Fonctions publique                                           *
		***************************************************************/		
		/**
		* Partie commentaire liée à un chapitre
		**/
		public function commentChapitre($idchap){
			
			//controle de l'insertion
			$this->controlInsert($idchap);
			//ajout d'un formulaire de création de commentaire
			$this->visuNewCom($idchap);
			//liste les derniers commentaires
			$this->lstComChap($idchap);
		
		}			
		/**
		* Lister les commentaires reporté
		**/
		public function listerReportComm(){
			
			$commentaires = $this->com->getRprtCom();
			
			// visuels
			require("../view/backend/crud_comment/view_comList.php");
		}	
		/**
		* Action finale sur un commentaire
		**/
		public function commentaireAction(){
			$mode 		= "backend";
			$action      = @$_GET['action']; 
			$identifiant = @$_GET['idcom'];
			
			switch($action){
				case "reset";  
					$commentaires = $this->com->resetReport($identifiant);
					break;    	
					
				case "delete";  
					$commentaires = $this->com->deleteComment($identifiant);  
					break;
					
				case "valide";  
					$commentaires = $this->com->confirmComment($identifiant); 
					break;     	
						
				default;
					$nbrReport    = @$_POST['valRprt']; 
					$mode = "frontend";
					$commentaires = $this->com->reportComment($identifiant,$nbrReport); 
					break;
			}
			
			echo $this->info->resultAff("commen", "commentaires", $commentaires, $mode);
		}		
		/***************************************************************
		* Fonctions privées                                            *
		***************************************************************/	
		/**
		* Test si il y a insertion de commentaire et envoie la demande
		**/
		private function controlInsert($idchap){
			$testNewCom =   (ISSET($_POST['newCom_ident'])) 
					&& (ISSET($_POST['newCom_mail']))  && (ISSET($_POST['newCom_txt']));
			//print_r($_POST);		
			if ($testNewCom){
				$this->cmt->setIdBillet($idchap);
				$this->cmt->setNom($_POST['newCom_ident']);
				$this->cmt->setMail($_POST['newCom_mail']);
				$this->cmt->setContenu($_POST['newCom_txt']);
				$res = $this->com->insertCom($this->cmt);
				
				if ($res > 0){
					unset($_POST['newCom_ident']);
					unset($_POST['newCom_mail']);
					unset($_POST['newCom_txt']);
				}else{
					$Com_ident = strip_tags($_POST['newCom_ident']);
					$Com_mail  = strip_tags($_POST['newCom_mail']);
					$Com_txt   = strip_tags($_POST['newCom_txt']);
				}
			}
		}	
		
		/**
		* Visu pour la création d'un formulaire de creation
		**/
		private function visuNewCom($idchap){
			
			include('..\view\frontend\template\template_commentCreate.php');
		}	
		
		/**
		* Visu des 50 derniers commentaires d'un chapitre
		**/
		private function lstComChap($idchap){
			$commentaires = $this->com->getLastCom($idchap);
				
			echo $commentaires;
		}			
		
	}