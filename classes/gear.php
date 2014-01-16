<?php
require_once('db.php');
require_once('simple_html_dom.php');

class Gear {
  protected $content;
  protected $array;
  protected $query;

  public function save(&$array) {
    $this->currentDate = date('Y-m-d');
    if($array){
      foreach($array as $row){
        if(!empty($row['product_id']))
          
      }
    }
    
  }
  public function info($args) {}
  public function update() {}
  public function compare() {}
  
  public function content($url) {  
    if($url === null)
      error_log('Missing URL paramenter in Gear->get()');     
    return $this->content = file_get_html($url);  
  }
  
  public function find($query) {
    if($query === null)
      error_log('Missing Query paramenter in Gear->find()');
    return $this->content->find($query);
  }
  
  public function plaintext($query) {
    return $this->content->plaintext($query);
  }
  
  public function href($query) {
    return $this->content->href($query);
  }
 
}
?>
