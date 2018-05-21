<?php
	namespace controls;

	class ctlCommentaires
	{
		private $com;
		private $cmt;
		private $info;
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
			$this->cmt->setIdentifiant(@$_GET['idcom']);
			
			switch($action){
				case "reset";  
					$commentaires = $this->com->resetReport($this->cmt);
					break;    	
					
				case "delete";  
					$commentaires = $this->com->deleteComment($this->cmt);  
					break;
					
				case "valide";  
					$commentaires = $this->com->confirmComment($this->cmt); 
					break;     	
						
				default;
					$this->cmt->setNbrReport(@$_POST['valRprt']);
					$mode = "frontend";
					$commentaires = $this->com->reportComment($this->cmt); 
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
			
			require('../view/frontend/template/template_commentCreate.php');
		}	
		
		/**
		* Visu des 50 derniers commentaires d'un chapitre
		**/
		private function lstComChap($idchap){
			$commentaires = $this->com->getLastCom($idchap);
				
			echo $commentaires;
		}			
		
	}