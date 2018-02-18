<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$tab       = $page->getPage(2);
	$titrePage = $tab[0];
	$contenuPage = $tab[1];
	if (strlen($tab[2]) > 0)
		$photoPage = "./images/articles/".$tab[2];
	else
		$photoPage = "./images/articles/NO_IMAGE.png";
	
	// visuels
	REQUIRE("../view/frontend/view_about.php");