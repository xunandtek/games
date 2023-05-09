<!DOCTYPE html>
<html lang="en">
<head>
  <title>Games</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h3>Add Games</h3>
        <form method="POST" action="addGame.php" enctype="multipart/form-data">
            
        <input type="text" name="title" placeholder="Title" class="form-control" required>
            <input type="text" name="publisher" placeholder="Publisher" class="form-control" required>
            <label for="rate">Rating between 0 and 5</label>
            <input type="range" name="rating" id="rate" placeholder="Rating" min="0" max="5" class="form-control" required>
            <input type="text" name="players" placeholder="\# of Players" class="form-control">
            <label class="form-label" for="img">Upload Title Image</label>
            <input id="img" type="file" name="image" class="form-control">
            <input type="submit" name="submit" value="addGame" class="btn btn-primary">

        </form>
    </div>

</body>
<html>