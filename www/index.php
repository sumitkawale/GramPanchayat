<?php
session_start();
session_destroy();
// if (isset($_SESSION['userLogin'])) {
// header('location: 1birth/add.php');
// } else {
header("location: login/login.php");
// }
/////////
