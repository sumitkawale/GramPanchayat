<?php
session_start();
// getting submitted data
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id                     = $_POST['idToUpdate'];
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

    $insertQuery = "UPDATE marriage_data SET
        husbandName = '$husbandName',
        wifeName = '$wifeName',
        husbandName_m = '$husbandName_m',
        wifeName_m = '$wifeName_m',
        husbandAge = '$husbandAge',
        wifeAge = '$wifeAge',
        husbandAadharNo = '$husbandAadharNo',
        wifeAadharNo = '$wifeAadharNo',
        husbandReligion = '$husbandReligion',
        wifeReligion = '$wifeReligion',
        husbandReligion_m = '$husbandReligion_m',
        wifeReligion_m = '$wifeReligion_m',
        husbandNationality = '$husbandNationality',
        wifeNationality = '$wifeNationality',
        husbandNationality_m = '$husbandNationality_m',
        wifeNationality_m = '$wifeNationality_m',
        husbandFatherName = '$husbandFatherName',
        wifeFatherName = '$wifeFatherName',
        husbandFatherName_m = '$husbandFatherName_m',
        wifeFatherName_m = '$wifeFatherName_m',
        husbandAddress = '$husbandAddress',
        wifeAddress = '$wifeAddress',
        husbandAddress_m = '$husbandAddress_m',
        wifeAddress_m = '$wifeAddress_m',
        placeOfMarriage = '$placeOfMarriage',
        dateOfMarriage = '$dateOfMarriage',
        placeOfMarriage_m = '$placeOfMarriage_m',
        dateOfRegistration = '$dateOfRegistration'

        WHERE id = $id
    ";

    $idQuery = $connection->prepare("SELECT id FROM marriage_data ORDER BY id DESC LIMIT 1");

    try {
        $connection->exec($insertQuery);
        $idQuery->execute();
        $idQuery->setFetchMode(PDO::FETCH_ASSOC);
        $data = $idQuery->fetchAll();
        $data = $data[0];
        $id = (int)$data['id'];
        $_SESSION["updateSuccess"] = 1;
    } catch (PDOException $e) {
        echo "<pre>$e</pre>";
    }
?>
    <script>
        location.href = "../displayDetails.php"
    </script>
<?php
}
