<?PHP
	// Variables
	$objetGestion = "articl";
	$objet		  = "articles";
	
	// traitement
	REQUIRE("../models/post.php");
	$post        = new post();
	$action      = @$_GET['action']; 
	
	switch($action){
		case "updatePag";  
			$idt 	= $_POST['pid'];
			$titre	= strip_tags($_POST['pTitre']);
			$pagTxt	= $_POST['pTxt'];
			
			$nbrLgn = $post->updatePage($titre,$pagTxt,$idt);
			$objetGestion = "pagesA";
			$objet		  = "pages";
			break;    	
			
		case "deleteArt";  
			$idt = @$_GET['id'];
			$nbrLgn = $post->deletePost($idt);  
			break;
			
		case "updateArt"; 
			$titre  = strip_tags($_POST['aTitre']);
			$txt    = $_POST['aTxt'];
 			$datvisu= strip_tags($_POST['aDatVis']) . " " . strip_tags($_POST['aHeuVis']).":00";
			$numchap= strip_tags($_POST['aNum']);
			$idbil  = $_POST['aid'];
			$nbrLgn = $post->updatePost($titre,$txt,$datvisu,$numchap,$idbil); 
			break;     	
			
		case "createArt";
			$titre  = strip_tags($_POST['aTitre']);
			$txt    = $_POST['aTxt'];
 			$datvisu= strip_tags($_POST['aDatVis']) . " " . strip_tags($_POST['aHeuVis']).":00";
			$numchap= strip_tags($_POST['aNum']);
			//echo $titre ."/". $txt ."/". $datvisu ."/". $numchap;
			$nbrLgn = $post->createPost($titre,$txt,$datvisu,$numchap); 
			break;     	
				
		default;
			$nbrLgn = 0;
			break;
	}
	
	ECHO resultAff($objetGestion, $objet, $nbrLgn, "backend");