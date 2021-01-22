<?php

class Database{
  private static $instance = null;
  private $pdo, $query, $error = false, $results, $count;

  private function __construct(){
    try {
      $this->pdo = new PDO
      (
        "mysql:host=".Config::get('mysql.host').
        ";dbname=".Config::get('mysql.dbname').
        ";charset=utf8", 
        Config::get('mysql.username'), 
        Config::get('mysql.password')
      );
    } catch (PDOException $exception) {
      die($exception->getMessage());
    }
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new Database;
    }

    return self::$instance;
  }


  public function error()
  {
    return $this->error;
  }


  public function results(){
    return $this->results;
  }


  public function count(){
    return $this->count;
  }

  
  function query($sql, $params = []){
    $this->error = false;
    $this->query = $this->pdo->prepare($sql);

    if(count($params)){
      $i = 1;
      foreach($params as $param){
        $this->query->bindValue($i, $param);
        $i++;
      }
    }

    if(!$this->query->execute()){
      $this->error = true;
    }else{
      $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
      $this->count = $this->query->rowCount();
    }    

    return $this;
  }


  public function action($action, $table, $where = []){
    if(count($where) === 3){

      $operators = ['=', '<', '>', '>=', '<='];

      $field = $where[0];
      $operator = $where[1];
      $value = $where[2];

      if(in_array($operator, $operators)){
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
        if(!$this->query($sql, [$value])->error()){
          return $this;
        }
      }
    }elseif (count($where) === 0) {
      $sql = "{$action} FROM {$table}";
      if(!$this->query($sql)->error()){
        return $this;
      }
    }
    
    return false;  
  }


  // public function action_filter1($action, $table, $column1, $min, $max, $column2, $quantity){
    
  //   $sql = "{$action} FROM {$table} WHERE {$column1}>={$min} AND {$column1}<={$max} AND {$column2}>={}$quantity ?";
  //   if(!$this->query($sql)->error()){
  //     return $this;
  //   }
    
  //   return false;  
  // }


  // public function action_filter2($action, $table, $column, $quantity){
    
  //   $sql = "{$action} FROM {$table} WHERE {$column}<={$quantity}";
  //   if(!$this->query($sql)->error()){
  //     return $this;
  //   }
    
  //   return false;  
  // }


  public function get($table){
    return $this->action('SELECT *', $table);
  }


  // public function getColumn1($table, $column1, $min, $max, $column2, $quantity){
  //   return $this->action_filter1("SELECT *", $table, $column1, $min, $max, $column2, $quantity);
  // }


  // public function getColumn2($table, $column, $quantity){
  //   return $this->action_filter2("SELECT *", $table, $column, $quantity);
  // }

  public function getPrice($table,$column, $price){
    return $this->action('SELECT *', $table, [$column, '<', $price]);
  }


  public function action1($action, $table, $column, $min, $max){
    
    $sql = "{$action} FROM {$table} WHERE {$column}>={$min} AND {$column}<={$max}";
    if(!$this->query($sql)->error()){
      return $this;
    }
    
    return false;  
  }

  public function getBetweenPrice($table, $column, $min, $max){
    return $this->action1("SELECT *", $table, $column, $min, $max);
  }
}