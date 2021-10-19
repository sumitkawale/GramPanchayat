<?php

//getting data
$type = $_POST['type'];
$input = $_POST['input'];

// getting data from database $data
try {
    require "./connection.php";

    $statement = $connection->prepare("SELECT * FROM death_data where $type like '%$input%'");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();
} catch (PDOException $e) {
    echo "<br>please insert text to search<br>";
    // echo "error aala aahe" . $e;
}

//opening table
$html = '
    <button type="button" value="DELETE" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#exampleModal">DELETE</button>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">नाव</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Aadhaar No.</th>
                        <th scope="col">Age</th>
                        <th scope="col">Death Date</th>
                        <th scope="col">Death Place</th>
                        <th scope="col">मृत्यू ठिकाण</th>
                        <th scope="col">Husband/Wife Name</th>
                        <th scope="col">पती/पत्नीचे नाव</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">वडिलांचे नाव</th>
                        <th scope="col">Mother Name</th>
                        <th scope="col">आईचे नाव</th>
                        <th scope="col">Father\'s Aadhaar No.</th>
                        <th scope="col">Mother\'s Aadhaar No.</th>
                        <th scope="col">Address During Death</th>
                        <th scope="col">मृत्यूवेळी मृत व्यक्तीचा पत्ता</th>
                        <th scope="col">Deceased permenant Address</th>
                        <th scope="col">Reg. Date</th>
                    </tr>
                </thead>
            <tbody>
';

// adding data to table
if ($data != '') {
    if (count($data) == 0) {
        echo "details not found";
    } else {
        $sr = 0;
        foreach ($data as $row) {
            $sr++;
            $html .= "<tr onclick='selectRow(this, {$row['id']})'>";
            $html .= "
                
                    <td><input type='checkbox' name='checkboxes[]' onclick='changeColor(this)' value='{$row['id']}' id='{$row['id']}'> </td>
                    <td scope='row'>$sr</td>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td class='hinditext'>{$row['name_m']}</td>
                    <td>{$row['sex']}</td>
                    <td>{$row['aadharNo']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['dateOfDeath']}</td>
                    <td>{$row['placeOfDeath']}</td>
                    <td class='hinditext'>{$row['placeOfDeath_m']}</td>
                    <td>{$row['nameOfHusband_Wife']}</td>
                    <td class='hinditext'>{$row['nameOfHusband_Wife_m']}</td>
                    <td>{$row['nameOfFather']}</td>
                    <td class='hinditext'>{$row['nameOfFather_m']}</td>
                    <td>{$row['nameOfMother']}</td>
                    <td class='hinditext'>{$row['nameOfMother_m']}</td>
                    <td>{$row['fatherAadhaar']}</td>
                    <td>{$row['motherAadhaar']}</td>
                    <td>{$row['addressDuringDeath']}</td>
                    <td class='hinditext'>{$row['addressDuringDeath_m']}</td>
                    <td>{$row['permanentAddressOfDeceased']}</td>
                    <td>{$row['dateOfRegistration']}</td>
            ";
            $html .= '</tr>';
        }

        // closing table
        $html .= '
                </tbody>
            </table>
        </div><br>
        ';

        $html .= ' 
                <div class="row">
                    <div class="col-3">
                    <button type="button" value="DELETE" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#exampleModal">DELETE</button>
                    </div>
                </div>
        ';

        // printing table
        echo $html;
    }
} else {
    echo "<br>details not found<br>";
}
