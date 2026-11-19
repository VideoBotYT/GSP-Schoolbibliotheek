<?php
// 4 parameters om een connection te kunne maken
$host = "localhost"; //server -> url/IP-address
$dbname = "schoolbib"; //database
$user = "root"; //local server
$pass = ""; //default, eventueel aanpassen

//databasehosting
$dbh = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

//probeer een verbinding te maken
try{
    $connection = new PDO($dbh, $user, $pass);
    //extra attributes aan de connection toevoegen om meer info te krijgen bij errors
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Connection failed: " . $e->getMessage());
}
?>