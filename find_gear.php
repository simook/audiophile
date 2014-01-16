<?php 
require_once('lib/simple_html_dom.php');
require_once('db.php');
require_once('lib/sdk-1.5.10/sdk.class.php');
 
class FindGear {

	
	function uploadImage($source,$url,$image_name){
   $image = file_get_contents($url.'/'.$image_name);	  
	  $bucket = 'audiophile';
	  $s3 = new AmazonS3();
	  $s3->disable_ssl();
   $s3->disable_ssl_verification();	  
	  $path = $source.'/'.$image_name;
	  $response = $s3->create_object($bucket, $path, array(
     'body'  => $image,
     'acl'   =>  AmazonS3::ACL_PUBLIC
   ));
	}
	
	function Save($args){
	  
	}

	function addGear($company,$companyUrl,$product,$image,$info,$price,$category,$purchase,$product_id){
		global $mysqli;
		$date = date('Y-m-d');		
		$dateAdded = $date;
		$active = 1;
		if(isset($product_id)){		
			$all_query_ok = true;			
			$mysqli->query("
     		INSERT INTO gear
     		    (company,company_url,product,image,info,price,category,purchase,date_added,active,product_id)
     		VALUES
     		    ('$company','$companyUrl','$product','$image','$info','$price','$category','$purchase','$dateAdded','$active','$product_id')
     		ON DUPLICATE KEY UPDATE
     		    company='$company',
     		    company_url='$companyUrl',
     		    product='$product',
     		    image='$image',
     		    info='$info',
     		    price='$price',
     		    category='$category',
     		    purchase='$purchase',
     		    date_updated='$date'
			") ? null : $all_query_ok=false;
			$all_query_ok ? $mysqli->commit() : $mysqli->rollback();
			
		}			
	} 
		
	function echohifi(){
		$echohifi = file_get_html('http://echohifi.com/inventory.php');
		foreach($echohifi->find('table.items_table tbody') as $table) {
			foreach($table->find('tr') as $gear) {  	  	
  	  	$company = 'Echo Audio';
  	  	$companyUrl = 'http://echohifi.com';
  	  	$product = strip_tags($gear->find('h4.prod_name', 0)->plaintext);
  	  	$image = str_replace('/images/product/','',strip_tags($gear->find('a[rel=lightbox]', 0)->href));
  	  	$info = strip_tags($gear->find('p.prod_desc', 0)->plaintext);
  	   $price = strip_tags($gear->find('td.echo_price', 0)->plaintext);
  	   $purchase = $gear->find('td a[href^=/purchase.php]',0)->href;
  	  	$product_id = str_replace('/purchase.php?addtocart=','',$purchase);
  	  	
  	  	addGear($company,$companyUrl,$product,$image,$info,$price,$category,$purchase,$product_id);

  	  	uploadImage('echoaudio','http://echohifi.com/images/product',$image);
  	  }
		}
	}
}
?>