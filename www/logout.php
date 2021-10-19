<?php
session_start();
session_destroy();
include 'resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/media/logo.png" type="image/x-icon">
    <title>Logout</title>
    <style>
        :root {
            --text-border: #ccddff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        body {
            background-color: #667899;
        }

        center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 95vh;
        }

        center h1 {
            font-weight: 600;
            font-size: 4rem;
            color: #667899;
            letter-spacing: 5px;
            text-shadow: 0 0 10px var(--text-border), 0px 2.5px 0 var(--text-border), 0px -2.5px 0 var(--text-border), 2.5px 0px 0 var(--text-border), -2.5px 0px 0 var(--text-border), 2.5px 2.5px 0 var(--text-border), -2.5px -2.5px 0 var(--text-border), -2.5px 2.5px 0 var(--text-border), 2.5px -2.5px 0 var(--text-border);
        }

        center a {
            color: white;
            padding: 1rem;
            background-color: #667899;
            border: 2px solid #ccddff;
            border-radius: 1rem;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.2rem;
            letter-spacing: 2px;
            position: relative;
            transition: all 0.06s;
        }

        center a:hover {
            top: -2px;
            box-shadow: 0px 2px 5px 0 #333;
        }

        center a:active {
            background-color: #aaccff;
            top: 0px;
            box-shadow: 0 0 0 0 #000;
            color: #667899;
        }

        center a:focus {
            outline: none;
            border: 2px solid #99aaff;
            /* color: #88aaff; */
        }
    </style>
</head>

<body>
    <center>
        <h1>Successfully Logged Out</h1>
        <br>
        <pre style="margin-top: 2rem;" class="pt-1 row" style="display: inline-block;">
            <a class="btn btn-lg text-light border border-light col me-4" href="login/login.php">Login</a> 
            <a class="btn btn-lg text-light border border-light col" onclick="window.close()">Exit</a>
        </pre>
    </center>
</body>

</html>
<?php include 'resources/jsScript.php'; ?>