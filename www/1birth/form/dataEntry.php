<?php
session_start();
require "./connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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


    $query = "INSERT INTO birth_data(
        name, 
        name_m,
        sex,
        DOB,
        placeOfBirth,
        placeOfBirth_m,
        nameOfMother,
        nameOfMother_m,
        nameOfFather,
        nameOfFather_m,
        motherAadharNo,
        fatherAadharNo,
        addressDuringBirth,
        addressDuringBirth_m,
        permanentAddressOfParents,
        permanentAddressOfParents_m,
        remark,
        dateOfRegistration
    ) VALUES(
        '$name', 
        '$name_m',
        '$sex',
        '$DOB',
        '$placeOfBirth',
        '$placeOfBirth_m',
        '$nameOfMother',
        '$nameOfMother_m',
        '$nameOfFather',
        '$nameOfFather_m',
        '$motherAadharNo',
        '$fatherAadharNo',
        '$addressDuringBirth',
        '$addressDuringBirth_m',
        '$permanentAddressOfParents',
        '$permanentAddressOfParents_m',
        '$remark',
        '$dateOfRegistration'
    )";

    $idQuery = $connection->prepare("SELECT id FROM birth_data ORDER BY id DESC LIMIT 1");
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
            location.href = "../../print/birth.php?id=" + <?php echo "$id" ?>
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
