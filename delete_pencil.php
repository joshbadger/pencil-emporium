<?php
  include_once 'models/pencil.php';
  include_once 'config/database.php';

  $database = new Database();
  $link = $database->connect();

  $pencil = new Pencil($link);
  $pencil->id = $_POST['pencil_id'];

  $pencil->delete();
?>
