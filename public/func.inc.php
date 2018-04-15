<?php
$menu1 = " "; $menu2 = " "; $menu3 = " "; $menu4 = " ";
$Tiny = false;
if (isset($_GET['page']))
	$page = @$_GET['page']; 
else 
	$page = "home";

switch($page){
	case "home";  
		$menu1   = " class=\"active\""; 
		$titre =  "Accueil"; 
		break;    
	case "about";  
		$menu2   = " class=\"active\"";
		$titre =  "A propos de l'auteur"; 
		break;      
	case "latest";  
		$menu3   = " class=\"active\"";
		$titre =  "Dernières parutions"; 
		break;          
	case "summary";  
		$menu4   = " class=\"active\"";
		$titre =  "Sommaire"; 
		break;    
	case "chapitre";  
		$titre =  "Chapitre"; 
		break;    
	case "commentaire";  
		$titre =  "Administration"; 
		break;     
	case "billet";  
		$titre =  "Administration"; 
		break;     
	case "access";  
		session_start();
		$Tiny = true;
		$titre =  "Administration"; 
		break;  
	//////////////////////////////////////////////////////////////////////////////////////////
	// Si la page n'est pas referencer alors
    default;
		header('HTTP/1.0 404 Not Found');
		exit();
		break;		
}