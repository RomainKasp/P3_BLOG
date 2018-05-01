<?php
	require("../public/func.inc.php");
	require("../config/config.php");
	require("../view/frontend/template/header.php");
	require("../view/frontend/template/menu.php");
	require("../misc/autoLoad.php");
	
	$cal = new autoLoad();
	$cal->register();
	$contain = new misc\Container($config);
	$contain->getRouter()->lanceur();
	require("../view/frontend/template/footer.php");	