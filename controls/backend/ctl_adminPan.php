<?PHP
	// traitement
	REQUIRE("./func_admin.inc.php");

	if (!isset($_SESSION['startSess'])){
		
		// si formulaire de connexion remplis on essaye de consulter la base
		if (isset($_POST['idCoUtil']) AND isset($_POST['pswCoUtil'])){
			REQUIRE("../models/user.php");
			$user      		= new user();
			$authentified 	= $user->connectUsr($identhUsr, $identhPass);
		} else{
			session_destroy();
			unset($_POST['idCoUtil']); 
			unset($_POST['pswCoUtil']);
			$authentified = false;
		}
		
		//si authentification réussie on renseigne les variables globales
		// sinon on vide toutes les infos 
		if ($authentified){
			$_SESSION['identhUsr']	= $identhUsr;
			$_SESSION['startSess']	= new DateTime();
		}else{
			$content2 = "../controls/backend/ctl_connect.php";
		}
	}
	
	//page
	REQUIRE($content2);