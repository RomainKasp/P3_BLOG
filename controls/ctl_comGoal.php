<?PHP
	// traitement
	REQUIRE("../models/comment.php");
	$mode 		= "backend";
	$comm      	= new comment();
	$commentaires = $comm->getRprtCom();

	$action      = @$_GET['action']; 
	$identifiant = @$_GET['idcom'];
	
	switch($action){
		case "reset";  
			$commentaires = $comm->resetReport($identifiant);
			break;    	
			
		case "delete";  
			$commentaires = $comm->deleteComment($identifiant);  
			break;
			
		case "valide";  
			$commentaires = $comm->confirmComment($identifiant); 
			break;     	
				
		default;
			$nbrReport    = @$_POST['valRprt']; 
			$mode = "frontend";
			$commentaires = $comm->reportComment($identifiant,$nbrReport); 
			break;
	}
	
	ECHO resultAff("commen", "commentaires", $commentaires, $mode);