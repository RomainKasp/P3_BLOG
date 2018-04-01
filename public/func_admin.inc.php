<?php
$menu1 = " "; $menu2 = " "; $menu3 = " "; $menu4 = " ";

$page = @$_GET['admin']; 
switch($page){
	case "connect";  
		$content2 = "../controls/backend/ctl_connect.php";  
		break;    	
	case "home";  
		$content2 = "../view/backend/view_home.php";  
		break;     	
	case "articl";  
		$content2 = "../controls/backend/ctl_articlList.php";  
		break;     	
	case "pagesA";  
		$content2 = "../controls/backend/ctl_pageList.php";  
		break;      	
	case "commen";  
		$content2 = "../controls/backend/ctl_commen.php";  
		break;    		

	//////////////////////////////////////////////////////////////////////////////////////////
	// Si la page n'est pas referencer alors
    default;
		$content2 = "../controls/backend/ctl_connect.php";  
		break;
}