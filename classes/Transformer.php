<?php

class Transformer {
  private $db;

  public function __construct(){
    $this->db = Database::getInstance();
  }


  public function get($table){
    return $this->db->get($table)->results();
  }


  // public function getColumn1($table, $column1, $min, $max, $column2, $quantity){
  //   return $this->db->getColumn1($table, $column1, $min, $max, $column2, $quantity)->results();
  // }


  // public function getColumn2($table, $column, $quantity){
  //   return $this->db->getColumn2($table, $column, $quantity)->results();
  // }


  // public function arr_col($table, $column){
  //   $col = array_column($this->getColumn($table, $column));
  //   var_dump($col);
  // }


  public function getPrice($table, $column, $price){
    return $this->db->getPrice($table, $column, $price)->results();
  }

}