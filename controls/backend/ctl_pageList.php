<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$vignettes = $page->getlistPage();
	
	// visuels
	REQUIRE("../view/backend/crud_post/view_pageList.php");
