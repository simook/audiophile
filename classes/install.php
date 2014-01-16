<?php 
  include_once('db.php');
  $db = new db();
  $db->connect();
  
  $createTable = "CREATE TABLE IF NOT EXISTS `gear` (
     `company` varchar(256) NOT NULL,
     `company_url` varchar(256) NOT NULL,
     `product` varchar(256) NOT NULL,
     `product_id` varchar(20) NOT NULL,
     `image` varchar(256) NOT NULL,
     `info` text NOT NULL,
     `price` varchar(50) NOT NULL,
     `category` varchar(128) NOT NULL,
     `purchase` varchar(128) NOT NULL,
     `date_added` date NOT NULL,
     `date_updated` date NOT NULL,
     `active` tinyint(1) NOT NULL,
     PRIMARY KEY (`product_id`)
   ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;"; 
   
   if(!$db->query("SELECT * FROM `gear`")) {
     $db->commit($createTable);
   }
   
   $db->close();
?>