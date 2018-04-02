<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$numChap   = $page->getNewChapNumber();
	$numChapMax = $numChap; 
	$numChapMax++;
	
	// visuels
	REQUIRE("../view/backend/crud_post/view_postCreate.php");
