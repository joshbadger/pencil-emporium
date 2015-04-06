<?php

  $id = isset($_POST['voted_id']) ? $_POST['voted_id'] : die('ERROR: missing ID');

  include_once 'config/database.php';
  include_once 'models/pencil.php';

  $database = new Database();
  $link = $database->connect();

  $pencil = new Pencil($link);
  $pencil->id = $id;
  $pencil->find();

  $pencil->downVote();
?>
