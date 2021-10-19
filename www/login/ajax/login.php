<?php
session_start();
// getting user entered details
$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];
if ($enteredUsername == "") {
    echo '
    <div class="alert alert-warning mb-0 alert-dismissible alert-static fade show go-up animate-hide" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: 100%; top:0; position:absolute;">
        Please Enter Username and Password !!
        <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>';
} else {
    // getting login details from database
    require "./connection.php";
    $statement = $connection->prepare("SELECT * FROM user_auth WHERE username='$enteredUsername'");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();
    if (count($data)) {
        $data = $data[0];
        if (!password_verify($enteredPassword, $data['password'])) {
        //if($enteredPassword != $data['password']){
            echo '
            <div class="alert alert-danger mb-0 alert-dismissible alert-static fade show go-up animate-hide" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: 100%; top:0; position:absolute;">
                    Please Enter Correct Username and Password.
                <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        } else {
            // saving data in array format in session using json
            $jsonArray = json_encode($data);
            $jsonArray = json_encode($jsonArray);
            $_SESSION['userLogin'] = $jsonArray;
            $_SESSION['loginSuccess'] = 1;
            echo "<script>location.href='../1birth/add.php'</script>";
        }
    } else {
        echo '
        <div class="alert alert-danger mb-0 alert-dismissible alert-static fade show go-up animate-hide" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: 100%; top:0; position:absolute;">
                Please Enter Correct Username and Password
            <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
        </div>'
        ;
    }
}
