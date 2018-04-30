<?php
	namespace entities;
	class utilisateur
	{
		private $identifiant; 
		private $nom;
		private $passCrypt;
		private $dateCreation;
		private $dateFinDroit;
		private $email; 

		// Getters
		public function getIdentifiant(){
			return $this->identifiant;
		}	
		public function  getNom(){
			return $this->nom;
		}	
		public function  getPassCrypt(){
			return $this->passCrypt;
		}	
		public function  getDateCreation(){
			return $this->dateCreation;
		}	
		public function  getDateFinDroit(){
			return $this->dateFinDroit;
		}		
		public function  getMail(){
			return $this->email;
		}	
		
		// Setters
		public function  setIdentifiant($param){
			$this->identifiant = $param;
		}		
		public function  setNom($param){
			$this->nom= $param;
		}	
		public function  setPassCrypt($param){
			$this->passCrypt = $param;
		}	
		public function  setDateCreation($param){
			$this->dateCreation = $param;
		}	
		public function  setDateFinDroit($param){
			$this->dateFinDroit = $param;
		}		
		public function  setMail($param){
			$this->email = $param;
		}		
	}