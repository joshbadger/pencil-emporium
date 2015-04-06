<?php
  class Pencil{
    //db connection
    private $conn;
    private $table_name = "pencils";

    //object properties
    public $id;
    public $name;

    function __construct($db_link){
      $this->conn = $db_link;
    }

    function create(){
      $query = "INSERT INTO $this->table_name SET name = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(1, $this->name);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }

    function all(){
      $query = "SELECT id, name, votes FROM $this->table_name ORDER BY votes DESC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }
  }
?>
