<?php
$connection = new PDO("sqlite:./../../database/database.db");
// set the PDO error mode to exception
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    require "../../database/database.query.php";
    try {
        $connection->exec($user_auth);
        $connection->exec($add_default_user);
    } catch (PDOException $e) {
    }
    try {
        $connection->exec($birth_data);
    } catch (PDOException $e) {
    }
    try {
        $connection->exec($marriage_data);
    } catch (PDOException $e) {
    }
    try {
        $connection->exec($death_data);
    } catch (PDOException $e) {
    }
    try {
        $connection->exec($birth_data_deleted);
    } catch (PDOException $e) {
    }
    try {
        $connection->exec($marriage_data_deleted);
    } catch (PDOException $e) {
    }
    try {
        $connection->exec($death_data_deleted);
    } catch (PDOException $e) {
    }
?>
    <?php
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>