<?php

class MyDatabase
{
	public $r='12';
	static function getInstance(){
		$db=new mysqli('localhost','root','112358','newpikabu');
		return $db;
	}
	 static function UpdateQuery($query){
         $db=self::getInstance();
         $query=$db->real_escape_string($query);
         $db->query($query);
     }

     static function ReadQuery($query){
         $db=self::getInstance();
         $result=$db->query($query);
         return $result;
     }

}

?>