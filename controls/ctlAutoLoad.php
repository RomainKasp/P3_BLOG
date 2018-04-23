<?php

	class ctlAutoLoad {
		// Que faire si inconnue?
		public static function register(){
			spl_autoload_register('ctlAutoLoad::callFile');
		}
		//décomposer la class pour l'integrer 
		public static function callFile($className) {
			
			$path = "./".str_replace('\\', '/', $className). ".php";
			echo "iciiiiiiiiiiiiiiiiiiiiiiiiiiiiii" .$path;
			require $path ;
		}
	}