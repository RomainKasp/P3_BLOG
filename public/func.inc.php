<?php
$menu1 = " "; $menu2 = " "; $menu3 = " "; $menu4 = " ";

$page = @$_GET['page']; 
switch($page){
	case "home";  
		$menu1   = " class=\"active\"";
		$content = "./model/frontend/mod_home.php";  
		$titre =  "Accueil"; 
		break;    
	case "about";  
		$menu2   = " class=\"active\"";
		$content = "./model/frontend/mod_about.php";  
		$titre =  "A propos de l'auteur"; 
		break;      
	case "latest";  
		$menu3   = " class=\"active\"";
		$content = "./model/frontend/mod_about.php";  
		$titre =  "Dernières parutions"; 
		break;          
	case "summary";  
		$menu4   = " class=\"active\"";
		$content = "./model/frontend/mod_summary.php";  
		$titre =  "Sommaire"; 
		break;    

	//////////////////////////////////////////////////////////////////////////////////////////
	// Si la page n'est pas référencer alors
    default;
		$content = "./model/frontend/mod_home.php";  
		$titre =  "Accueil";
		break;
}