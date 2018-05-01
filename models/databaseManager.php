<?php
namespace models;
class databaseManager
{
	protected $connexion;
	
	function __construct($params){
		$this->connexion	= $params['pdo'];
	}	
	//Gestion des connexions à la BDD
    protected function dbConnect(){
        return $this->connexion;
    }	
}	