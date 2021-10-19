<?php
$host = 'localhost';
$db = 'u183159454_grampnchaytDB';
$user = 'u183159454_shree';
$password = 'Grampanchayat@123';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $connection = new PDO($dsn, $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*if($connection){
        echo "$db success";
    }*/
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>