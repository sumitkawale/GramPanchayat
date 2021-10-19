<?php
session_start();
// getting submitted data
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $husbandName            = $_POST['husbandName'];
    $wifeName               = $_POST['wifeName'];
    $husbandName_m          = $_POST['husbandName_m'];
    $wifeName_m             = $_POST['wifeName_m'];
    $husbandAge             = $_POST['husbandAge'];
    $wifeAge                = $_POST['wifeAge'];
    $husbandAadharNo        = $_POST['husbandAadharNo'];
    $wifeAadharNo           = $_POST['wifeAadharNo'];
    $husbandReligion        = $_POST['husbandReligion'];
    $wifeReligion           = $_POST['wifeReligion'];
    $husbandReligion_m      = $_POST['husbandReligion_m'];
    $wifeReligion_m         = $_POST['wifeReligion_m'];
    $husbandNationality     = $_POST['husbandNationality'];
    $wifeNationality        = $_POST['wifeNationality'];
    $husbandNationality_m   = $_POST['husbandNationality_m'];
    $wifeNationality_m      = $_POST['wifeNationality_m'];
    $husbandFatherName      = $_POST['husbandFatherName'];
    $wifeFatherName         = $_POST['wifeFatherName'];
    $husbandFatherName_m    = $_POST['husbandFatherName_m'];
    $wifeFatherName_m       = $_POST['wifeFatherName_m'];
    $husbandAddress         = $_POST['husbandAddress'];
    $wifeAddress            = $_POST['wifeAddress'];

    if ($_POST['dateOfReg'] != "") {
        $dateOfRegistration = $_POST['dateOfReg'];
    } else {
        $dateOfRegistration = date("Y-m-j");
    }

    if (!isset($_POST['husbandAddress_m'])) {
        if ($husbandAddress == 'Palasdeo') {
            $husbandAddress_m = 'पळसदेव';
        } else if ($husbandAddress == 'Bandewadi') {
            $husbandAddress_m = 'बांडेवाडी';
        } else if ($husbandAddress == 'Kalewadi') {
            $husbandAddress_m = 'काळेवाडी';
        } else if ($husbandAddress == 'Malewadi') {
            $husbandAddress_m = 'माळेवाडी';
        } else {
            $husbandAddress_m = '';
        }
    } else {
        $husbandAddress_m = $_POST['husbandAddress_m'];
    }
    $wifeAddress_m          = $_POST['wifeAddress_m'];
    $placeOfMarriage        = $_POST['placeOfMarriage'];
    $dateOfMarriage         = $_POST['dateOfMarriage'];
    $placeOfMarriage_m      = $_POST['placeOfMarriage_m'];

    require "./connection.php";

    $insertQuery = "INSERT INTO marriage_data (
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
        dateOfRegistration
    ) VALUES (
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
        '$dateOfRegistration'
    );";

    $idQuery = $connection->prepare("SELECT id FROM marriage_data ORDER BY id DESC LIMIT 1");

    try {
        $connection->exec($insertQuery);
        $idQuery->execute();
        $idQuery->setFetchMode(PDO::FETCH_ASSOC);
        $data = $idQuery->fetchAll();
        $data = $data[0];
        $id = (int)$data['id'];
    } catch (PDOException $e) {
        // echo "operation failed";
    }
    if (isset($_POST['print'])) {
?>
        <script>
            location.href = "../../print/marriage.php?id=" + <? echo "$id" ?>
        </script>
    <?php

    } else {
        $_SESSION["saveSuccess"] = 1;
    ?>
        <script>
            location.href = "../add.php"
        </script>
<?php
    }
}
