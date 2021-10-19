<?php
session_start();
require('./connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id                           = $_POST['idToUpdate'];
    $name                         = $_POST['name'];
    $name_m                       = $_POST['name_m'];
    $sex                          = $_POST['sex'];
    $aadharNo                     = $_POST['aadharNo'];
    $dateOfDeath                  = $_POST['dateOfDeath'];
    $placeOfDeath                 = $_POST['placeOfDeath'];
    $placeOfDeath_m               = $_POST['placeOfDeath_m'];
    $age                          = $_POST['age'];
    $nameOfHusband_Wife           = $_POST['nameOfHusband_Wife'];
    $nameOfHusband_Wife_m         = $_POST['nameOfHusband_Wife_m'];
    $aadhaarOfHusband_Wife        = $_POST['aadhaarOfHusband_Wife'];
    $nameOfMother                 = $_POST['nameOfMother'];
    $nameOfMother_m               = $_POST['nameOfMother_m'];
    $nameOfFather                 = $_POST['nameOfFather'];
    $nameOfFather_m               = $_POST['nameOfFather_m'];
    $motherAadhaar                = $_POST['motherAadhaar'];
    $fatherAadhaar                = $_POST['fatherAadhaar'];
    $addressDuringDeath           = $_POST['addressDuringDeath'];
    $permanentAddressOfDeceased   = $_POST['permanentAddressOfDeceased'];
    $permanentAddressOfDeceased_m = $_POST['permanentAddressOfDeceased_m'];

    if ($_POST['dateOfReg'] != "") {
        $dateOfRegistration = $_POST['dateOfReg'];
    } else {
        $dateOfRegistration = date("Y-m-j");
    }

    if ($addressDuringDeath == 'palasdeo') {
        $addressDuringDeath_m = 'पळसदेव';
    } else if ($addressDuringDeath == 'bandewadi') {
        $addressDuringDeath_m = 'बांडेवाडी';
    } else if ($addressDuringDeath == 'kalewadi') {
        $addressDuringDeath_m = 'काळेवाडी';
    } else if ($addressDuringDeath == 'malewadi') {
        $addressDuringDeath_m = 'माळेवाडी';
    } else {
        $addressDuringDeath_m = ' ';
    }
    if (!isset($_POST['addressDuringDeath_m'])) {
        if ($addressDuringDeath == 'Palasdeo') {
            $addressDuringDeath_m = 'पळसदेव';
        } else if ($addressDuringDeath == 'Bandewadi') {
            $addressDuringDeath_m = 'बांडेवाडी';
        } else if ($addressDuringDeath == 'Kalewadi') {
            $addressDuringDeath_m = 'काळेवाडी';
        } else if ($addressDuringDeath == 'Malewadi') {
            $addressDuringDeath_m = 'माळेवाडी';
        } else {
            $addressDuringDeath_m = '';
        }
    } else {
        $addressDuringDeath_m = $_POST['addressDuringDeath_m'];
    }
    if (!empty($_POST['remark'])) {
        $remark = $_POST['remark'];
    } else {
        $remark = "-";
    }



    $query = "UPDATE death_data SET
        name = '$name', 
        name_m = '$name_m', 
        sex = '$sex', 
        aadharNo = '$aadharNo', 
        dateOfDeath = '$dateOfDeath', 
        placeOfDeath = '$placeOfDeath', 
        placeOfDeath_m = '$placeOfDeath_m', 
        age = '$age', 
        nameOfHusband_Wife = '$nameOfHusband_Wife', 
        nameOfHusband_Wife_m = '$nameOfHusband_Wife_m', 
        aadhaarOfHusband_Wife = '$aadhaarOfHusband_Wife', 
        nameOfMother = '$nameOfMother', 
        nameOfMother_m = '$nameOfMother_m', 
        nameOfFather = '$nameOfFather', 
        nameOfFather_m = '$nameOfFather_m', 
        motherAadhaar = '$motherAadhaar', 
        fatherAadhaar = '$fatherAadhaar', 
        addressDuringDeath = '$addressDuringDeath', 
        addressDuringDeath_m = '$addressDuringDeath_m', 
        permanentAddressOfDeceased = '$permanentAddressOfDeceased', 
        permanentAddressOfDeceased_m = '$permanentAddressOfDeceased_m', 
        remark = '$remark', 
        dateOfRegistration = '$dateOfRegistration'

        WHERE id = '$id'
    ";

    $idQuery = $connection->prepare("SELECT id FROM death_data ORDER BY id DESC LIMIT 1");

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
        echo "<pre>$e</pre>";
    }
?>
    <script>
        location.href = "../displayDetails.php"
    </script>
<?php
}
