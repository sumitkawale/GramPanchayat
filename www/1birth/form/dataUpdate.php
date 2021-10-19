<?php

session_start();

require "./connection.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id                          = $_POST['idToUpdate'];
    $name                        = $_POST['name'];
    $name_m                      = $_POST['name_m'];
    $sex                         = $_POST['sex'];
    $DOB                         = $_POST['DOB'];;
    $placeOfBirth                = $_POST['placeOfBirth'];
    $placeOfBirth_m              = $_POST['placeOfBirth_m'];
    $nameOfMother                = $_POST['nameOfMother'];
    $nameOfMother_m              = $_POST['nameOfMother_m'];
    $nameOfFather                = $_POST['nameOfFather'];
    $nameOfFather_m              = $_POST['nameOfFather_m'];
    $motherAadharNo              = $_POST['motherAadharNo'];
    $fatherAadharNo              = $_POST['fatherAadharNo'];
    $addressDuringBirth          = $_POST['addressDuringBirth'];
    $permanentAddressOfParents   = $_POST['permanentAddressOfParents'];
    $permanentAddressOfParents_m   = $_POST['permanentAddressOfParents_m'];

    if ($_POST['dateOfReg'] != "") {
        $dateOfRegistration = $_POST['dateOfReg'];
    } else {
        $dateOfRegistration = date("Y-m-j");
    }

    if (!isset($_POST['addressDuringBirth_m'])) {
        if ($addressDuringBirth == 'Palasdeo') {
            $addressDuringBirth_m = 'पळसदेव';
        } else if ($addressDuringBirth == 'Bandewadi') {
            $addressDuringBirth_m = 'बांडेवाडी';
        } else if ($addressDuringBirth == 'Kalewadi') {
            $addressDuringBirth_m = 'काळेवाडी';
        } else if ($addressDuringBirth == 'Malewadi') {
            $addressDuringBirth_m = 'माळेवाडी';
        } else {
            $addressDuringBirth_m = '';
        }
    } else {
        $addressDuringBirth_m = $_POST['addressDuringBirth_m'];
    }

    $remark                      = $_POST['remark'];


    $query = "UPDATE birth_data SET
        name = '$name',  
        name_m = '$name_m',
        sex = '$sex',
        DOB = '$DOB',
        placeOfBirth = '$placeOfBirth',
        placeOfBirth_m = '$placeOfBirth_m',
        nameOfMother = '$nameOfMother',
        nameOfMother_m = '$nameOfMother_m',
        nameOfFather = '$nameOfFather',
        nameOfFather_m = '$nameOfFather_m',
        motherAadharNo = '$motherAadharNo',
        fatherAadharNo = '$fatherAadharNo',
        addressDuringBirth = '$addressDuringBirth',
        addressDuringBirth_m = '$addressDuringBirth_m',
        permanentAddressOfParents = '$permanentAddressOfParents',
        permanentAddressOfParents_m = '$permanentAddressOfParents_m',
        remark = '$remark',
        dateOfRegistration = '$dateOfRegistration'
        
        WHERE id = $id
        ";

    $idQuery = $connection->prepare("SELECT id FROM birth_data ORDER BY id DESC LIMIT 1");
    try {
        $stm = $connection->prepare($query);
        $stm->execute();
        $idQuery->execute();
        $idQuery->setFetchMode(PDO::FETCH_ASSOC);
        $data = $idQuery->fetchAll();
        $data = $data[0];
        $id = (int)$data['id'];
        $_SESSION["updateSuccess"] = 1;
    } catch (PDOException $e) {
        // echo "operation failed";
    }

?>
    <script>
        location.href = "../displayDetails.php"
    </script>
<?php
}
