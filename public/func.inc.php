<?php
$menu1 = " "; $menu2 = " "; $menu3 = " "; $menu4 = " ";
$Tiny = false;

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
	case "chapitre";  
		$content = "../controls/frontend/ctl_chapitre.php";  
		$titre =  "Chapitre"; 
		break;    
	case "commentaire";  
		$content = "../controls/ctl_comGoal.php";  
		$titre =  "Administration"; 
		break;     
	case "billet";  
		$content = "../controls/ctl_bilGoal.php";  
		$titre =  "Administration"; 
		break;     
	case "access";  
		$Tiny = true;
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