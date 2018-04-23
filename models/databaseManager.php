<?php
namespace models;
class databaseManager
{
	//Gestion des connexions à la BDD
    protected function dbConnect(){
		$host  = "localhost";
		$db    = "pc3blog";
		$usrDb = "root";
		$pswDb = "";
				
        $db = new \PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $usrDb, $pswDb);
		
        return $db;
    }	
}

//Affichage selon nombre de lignes touchées par une requête (commun à chaque gestion)
function resultAff($ges, $obj, $nbrLign,$cote){
	$gestion = $ges;
	$objet   = $obj;
	
	if ($nbrLign>0)	REQUIRE("../view/".$cote."/template/template_infoSuccess.php");
	else			REQUIRE("../view/".$cote."/template/template_infoFail.php");
	
	return $result;
}	