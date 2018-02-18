<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$vignettes = $page->getLastChap();
	
	// visuels
	REQUIRE("../view/frontend/view_lastest.php");