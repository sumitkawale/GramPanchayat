<?php
$host = 'localhost';
$db = 'grampanchayat';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $connection = new PDO($dsn, $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if($connection){
    //     echo "$db success";
    // }
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>