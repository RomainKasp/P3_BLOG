<?php

class databaseManager
{
	private $host  = "localhost";
	private $db    = "pc3blog";
	private $usrDb = "root";
	private $pswDb = "";
		
    protected function dbConnect()
    {
        $db = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $usrDb, $pswDb);
		
        return $db;
    }
}