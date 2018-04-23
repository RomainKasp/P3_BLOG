<?php
	require("../public/func.inc.php");
	require("../view/frontend/template/header.php");
	require("../view/frontend/template/menu.php");
	require("../controls/ctlAutoLoad.php");
	
	$cal = new ctlAutoLoad();
	$cal->register();
	$dir = new controls\ctlGeneral();
	$dir -> lanceur();
	require("../view/frontend/template/footer.php");	