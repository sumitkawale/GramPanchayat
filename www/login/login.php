<?php
session_start();
session_destroy();
include '../resources/cssLinks.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/media/logo.png" type="image/x-icon">
    <title>Login</title>
    <style>
        body {
            /* background: #eeddff; */
            /* background: #ddeeff; */
            /* background: #ddddff; */
            /* background: #ffdddd; */
            /* background: #eeeeff; */
            /* background: #ffddee; */
            /* background: #abcdef; */
            /* background: #ddffee; */
            /* background: #eeffdd; */
            /* background-color: #445; */
            /* background-color: #8777aa; */
            background-color: #7787aa;
        }

        @media (min-width: 750px) {
            .container {
                width: 30rem !important;
            }
        }
    </style>
</head>

<body>
    <div id="alert-area"></div>
    <div class="container mt-5 bg-light p-5 rounded shadow shadow-lg" style="margin-top: 10rem !important;">
        <center>
            <h2 style="color:#6787aa">LOGIN</h2>
        </center>
        <hr>
        <div class="mt-4"></div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control" name="username" id="username" />
            <label style="color:#6787aa" class="form-label" for="username">Username</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" class="form-control" name="password" id="password" />
            <label style="color:#6787aa" class="form-label" for="password">Password</label>
        </div>
        <center>
            <button style="background:#6787aa; zoom:1.1" type="submit" class="btn text-light w-100" id="login-btn">Login</button>
        </center>
        <hr>
    </div>

    <div id="testing">

    </div>
    <script src="./../resources/js/jquery.js"></script>
    <script src="./script/login.js"></script>
</body>

</html>
<?php include '../resources/jsScript.php'; ?>