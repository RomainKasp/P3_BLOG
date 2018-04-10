<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$idchap    = $_GET['id'];
	$tab       = $page->getChapitreAdmin($idchap);
	if ($tab[0] <> false){
	   $titreChap = $tab[2];
	   $numChap   = $tab[6];
	   //$date = new DateTime($tab[8],new DateTimeZone('Paris/Europe'));
	   $dateVisu  = substr ($tab[8],0 ,10);
	   $heurVisu  = substr ($tab[8],11 ,5);
	   $txtChap   = $tab[5];
	   // visuels
	   REQUIRE("../view/backend/crud_post/view_postModify.php");
	}else{
		ECHO resultAff("articl", "articles", 0, "backend");
	}
