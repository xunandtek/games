<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "config.php";

$submit = isset($_POST['submit']) && $_POST['submit'] ? $_POST['submit'] : '';
if($submit == "addGame") {
    $db = new Database();
    $connection = $db->getConnection();
    
    // $stored = "/assets/uploads/";
    // $imgName = basename($_FILES['file']['name']);
    // $targetPath = $stored . $imgName;
    // $imgTypes = pathinfo($targetPath,PATHINFO_EXTENSION);
    // // allows only certain Image types
    // $allowTypes = array("jpeg","jpg","png");

    // if(in_array($imgTypes, $allowTypes)) {
    //     //upload image to server
    //     if(move_uploaded_file($_FILES['file']['name'], $targetPath)) {
    //         echo "Img Uploaded";
    //         $image_insert ="
    //         INSERT INTO games
    //         (image)
    //         VALUES
    //         ();
    //         ";
    //     }
    // } else {
    //     echo "Wrong Image Format only jpeg, jpg, png allowed";
    // }

    $sql = "
    INSERT INTO gamer.games
    (title,publisher,rating,players)
    VALUES
    ('".$_POST['title']."','".$_POST['publisher']."','".$_POST['rating']."','".$_POST['players']."')
    ;";
    $result = $connection->query($sql);

    echo "<h3>Successfully added the new Title -- ".$_POST['title']."</h3>";
    wait(10);
    header("location: allGames.php");
}
?>