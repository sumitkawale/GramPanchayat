<?php

//getting data
$type = $_POST['type'];
$input = $_POST['input'];

// getting data from database $data
try {
    require "./connection.php";

    $statement = $connection->prepare("SELECT * FROM birth_data where $type like '%$input%'");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();
} catch (PDOException $e) {
    echo "<br>please insert text to search<br>";
    // echo "error aala aahe" . $e;
}

//opening table
//type submit kadun button kelay .....tya shivay modal ch working hot nahi
$html = '
    <form method="POST" action="./dataDelete.php">
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
                        <th scope="col">DOB</th>
                        <th scope="col">Birth Place</th>
                        <th scope="col">जन्मस्थान</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">वडिलांचे नाव</th>
                        <th scope="col">Mother Name</th>
                        <th scope="col">आईचे नाव</th>
                        <th scope="col">Father\'s Aadhaar No.</th>
                        <th scope="col">Mother\'s Aadhaar No.</th>
                        <th scope="col">Parents Address During Birth</th>
                        <th scope="col">मुलाच्या जन्मावेळी पालकांचा पत्ता</th>
                        <th scope="col">Parents permenant Address</th>
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
                    <td scope='row'>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td class='hinditext'>{$row['name_m']}</td>
                    <td>{$row['sex']}</td>
                    <td>{$row['DOB']}</td>
                    <td>{$row['placeOfBirth']}</td>
                    <td class='hinditext'>{$row['placeOfBirth_m']}</td>
                    <td>{$row['nameOfFather']}</td>
                    <td class='hinditext'>{$row['nameOfFather_m']}</td>
                    <td>{$row['nameOfMother']}</td>
                    <td class='hinditext'>{$row['nameOfMother_m']}</td>
                    <td>{$row['fatherAadharNo']}</td>
                    <td>{$row['motherAadharNo']}</td>
                    <td>{$row['addressDuringBirth']}</td>
                    <td class='hinditext'>{$row['addressDuringBirth_m']}</td>
                    <td>{$row['permanentAddressOfParents']}</td>
                    <td>{$row['dateOfRegistration']}<td>
            ";
            $html .= "</tr>";
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
