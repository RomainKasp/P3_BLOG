<?php

	class autoLoad {
		// Que faire si inconnue?
		public static function register(){
			spl_autoload_register('autoLoad::callFile');
		}
		//décomposer la class pour l'integrer 
		public static function callFile($className) {
			
			$path = "../".str_replace('\\', '/', $className). ".php";
			
			require $path ;
		}
	}