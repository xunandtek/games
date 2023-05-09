<!DOCTYPE html>
<html lang="en">
<head>
  <title>Games for fanatics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn btn-primary">Add Games</a>
<?php 
require_once "config.php";
?>
<form method="POST">
    <input type="text" name="srch">
    <input type="submit" name="submit" value="search">
</form>
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Publisher</th>
                <th>Ratings</th>
                <th># of players</th>
                <th>action</th>
            </tr>
            <?php 

            $db = new Database();
            $connection = $db->getConnection();
            if(isset($_POST['submit']) && $_POST['submit'] == "search"){
                $getTtitles = "select * from gamer.games where title like '%".$_POST['srch']."%'";
                $result = $connection->query($getTtitles);
                if($result->num_rows>0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
            <tr>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['publisher'] ?></td>
                <td><?php echo $row['rating'] ?></td>
                <td><?php echo $row['players'] ?></td>
                <td>
                    <button onclick="window.location.href='editGames.php?id=<?php echo $row['id']?>'" >edit</button>
                    <button onclick="window.location.href='deleteGames.php?id=<?php echo $row['id']?>'" >delete</button>
                </td>
            </tr>
                        <?php
                    }
                }
                ?>


        <?php 
            } else {

            
            $getTtitles = "select * from gamer.games";
            $result = $connection->query($getTtitles);
            if($result->num_rows>0) {
                while($row = $result->fetch_assoc()) {


            ?>
            <tr>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['publisher'] ?></td>
                <td><?php echo $row['rating'] ?></td>
                <td><?php echo $row['players'] ?></td>
                <td>
                    <button onclick="window.location.href='editGames.php?id=<?php echo $row['id']?>'" >edit</button>
                    <button onclick="window.location.href='deleteGames.php?id=<?php echo $row['id']?>'" >delete</button>
                </td>
            </tr>

            <?php
                }
                }
            }
                         ?>
        </table>   
    </div>

</body>
</html>