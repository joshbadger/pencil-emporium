<?php
  $page_title = 'Update Pencil';
  include_once 'header.php';

  $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID');

  //include db and object
  include_once 'models/pencil.php';
  include_once 'config/database.php';

  //get db connection
  $database = new Database();
  $link = $database->connect();

  //prep new pencil
  $pencil = new Pencil($link);

  //set id to params id
  $pencil->id = $id;

  //read details of that pencil
  $pencil->find();

  //update pencil
  if($_POST){
    $pencil->name = $_POST['name'];

    if($pencil->update()){
      echo "<div class=\"alert alert-success\">";
        echo "Your pencil has been updated.";
      echo "</div>";
    }else{
      echo "<div class=\"alert alert-danger\">";
        echo "Rats. Your pencil couldn't be updated.";
      echo "</div>";
    }
  }
?>

<div class='right-button-margin'>
  <a href='index.php' class='btn btn-default pull-right'>Show Pencils</a>
</div>

<form action="update_pencil.php?id=<?php echo $id ?>" method="post">

  <label>
    Name <input type="text" name="name" value='<?php echo $pencil->name; ?>' size=30 required>
  </label>

  <input type="submit" value="Update Pencil" class="btn btn-primary">

</form>

<?php include_once 'footer.php'; ?>
