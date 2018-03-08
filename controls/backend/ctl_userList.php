<?PHP
	// traitement
	REQUIRE("../models/user.php");
	$page      = new user();
	$vignettes = $page->getlistUsr();
	
	// visuels
	REQUIRE("../view/backend/crud_user/view_userList.php");
	//REQUIRE("..\view\backend\crud_user\view_userList.php");