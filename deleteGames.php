<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "config.php";


    $db = new Database();
    $connection = $db->getConnection();

    $delGame = "DELETE FROM gamer.games WHERE ('id' = ".$_GET['id'].");";
    $result=$connection->query($delGame);
    
    wait(100);
    header("location:allGames.php");
?>