<?PHP
	// traitement
	REQUIRE("../models/post.php");
	$page      = new post();
	$idpage    = $_GET['id'];
	$tab       = $page->getPage($idpage);
	$titreChap = $tab[0];
	$txtChap   = $tab[1];
	// visuels
	REQUIRE("../view/backend/crud_post/view_pageModify.php");
