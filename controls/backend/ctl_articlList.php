<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$vignettes = $page->getlistArticlAdmin();
	
	// visuels
	REQUIRE("../view/backend/crud_post/view_articList.php");
