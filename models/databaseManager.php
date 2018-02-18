<?php

class databaseManager
{
    protected function dbConnect(){
		$host  = "localhost";
		$db    = "pc3blog";
		$usrDb = "root";
		$pswDb = "";
				
        $db = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $usrDb, $pswDb);
		
        return $db;
    }
}