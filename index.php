<?php
  $page_title = 'Pencil Emporium';
  include_once 'header.php';
  include_once 'config/database.php';
?>

<div class='right-button-margin'>
  <a href='create_pencil.php' class='btn btn-default pull-right'>Create a New Pencil</a>
</div>

<?php
  $database = new Database();
  $link = $database->connect();

  include_once 'models/pencil.php';
  $pencil = new Pencil($link);
  $pencils = $pencil->all();

  if($pencils->rowCount() > 0){

    echo "<table class=\"table table-striped\">
            <thead>
              <tr>
                <td>Name</td>
                <td>Votes</td>
                <td></td>
                <td></td>
              </tr>
            </thead>
          <tbody>";

    while($pencil = $pencils->fetch(PDO::FETCH_ASSOC)){
      extract($pencil);

      echo "<tr>
              <td>$name</td>
              <td>$votes</td>
              <td>
                <a href=\"update_pencil.php?id=$id\">Edit</a> |
                <a href=\"#\">Delete</a>
                <div class=\"pull-right\">
                  <a href=\"#\">upvote</a> |
                  <a href=\"#\">downvote</a>
                </div>
              </td>
            </tr>";
    }

    echo '</tbody>
        </table>';
  }
?>

<?php include_once 'footer.php'; ?>
