<?php 
require_once('../classes/gear.php');

$gear = new Gear;
$gear->content('http://echohifi.com/inventory.php');

foreach($gear->find('table.items_table tbody') as $tables) {
			foreach($tables->find('tr') as $table) {
			  $results[] = array(
			    'company' => 'Echo Audio',
			    'companyUrl' => 'http://echohifi.com',
			    'product' => strip_tags($table->find('h4.prod_name', 0)->plaintext),
			    'image' => str_replace('/images/product/','',strip_tags($table->find('a[rel=lightbox]', 0)->href)),
			    'info' => strip_tags($table->find('p.prod_desc', 0)->plaintext),
			    'price' => strip_tags($table->find('td.echo_price', 0)->plaintext),
			    'purchase' => $table->find('td a[href^=/purchase.php]',0)->href,
			    'product_id' => str_replace('/purchase.php?addtocart=','',$table->find('td a[href^=/purchase.php]',0)->href)
			  );			  
			  $gear->save($results);
			}

			  
} 

?>