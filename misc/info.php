<?php
	namespace misc;
	class info
	{			
		//Affichage selon nombre de lignes touch�es par une requ�te (commun � chaque gestion)
		function resultAff($ges, $obj, $nbrLign,$cote){
			$gestion = $ges;
			$objet   = $obj;
			
			if ($nbrLign>0)	REQUIRE("../view/".$cote."/template/template_infoSuccess.php");
			else			REQUIRE("../view/".$cote."/template/template_infoFail.php");
			
			return $result;
		}
	}