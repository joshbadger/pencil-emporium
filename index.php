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
                <a href='update_pencil.php?id=$id' class='btn btn-success'>Edit</a>
                <a delete-id='$id' class='btn btn-danger delete-pencil'>Delete</a>
                <div class='pull-right'>
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

<script>
  $(document).on('click', '.delete-pencil', function(){

      var id = $(this).attr('delete-id');
      var q = confirm("Are you sure?");

      if (q == true){

        $.post('delete_pencil.php', {
            pencil_id: id
        }, function(data){
            location.reload();
        }).fail(function() {
            alert('Rats. Your Pencil was not deleted.');
        });

      }
      return false;
  });
</script>

<?php include_once 'footer.php'; ?>
