<?php
require_once 'pdoconfig.php';
 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


    // echo "Connected to $dbname at $host successfully.";

    session_start();


} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}