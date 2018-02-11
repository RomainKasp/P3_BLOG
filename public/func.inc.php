<?php
$menu1 = " ";

$page = @$_GET['page']; 
switch($page){
	case "home";  
		$menu1   = " class=\"active\"";
		$content = "./model/frontend/home.php";  
		$titre =  "Accueil"; 
		break;    

	//////////////////////////////////////////////////////////////////////////////////////////
	// Si la page n'est pas référencer alors
    default;
		$content = "./model/frontend/home.php";  
		$titre =  "Accueil";
		break;
}  
?>