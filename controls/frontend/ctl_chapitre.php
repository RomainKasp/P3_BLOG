<?PHP
	// Initialisation des variables
	$Com_ident = "";
	$Com_mail  = "";
	$Com_txt   = "";
	// traitement
	REQUIRE("../models/post.php");
	REQUIRE("../models/comment.php");
	$page      = new post();
	$comm      = new comment();
	$idchap    = $_GET['idchap'];
	
	//echo $idchap .'----------------------------------------';
	$tab           = $page->getChapitre($idchap);
	$titreChapitre = $tab[2]; 
	$contentChapite= $tab[5];
	$imgChapitre   = $tab[7];
	
	// visuels
	REQUIRE("../view/frontend/view_post.php");
	
	// Partie Commentaires  
	//--- Traitement insertion commentaire
	$testNewCom =   (ISSET($_POST['newCom_ident'])) 
	           && (ISSET($_POST['newCom_mail']))  && (ISSET($_POST['newCom_txt']));
			   
	if ($testNewCom){
		$res = $comm->insertCom($idchap,$_POST['newCom_ident'],$_POST['newCom_mail'],$_POST['newCom_txt']);
		//echo 'res: '.$res;
		
		if ($res > 0){
		   unset($_POST['newCom_ident']);
		   unset($_POST['newCom_mail']);
		   unset($_POST['newCom_txt']);
		}else{
			$Com_ident = strip_tags($_POST['newCom_ident']);
			$Com_mail  = strip_tags($_POST['newCom_mail']);
			$Com_txt   = strip_tags($_POST['newCom_txt']);
		}
	}
	
	//--- Formulaire nouveau commentaires
	 include('..\view\frontend\template\template_commentCreate.php');
	 
	//--- Liste des 50 derniers commentaires
	$commentaires = $comm->getLastCom($idchap);
	
	echo $commentaires;
	
	
	