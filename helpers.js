$(document).on('click', '.delete-pencil', function(){

    var id = $(this).attr('delete-id');
    var q = confirm("Are you sure?");

    if (q === true){

      $.post('delete_pencil.php', {
          pencil_id: id
      }, function(){
          location.reload();
      }).fail(function() {
          alert('Rats. Your Pencil was not deleted.');
      });

    }
    return false;
});

$(document).on('click', '.upvote', function(){
    var id = $(this).attr('voted-id');

    $.post('upvote_pencil.php', {
      voted_id: id
    }, function(){
      window.location.replace('index.php');
    }).fail(function(){
      alert('Rats. Your pencil was not upvoted.');
    });
    return false;
});

$(document).on('click', '.downvote', function(){
    var id = $(this).attr('voted-id');

    $.post('downvote_pencil.php', {
      voted_id: id
    }, function(){
      window.location.replace('index.php');
    }).fail(function(){
      alert('Rats. Your pencil was not upvoted.');
    });
    return false;
});
