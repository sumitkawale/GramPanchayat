<?php
session_start();
require('./connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
    $permanentAddressOfDeceased_m   = $_POST['permanentAddressOfDeceased_m'];

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



    $query = "INSERT into death_data(
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
        dateOfRegistration
    ) 
     VALUES(
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
        '$dateOfRegistration'
    )";

    $idQuery = $connection->prepare("SELECT id FROM death_data ORDER BY id DESC LIMIT 1");

    try {
        $stm = $connection->prepare($query);
        $stm->execute();
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
            location.href = "../../print/death.php?id=" + <?php echo "$id" ?>
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
