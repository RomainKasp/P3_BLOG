<?php
	namespace misc;
	class routerViews
	{
		/***************************************************************
		* Fonctions publique                                           *
		***************************************************************/		
		public function formulaireConnexion($token){	
			require("../view/backend/crud_user/view_userConnect.php");
		}	
		public function adminHome(){	
			require("../view/backend/view_home.php");
		}	
	}