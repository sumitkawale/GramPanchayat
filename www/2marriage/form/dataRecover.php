<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['userLogin'])) {
        if (isset($_POST['checkboxes'])) {
            $value = $_POST['checkboxes'];

            if ($value != "") {
                try {
                    require "./connection.php";

                    foreach ($value as $id) {
                        //gettind data
                        $statement = $connection->prepare("SELECT * FROM marriage_data_deleted WHERE id='$id';");
                        $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                        $data = $statement->fetchAll();

                        if (count($data) != 0) {
                            $data = $data[0];

                            // saving data to variables;
                            $husbandName            = $data['husbandName'];
                            $husbandName_m          = $data['husbandName_m'];

                            $wifeName               = $data['wifeName'];
                            $wifeName_m             = $data['wifeName_m'];

                            $husbandAge             = $data['husbandAge'];
                            $wifeAge                = $data['wifeAge'];

                            $husbandAadharNo        = $data['husbandAadharNo'];
                            $wifeAadharNo           = $data['wifeAadharNo'];

                            $husbandReligion        = $data['husbandReligion'];
                            $husbandReligion_m      = $data['husbandReligion_m'];

                            $wifeReligion           = $data['wifeReligion'];
                            $wifeReligion_m         = $data['wifeReligion_m'];

                            $husbandNationality     = $data['husbandNationality'];
                            $husbandNationality_m   = $data['husbandNationality_m'];

                            $wifeNationality        = $data['wifeNationality'];
                            $wifeNationality_m      = $data['wifeNationality_m'];

                            $husbandFatherName      = $data['husbandFatherName'];
                            $husbandFatherName_m    = $data['husbandFatherName_m'];

                            $wifeFatherName         = $data['wifeFatherName'];
                            $wifeFatherName_m       = $data['wifeFatherName_m'];

                            $husbandAddress         = $data['husbandAddress'];
                            $husbandAddress_m       = $data['husbandAddress_m'];

                            $wifeAddress            = $data['wifeAddress'];
                            $wifeAddress_m          = $data['wifeAddress_m'];

                            $dateOfMarriage         = $data['dateOfMarriage'];
                            $placeOfMarriage        = $data['placeOfMarriage'];
                            $placeOfMarriage_m      = $data['placeOfMarriage_m'];

                            $dateOfRegistration     = $data['dateOfRegistration'];
                            $dateOfIssue            = $data['dateOfIssue'];

                            //insertion data to marriage_data_deleted
                            $insertQuery = "INSERT INTO marriage_data (
                                        id,
                                        husbandName,
                                        wifeName,
                                        husbandName_m,
                                        wifeName_m,
                                        husbandAge,
                                        wifeAge,
                                        husbandAadharNo,
                                        wifeAadharNo,
                                        husbandReligion,
                                        wifeReligion,
                                        husbandReligion_m,
                                        wifeReligion_m,
                                        husbandNationality,
                                        wifeNationality,
                                        husbandNationality_m,
                                        wifeNationality_m,
                                        husbandFatherName,
                                        wifeFatherName,
                                        husbandFatherName_m,
                                        wifeFatherName_m,
                                        husbandAddress,
                                        wifeAddress,
                                        husbandAddress_m,
                                        wifeAddress_m,
                                        placeOfMarriage,
                                        dateOfMarriage,
                                        placeOfMarriage_m,
                                        dateOfRegistration,
                                        dateOfIssue
                                    ) VALUES (
                                        '$id',
                                        '$husbandName',
                                        '$wifeName',
                                        '$husbandName_m',
                                        '$wifeName_m',
                                        '$husbandAge',
                                        '$wifeAge',
                                        '$husbandAadharNo',
                                        '$wifeAadharNo',
                                        '$husbandReligion',
                                        '$wifeReligion',
                                        '$husbandReligion_m',
                                        '$wifeReligion_m',
                                        '$husbandNationality',
                                        '$wifeNationality',
                                        '$husbandNationality_m',
                                        '$wifeNationality_m',
                                        '$husbandFatherName',
                                        '$wifeFatherName',
                                        '$husbandFatherName_m',
                                        '$wifeFatherName_m',
                                        '$husbandAddress',
                                        '$wifeAddress',
                                        '$husbandAddress_m',
                                        '$wifeAddress_m',
                                        '$placeOfMarriage',
                                        '$dateOfMarriage',
                                        '$placeOfMarriage_m',
                                        '$dateOfRegistration',
                                        '$dateOfIssue'
                                    );";

                            $connection->exec($insertQuery);

                            $sql = "DELETE FROM marriage_data_deleted WHERE id=$id";
                            $connection->exec($sql);
                            $_SESSION["recoverSuccess"] = 1;
                        }
                        echo '
                                    <script> 
                                        location.href="../recoverDetails.php";
                                    </script>
                                ';
                    }
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
