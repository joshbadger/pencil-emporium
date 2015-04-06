<?php
  $page_title = 'Create a New Pencil';
  include_once 'header.php';
  include_once 'config/database.php';

  $database = new Database();
  $link = $database->connect();

  if($_POST){
    include_once 'models/pencil.php';
    $pencil = new Pencil($link);
    $pencil->name = $_POST['name'];
    if($pencil->create()){
      echo "<div class=\"alert alert-success\">";
        echo "Your pencil has been created.";
      echo "</div>";
    }else{
      echo "<div class=\"alert alert-danger\">";
        echo "Unable to create your pencil.";
      echo "</div>";
    }
  }
?>

<div class='right-button-margin'>
  <a href='index.php' class='btn btn-primary pull-right'>Show Pencils</a>
</div>


<form action="create_pencil.php" method="post">

  <label>
    Name <input type="text" name="name" required>
  </label>

  <input type="submit" value="Create Pencil" class="btn btn-primary">

</form>

<?php include_once 'footer.php'; ?>
