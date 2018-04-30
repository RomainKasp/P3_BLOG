<?php
	namespace misc;
	class info
	{			
		//Affichage selon nombre de lignes touchées par une requête (commun à chaque gestion)
		function resultAff($ges, $obj, $nbrLign,$cote){
			$gestion = $ges;
			$objet   = $obj;
			
			if ($nbrLign>0)	REQUIRE("../view/".$cote."/template/template_infoSuccess.php");
			else			REQUIRE("../view/".$cote."/template/template_infoFail.php");
			
			return $result;
		}
	}