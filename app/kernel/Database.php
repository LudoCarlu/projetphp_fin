<?php

class Database {
   static protected $_instance = null;
   protected $_db;

   static public function getInstance() {
      if( is_null(self::$_instance) )
         self::$_instance = new Database();
      return self::$_instance;
   }
   public function query($sql)
   {
	   return $this->_db->query($sql);
   }
   public function prepare($sql)
   {
	   return $this->_db->prepare($sql);
   }
		   
   protected function __construct() {
      $this->_db = new PDO(
         "mysql:host=localhost;dbname=mvc;charset=utf8",
         "",
         ""
      );
   }
}
?>
