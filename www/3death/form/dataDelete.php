<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['typePassword'])) {
        $typePassword = $_POST['typePassword'];
        if (isset($_SESSION['userLogin'])) {
            $data = $_SESSION['userLogin'];
            $data = json_decode($data);
            $data = json_decode($data);
            if (!password_verify($typePassword, $data->password)) {
                $_SESSION["deleteSuccess"] = 2;
                echo '
                <script> 
                    location.href="../deleteDetails.php";
                </script>
                ';
            } else {
                if (isset($_POST['checkboxes'])) {
                    $value = $_POST['checkboxes'];

                    if ($value != "") {
                        try {
                            require "./connection.php";

                            foreach ($value as $id) {
                                //gettind data
                                $statement = $connection->prepare("SELECT * FROM death_data WHERE id='$id';");
                                $statement->execute();
                                $statement->setFetchMode(PDO::FETCH_ASSOC);
                                $data = $statement->fetchAll();

                                if (count($data) != 0) {
                                    $data = $data[0];

                                    // saving data to variables;
                                    $id                           = $data['id'];
                                    $name                         = $data['name'];
                                    $name_m                       = $data['name_m'];
                                    $sex                          = $data['sex'];
                                    $aadharNo                     = $data['aadharNo'];
                                    $dateOfDeath                  = $data['dateOfDeath'];
                                    $placeOfDeath                 = $data['placeOfDeath'];
                                    $placeOfDeath_m               = $data['placeOfDeath_m'];
                                    $age                          = $data['age'];
                                    $nameOfHusband_Wife           = $data['nameOfHusband_Wife'];
                                    $nameOfHusband_Wife_m         = $data['nameOfHusband_Wife_m'];
                                    $aadhaarOfHusband_Wife        = $data['aadhaarOfHusband_Wife'];
                                    $nameOfMother                 = $data['nameOfMother'];
                                    $nameOfMother_m               = $data['nameOfMother_m'];
                                    $nameOfFather                 = $data['nameOfFather'];
                                    $nameOfFather_m               = $data['nameOfFather_m'];
                                    $motherAadhaar                = $data['motherAadhaar'];
                                    $fatherAadhaar                = $data['fatherAadhaar'];
                                    $addressDuringDeath           = $data['addressDuringDeath'];
                                    $addressDuringDeath_m         = $data['addressDuringDeath_m'];
                                    $permanentAddressOfDeceased   = $data['permanentAddressOfDeceased'];
                                    $permanentAddressOfDeceased_m = $data['permanentAddressOfDeceased_m'];
                                    $remark                       = $data['remark'];
                                    $dateOfRegistration           = $data['dateOfRegistration'];
                                    $dateOfIssue                  = $data['dateOfIssue'];

                                    //insertion data to marriage_data_deleted
                                    $insertQuery = "INSERT into death_data_deleted(
                                        id,
                                        name, 
                                        name_m, 
                                        sex, 
                                        aadharNo, 
                                        dateOfDeath, 
                                        placeOfDeath, 
                                        placeOfDeath_m, 
                                        age, 
                                        nameOfHusband_Wife, 
                                        nameOfHusband_Wife_m, 
                                        aadhaarOfHusband_Wife, 
                                        nameOfMother, 
                                        nameOfMother_m, 
                                        nameOfFather, 
                                        nameOfFather_m, 
                                        motherAadhaar, 
                                        fatherAadhaar, 
                                        addressDuringDeath, 
                                        addressDuringDeath_m, 
                                        permanentAddressOfDeceased, 
                                        permanentAddressOfDeceased_m, 
                                        remark, 
                                        dateOfRegistration,
                                        dateOfIssue
                                    ) 
                                    VALUES(
                                        '$id',
                                        '$name', 
                                        '$name_m', 
                                        '$sex',  
                                        '$aadharNo', 
                                        '$dateOfDeath',  
                                        '$placeOfDeath', 
                                        '$placeOfDeath_m', 
                                        '$age', 
                                        '$nameOfHusband_Wife', 
                                        '$nameOfHusband_Wife_m', 
                                        '$aadhaarOfHusband_Wife', 
                                        '$nameOfMother', 
                                        '$nameOfMother_m', 
                                        '$nameOfFather', 
                                        '$nameOfFather_m', 
                                        '$motherAadhaar', 
                                        '$fatherAadhaar', 
                                        '$addressDuringDeath', 
                                        '$addressDuringDeath_m', 
                                        '$permanentAddressOfDeceased', 
                                        '$permanentAddressOfDeceased_m', 
                                        '$remark', 
                                        '$dateOfRegistration',
                                        '$dateOfIssue'
                                    );";
                                    $connection->exec($insertQuery);

                                    $sql = "DELETE FROM death_data WHERE id=$id";
                                    $connection->exec($sql);
                                    $_SESSION['deleteSuccess'] = 1;
                                }
                            }
                            echo '
                                <script> 
                                    location.href="../deleteDetails.php";
                                </script>
                            ';
                        } catch (PDOException $e) {
                            echo "Operation failed<br>" . $e;
                        }
                    } else {
                        showErr();
                    }
                } else {
                    echo '
                        <script> 
                            location.href="../deleteDetails.php";
                        </script>
                    ';
                }
            }
        } else {
            echo "<script>location.href = '/'<script>";
        }
    } else {
        echo '
            <script> 
            location.href="../deleteDetails.php";
            </script>
        ';
    }
} else {
    echo '
        <script> 
        location.href="../deleteDetails.php";
        </script>
    ';



    // if (isset($_GET['id'])) {
    //     $id = $_GET['id'];

    // } else {
    //showErr
    // }

}
