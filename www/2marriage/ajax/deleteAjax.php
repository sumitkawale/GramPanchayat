<?php

//getting data
$type = $_POST['type'];
$input = $_POST['input'];
$data = null;
// getting data from database $data
try {
    require "./connection.php";

    $statement = $connection->prepare("SELECT * FROM marriage_data WHERE $type like '%$input%'");
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
                        <th scope="col">Husband Name</th>
                        <th scope="col">वराचे नाव</th>
                        <th scope="col">Wife Name</th>
                        <th scope="col">वधूचे नाव</th>
                        <th scope="col">Husband Aadhar No. </th>
                        <th scope="col">Wife Aadhar No. </th>
                        <th scope="col">Husband Address</th>
                        <th scope="col">वराचा पत्ता</th>
                        <th scope="col">Wife Address</th>
                        <th scope="col">वधूचा पत्ता</th>
                        <th scope="col">Date Of Marriage</th>
                        <th scope="col">Place Of Marriage</th>
                        <th scope="col">विवाहाचे ठिकाण</th>
                        <th scope="col">Reg. Date</th>
                        <th scope="col">Issue Date</th>
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
                <td><input type='checkbox' name='checkboxes[]' onclick='changeColor(this)' value='{$row['id']}' id='{$row['id']}'> </th>
                <th scope='row'>$sr</th>
                <td>{$row['id']}d</td>
                <td>{$row['husbandName']}</td>
                <td class='hinditext'>{$row['husbandName_m']}</td>
                <td>{$row['wifeName']}</td>
                <td class='hinditext'>{$row['wifeName_m']}</td>
                <td>{$row['husbandAadharNo']}</td>
                <td>{$row['wifeAadharNo']}</td>
                <td>{$row['husbandAddress']}</td>
                <td class='hinditext'>{$row['husbandAddress_m']}/td>
                <td>{$row['wifeAddress']}</td>
                <td class='hinditext'>{$row['wifeAddress_m']}/td>
                <td>{$row['dateOfMarriage']}</td>
                <td>{$row['placeOfMarriage']}</td>
                <td class='hinditext'>{$row['placeOfMarriage_m']}</td>
                <td>{$row['dateOfRegistration']}</td>
                <td>{$row['dateOfIssue']}</td>
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
