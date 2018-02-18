<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$liste     = $page->getListChap();
	
	// visuels
	REQUIRE("../view/frontend/view_summary.php");