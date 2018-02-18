<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page = new post();
	$tab = $page->getPage(1);
	$titrePage = $tab[0];
	$contenuPage = $tab[1];
	
	// visuels
	REQUIRE("../view/frontend/view_home.php");