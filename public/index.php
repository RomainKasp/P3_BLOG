<?php
	require("../public/func.inc.php");
	
	require("../view/frontend/template/header.php");
	require("../view/frontend/template/menu.php");
	require("../controls/ctlAutoLoad.php");
	//require("../controls/ctlGeneral.php");
	$cal = new controls\ctlAutoLoad();
	
	$dir = new controls\ctlGeneral();
	$dir -> lanceur();
	require("../view/frontend/template/footer.php");	