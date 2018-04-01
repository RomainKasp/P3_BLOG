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
			$idt 	= @$_GET['id'];
			$titre	= strip_tags($_POST['pTitre']);
			$pagTxt	= $_POST['pTxt'];
			
			$nbrLgn = $post->updatePage($idt, $titre, $pagTxt);
			$objetGestion = "pagesA";
			$objet		  = "pages";
			break;    	
			
		case "deleteArt";  
			$idt = @$_GET['id'];
			$nbrLgn = $post->deletePost($idt);  
			break;
			
		case "updateArt";  
			$nbrLgn = $post->updateArticle($idt,$titre, $datMod,$bilTxt, $datVisu, $numChap,$img); 
			break;     	
			
		case "createArt";  
			$nbrLgn = $post->updateArticle($idt,$titre, $datMod,$bilTxt, $datVisu, $numChap,$img); 
			break;     	
				
		default;
			$nbrLgn = 0;
			break;
	}
	
	ECHO resultAff($objetGestion, $objet, $nbrLgn, "backend");