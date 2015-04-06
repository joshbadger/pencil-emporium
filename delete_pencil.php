<?php
  include_once 'models/pencil.php';
  include_once 'config/database.php';

  $database = new Database();
  $link = $database->connect();

  $pencil = new Pencil($link);
  $pencil->id = $_POST['pencil_id'];

  if($pencil->delete()){
    echo 'Your Pencil has been deleted.';
  }else{
    echo 'Rats, I was unable to delete your pencil.';
  }
?>
