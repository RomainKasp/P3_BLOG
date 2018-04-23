<?php
	namespace hydratation;
	class commentaire
	{
        private $identifiant;  
        private $idBillet; 
        private $nom; 
        private $email; 
        private $contenu; 
        private $datePost; 
        private $nbrReport; 
        private $etat;
		
		// Getters
		public getIdentifiant(){
			return $this->identifiant;
		}
		public getIdBillet(){
			return $this->idBillet;
		}
		public getNom(){
			return $this->nom;
		}
		public getMail(){
			return $this->email;
		}
		public getContenu(){
			return $this->contenu;
		}
		public getDatePost(){
			return $this->datePost;
		}
		public getNbrReport(){
			return $this->nbrReport;
		}
		public getEtat(){
			return $this->etat;
		}
		
		// Setters
		public setIdentifiant($param){
			$this->identifiant = $param;
		}	
		public setIdBillet($param){
			 $this->idBillet = $param;
		}
		public setNom($param){
			 $this->nom = $param;
		}
		public setMail($param){
			 $this->email = $param;
		}
		public setContenu($param){
			 $this->contenu = $param;
		}
		public setDatePost($param){
			 $this->datePost = $param;
		}
		public setNbrReport($param){
			 $this->nbrReport = $param;
		}
		public setEtat($param){
			 $this->etat = $param;
		}	
	}