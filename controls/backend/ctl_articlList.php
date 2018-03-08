<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$vignettes = $page->getlistArticl();
	
	// visuels
	REQUIRE("../view/backend/crud_post/view_articList.php");
