<?php
class db {
  /*
   * AppFog Mysql connection
   */
  /*private $services_json = json_decode(getenv("VCAP_SERVICES"),true);
  private $mysql_config = $services_json["mysql-5.1"][0]["credentials"];  
  private $user = $mysql_config["username"];
  private $pass = $mysql_config["password"];
  private $host = $mysql_config["hostname"];
  private $port = $mysql_config["port"];
  private $database = $mysql_config["name"];*/
  private $user = 'root';
  private $pass = 'nlscom22';
  private $host = 'localhost';
  private $database = 'audiophile';
  
  private $active = false;               
  private $result = array();
  private $mysqli;
  
  public function connect() {
    if(!$this->active) {  
      $this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->database);  
      if($this->mysqli) {  
        $this->active = true;
        return true;      
      } else {
        if($this->mysqli->connect_error) {
          echo("Database connection failed:". $this->mysqli->connect_errno);
          return false;
        }
        return false;
      }
    } else {
      return true;
    }    
  }
  
  public function close() {
    if($this->active) {
      if($mysqli->close) {
        $this->active = false;
        return true;
      } else {
        return false;
      }
    }
  }

  public function query($query) {
    $result = $this->mysqli->query($query);
    if($result) {
      return true;
    } else {
      error_log($this->mysqli->error);
      return false;
    }    
  }
  
  
  public function commit($query) {
    $result = $this->mysqli->query($query);
    if($result){
      $this->mysqli->commit();
      return true;
    } else {
      $this->mysqli->rollback();
      error_log($this->mysqli ->error);
      return false;
    }
  } 
}

?>