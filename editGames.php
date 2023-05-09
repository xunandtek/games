<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    require_once "config.php";
    $db = new Database();
    $connection = $db->getConnection();
    $id = isset($_GET['id']) && $_GET['id'] ? $_GET['id'] : '';
?>
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
        <h3>Edit Games</h3>
        <form method="POST" enctype="multipart/form-data">
            <?php 
            $getTtitle = "SELECT * FROM gamer.games where id = '$id'";
            $getResult = $connection->query($getTtitle);
            if($getResult->num_rows>0) {
                while($rows = $getResult->fetch_assoc()) {
                    ?>
            <input type="text" name="title" placeholder="Title" class="form-control" value="<?php echo $rows['title']; ?>" >
            <input type="text" name="publisher" placeholder="Publisher" class="form-control" value="<?php echo $rows['publisher']; ?>" >
            <label for="rate">Rating between 0 and 5</label>
            <input type="text" name="rating" id="rate" placeholder="Rating" min="0" max="5" class="form-control" value='<?php echo $rows['rating']; ?>' >
            <input type="text" name="players" placeholder="\# of Players" class="form-control" value="<?php echo $rows['players'] ?>">
            <label class="form-label" for="img">Upload Title Image</label>
            <input id="img" type="file" name="image" class="form-control">
            <input type="submit" name="submit" value="edit" class="btn btn-primary">

        </form>
    </div>
    </body>
</html>

                    <?php 
                }
            }
?>

<?php 
if(isset($_POST['submit']) && $_POST['submit'] == "edit") {
    // echo 'edit title attributes';



        $updateGame = "UPDATE gamer.games SET 
        title = '".$_POST['title']."' , 
        players = '".$_POST['players']."',
        title = '".$_POST['publisher']."' , 
        rating = '".$_POST['rating']."'
        WHERE ('id' = ".$_GET['id'].");";
        $result = $connection->query($updateGame);

}
?>