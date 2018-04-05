<?PHP
	// traitement
	REQUIRE("./func_admin.inc.php");
	/*	
	// Récupération des variables à traiter
	$testConnect    = !isset($_SESSION['utiAdmin']) && !isset($_SESSION['utiPswAd']) && isset($_POST['idCoUtil']) && isset($_POST['pswCoUtil']);
	$testIdentified = isset($_SESSION['utiAdmin']) && isset($_SESSION['utiPswAd']) ;
	
	if ($testConnect){
		$utilPass = strip_tags($_POST['idCoUtil']);
		$options = ['cost' => 12];
		$passNonHash = strip_tags($_POST['pswCoUtil']);
		$passHashed = password_hash($passNonHash, PASSWORD_BCRYPT, $options);
		
		$passwordDB = 
	}else{
		//pas en cours de connexion
		if (!$testIdentified){
			//Si les sessions sont vides on force a 
			$content2 = "../controls/backend/ctl_connect.php";  
		}
	}*/
	//page
	REQUIRE($content2);