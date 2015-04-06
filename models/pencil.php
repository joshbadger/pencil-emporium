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

    function update(){
      $query = "UPDATE $this->table_name SET name = :name WHERE id = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':id', $this->id);

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

    function find(){
      $query = "SELECT name FROM $this->table_name WHERE id = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(1,$this->id);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->name = $row['name'];
    }
  }
?>
