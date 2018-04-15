<?php
	require("../public/func.inc.php");
	
	require("../view/frontend/template/header.php");
	require("../view/frontend/template/menu.php");
	require("../controls/ctlGeneral.php");
	$dir = new ctlGeneral();
	$dir -> paginationPublique();
	require("../view/frontend/template/footer.php");	