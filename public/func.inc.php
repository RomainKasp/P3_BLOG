<?php
$menu1 = " "; $menu2 = " "; $menu3 = " "; $menu4 = " ";

$page = @$_GET['page']; 
switch($page){
	case "home";  
		$menu1   = " class=\"active\"";
		$content = "../controls/frontend/ctl_home.php";  
		$titre =  "Accueil"; 
		break;    
	case "about";  
		$menu2   = " class=\"active\"";
		$content = "../controls/frontend/ctl_about.php";  
		$titre =  "A propos de l'auteur"; 
		break;      
	case "latest";  
		$menu3   = " class=\"active\"";
		$content = "../controls/frontend/ctl_lastest.php";  
		$titre =  "Dernières parutions"; 
		break;          
	case "summary";  
		$menu4   = " class=\"active\"";
		$content = "../controls/frontend/ctl_summary.php";  
		$titre =  "Sommaire"; 
		break;    
	case "access";  
		$content = "../controls/backend/ctl_adminPan.php";  
		$titre =  "Administration"; 
		break;  		

	//////////////////////////////////////////////////////////////////////////////////////////
	// Si la page n'est pas referencer alors
    default;
		$content = "../controls/frontend/ctl_home.php";  
		$titre =  "Accueil";
		break;
}