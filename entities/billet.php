<?php
	namespace entities;
	class billet
	{
		private $identifiant; 
		private $createur; 
		private $titre; 
		private $dateCreation; 
		private $dateModification;
		private $contenu;  
		private $dateVisualisation; 
		private $numeroPage;
		private $numeroChapitre;
		private $lienImage;

		// Getters
		public function  getIdentifiant(){
			return $this->identifiant;
		}	
		public function  getCreateur(){
			return $this->createur;
		}	
		public function  getTitre(){
			return $this->titre;
		}	
		public function  getDateCrea(){
			return $this->dateCreation;
		}	
		public function  getDateModif(){
			return $this->dateModification;
		}	
		public function  getContenu(){
			return $this->contenu;
		}	
		public function  getDateVisu(){
			return $this->dateVisualisation;
		}	
		public function  getNumeroPage(){
			return $this->numeroPage;
		}	
		public function  getNumeroChapitre(){
			return $this->numeroChapitre;
		}	
		public function  getLienImage(){
			return $this->lienImage;
		}
		
		// Setters
		public function  setIdentifiant($param){
			$this->identifiant = $param;
		}	
		public function  setCreateur($param){
			$this->createur = $param;
		}	
		public function  setTitre($param){
			$this->titre = $param;
		}	
		public function  setDateCrea($param){
			$this->dateCreation = $param;
		}	
		public function  setDateModif($param){
			$this->dateModification = $param;
		}	
		public function  setContenu($param){
			$this->contenu = $param;
		}	
		public function  setDateVisu($param){
			$this->dateVisualisation = $param;
		}	
		public function  setNumeroPage($param){
			$this->numeroPage = $param;
		}	
		public function  setNumeroChapitre($param){
			$this->numeroChapitre = $param;
		}	
		public function  setLienImage($param){
			$this->lienImage = $param;
		}			
	}