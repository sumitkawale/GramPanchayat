<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['userLogin'])) {
        $data = $_SESSION['userLogin'];
        if (isset($_POST['checkboxes'])) {

            $value = $_POST['checkboxes'];
            // print_r($value);

            if ($value != "") {
                try {
                    require "./connection.php";

                    foreach ($value as $id) {
                        $sql = "DELETE FROM death_data_deleted WHERE id=$id";
                        $connection->exec($sql);
                        $_SESSION["deleteSuccess"] = 1;
                    }

                    echo '
                            <script> 
                                location.href="../recoverDetails.php";
                            </script>
                            ';
                } catch (PDOException $e) {
                    echo "Operation failed<br>" . $e;
                }
            } else {
                echo '
                        <script> 
                            location.href="../recoverDetails.php";
                        </script>
                        ';
            }
        } else {
            echo '
                    <script> 
                        location.href="../recoverDetails.php";
                    </script>
                    ';
        }
    } else {
        echo "<script>location.href = '/'<script>";
    }
} else {
    echo '
    <script> 
        location.href="../recoverDetails.php";
    </script>
    ';



    // if (isset($_GET['id'])) {
    //     $id = $_GET['id'];

    // } else {
    //showErr
    // }

}
