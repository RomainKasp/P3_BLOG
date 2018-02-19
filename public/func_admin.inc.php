<?php
$menu1 = " "; $menu2 = " "; $menu3 = " "; $menu4 = " ";

$page = @$_GET['page2']; 
switch($page){
	case "connect";  
		$content2 = "../controls/backend/ctl_connect.php";  
		break;    		

	//////////////////////////////////////////////////////////////////////////////////////////
	// Si la page n'est pas referencer alors
    default;
		$content2 = "../controls/backend/ctl_connect.php";  
		break;
}