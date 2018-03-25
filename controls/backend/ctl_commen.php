<?PHP
	// traitement
	REQUIRE("../models/comment.php");
	$comm      = new comment();
	$commentaires = $comm->getRprtCom();
	
	// visuels
	REQUIRE("../view/backend/crud_comment/view_comList.php");