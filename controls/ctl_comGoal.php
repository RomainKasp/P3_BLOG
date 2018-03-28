<?PHP
	// traitement
	REQUIRE("../models/comment.php");
	$comm      = new comment();
	$commentaires = $comm->getRprtCom();

$action      = @$_GET['action']; 
$identifiant = @$_GET['idcom'];
//echo $action ."/".$identifiant; 
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
		//echo $nbrReport ."/".$identifiant;
		$commentaires = $comm->reportComment($identifiant,$nbrReport); 
		break;
}