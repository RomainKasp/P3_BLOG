<?php
	namespace entities;
	class commentaire
	{
        private $identifiant;  
        private $idBillet; 
        private $nom; 
        private $email; 
        private $contenu; 
        private $datePost; 
        private $heurePost; 
        private $nbrReport; 
        private $etat;
		
		// Getters
		public function getIdentifiant(){
			return $this->identifiant;
		}
		public function getIdBillet(){
			return $this->idBillet;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getMail(){
			return $this->email;
		}
		public function getContenu(){
			return $this->contenu;
		}
		public function getDatePost(){
			return $this->datePost;
		}
		public function getNbrReport(){
			return $this->nbrReport;
		}
		public function getEtat(){
			return $this->etat;
		}
		public function getHeurePost(){
			return $this->heurePost;
		}
		
		// Setters
		public function setIdentifiant($param){
			$this->identifiant = $param;
		}	
		public function setIdBillet($param){
			 $this->idBillet = $param;
		}
		public function setNom($param){
			 $this->nom = $param;
		}
		public function setMail($param){
			 $this->email = $param;
		}
		public function setContenu($param){
			 $this->contenu = $param;
		}
		public function setDatePost($param){
			 $this->datePost = $param;
		}
		public function setNbrReport($param){
			 $this->nbrReport = $param;
		}
		public function setEtat($param){
			 $this->etat = $param;
		}	
		public function setHeurePost($param){
			 $this->heurePost = $param;
		}	
	}