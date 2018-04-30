<?php
	require("../public/func.inc.php");
	require("../view/frontend/template/header.php");
	require("../view/frontend/template/menu.php");
	require("../misc/autoLoad.php");
	
	$cal = new autoLoad();
	$cal->register();
	$contain = new misc\Container();
	require("../view/frontend/template/footer.php");	