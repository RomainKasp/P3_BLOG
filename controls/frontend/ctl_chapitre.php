<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$idchap    = $_GET['idchap'];
	
	echo $idchap .'----------------------------------------';
	$tab           = $page->getChapitre($idchap);
	$titreChapitre = $tab[2]; 
	$contentChapite= $tab[5];
	$imgChapitre   = $tab[7];
	
	// visuels
	REQUIRE("../view/frontend/view_post.php");