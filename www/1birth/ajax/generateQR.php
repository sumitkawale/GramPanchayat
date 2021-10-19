<?php

//getting data
$id = $_POST['id'];
// getting data from database $data
try {
    require "./connection.php";

    $statement = $connection->prepare("SELECT * FROM birth_data where `id`=$id");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();
} catch (PDOException $e) {
    echo "<br>please insert text to search<br>";
    // echo "error aala aahe" . $e;
}

foreach ($data as $row) {
    $arrayData = 
    array(
        'name'=>$row['name'], 
        'sex'=>$row['sex'], 
        'dob'=>$row['DOB'], 
        'placeOfBirth'=>$row['placeOfBirth'], 
        'fatherName'=>$row['nameOfFather'], 
        'motherName'=>$row['nameOfMother'], 
        'address'=>$row['permanentAddressOfParents']
    );
       
}

//generating QR code
require_once '../../phpqrcode/qrlib.php';
$jsonString = json_encode($arrayData);
$jsonString = str_replace('"', '%27', $jsonString);
$jsonString = str_replace(',', '%2C', $jsonString);
$jsonString = str_replace(':', '%3A', $jsonString);
$jsonString = str_replace('{', '%7B', $jsonString);
$jsonString = str_replace('}', '%7D', $jsonString);
$jsonString = str_replace(' ', '%20', $jsonString);
$text = "https://sumitkawale.github.io/QR-Code-Generators-Static.github.io/birth.html?data=%22$jsonString%22";
$path = '../../qrImage/';
$file = $path.$id.'qrImg.png';
QRcode::png($text, $file, 'M', 7);

echo '<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel" style="overflow:hidden;">Birth Certificate of '.$arrayData['name'].' </h5>
<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
</div>';



?>