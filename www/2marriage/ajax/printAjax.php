<?php

//getting data
$type = $_POST['type'];
$input = $_POST['input'];
$filePage = $_POST['filePage'];
$data = null;
$totalRows = 10;
if (isset($_POST['nextValue'])) {
    $nextValue = $_POST['nextValue'];
} else {
    $nextValue = 0;
}
$limitValue = ($nextValue * $totalRows);
try {
    require "./connection.php";

    $statement = $connection->prepare("SELECT * FROM marriage_data WHERE $type like '%$input%' ORDER BY id DESC LIMIT $limitValue , $totalRows");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();

    $lastRow = $connection->prepare("SELECT id FROM marriage_data WHERE $type like '%$input%' ORDER BY id DESC LIMIT 1");
    $lastRow->execute();
    $lastRow->setFetchMode(PDO::FETCH_ASSOC);
    $lastRow = $lastRow->fetchAll();
    if (!empty($lastRow[0])) {
        $lastRow = $lastRow[0];
    } else {
        $lastRow = 0;
    }
    if (empty($lastRow['id'])) {
    } else {
        $lastRowno = (int)$lastRow['id'];
    }

    $firstRow = $connection->prepare("SELECT id FROM marriage_data WHERE $type like '%$input%' ORDER BY id ASC LIMIT 1");
    $firstRow->execute();
    $firstRow->setFetchMode(PDO::FETCH_ASSOC);
    $firstRow = $firstRow->fetchAll();
    if (!empty($firstRow[0])) {
        $firstRow = $firstRow[0];
    } else {
        $firstRow = 0;
    }
    if (empty($firstRow['id'])) {
    } else {
        $firstRowno = (int)$firstRow['id'];
    }
} catch (PDOException $e) {
    echo "<br>please insert text to search<br>";
}
$html = '';
if ($filePage == 'deleteDetails.php') {
    $html .= '<button type="button" value="DELETE" class="btn btn-dark" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">DELETE</button>';
}

//opening table
$html .= '
            <div class="table-responsive">
            <table class="table table-striped table-hover " style="cursor: pointer;">
                <thead>
                    <tr>
                        ';
if ($filePage == 'deleteDetails.php') {
    $html .= '<th scope="col"></th>';
}
$html .= '
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
$prevbtndisable = 0;
$nextbtndisable = 0;
// adding data to table
if ($data != '') {
    if (count($data) == 0) {
        echo "<br><center><h4 class='text-danger'>No Match found</h4></center><br>";
        $nextbtndisable = 2;
        $prevbtndisable = 2;
    } else {
        $sr = 0;
        foreach ($data as $row) {
            $sr++;
            if ($filePage == 'displayDetails.php') {
                $html .= "<tr  data-mdb-toggle='modal' data-mdb-target='#exampleModalupd' onclick='passData({$row['id']})'>";
            } else {
                $html .= "<tr onclick='selectRow(this, {$row['id']})' data-mdb-toggle='modal' data-mdb-target='#exampleModal'>";
            }
            if ($filePage == 'deleteDetails.php') {
                $html .= "<td><input type='checkbox' name='checkboxes[]' onclick='changeColor(this)' value='{$row['id']}' id='{$row['id']}'> </th>";
            }
            $tbid = $row['id'];
            $html .= "
                <th scope='row'>$sr</th>
                <td id='$tbid'>{$row['id']}</td>
                <td id='husbandName$tbid'>{$row['husbandName']}</td>
                <td id='husbandName_m$tbid' class='hinditext'>{$row['husbandName_m']}</td>
                <td id='wifeName$tbid'>{$row['wifeName']}</td>
                <td id='wifeName_m$tbid' class='hinditext'>{$row['wifeName_m']}</td>
                <td id='husbandAadharNo$tbid'>{$row['husbandAadharNo']}</td>
                <td id='wifeAadharNo$tbid'>{$row['wifeAadharNo']}</td>
                <td id='husbandAddress$tbid'>{$row['husbandAddress']}</td>
                <td id='husbandAddress_m$tbid' class='hinditext'>{$row['husbandAddress_m']}</td>
                <td id='wifeAddress$tbid'>{$row['wifeAddress']}</td>
                <td id='wifeAddress_m$tbid' class='hinditext'>{$row['wifeAddress_m']}</td>
                <td id='dateOfMarriage$tbid'>{$row['dateOfMarriage']}</td>
                <td id='placeOfMarriage$tbid'>{$row['placeOfMarriage']}</td>
                <td id='placeOfMarriage_m$tbid' class='hinditext'>{$row['placeOfMarriage_m']}</td>
                <td id='dateOfRegistration$tbid'>{$row['dateOfRegistration']}</td>
                <td id='dateOfIssue$tbid'>{$row['dateOfIssue']}</td>
            ";
            if ($lastRowno == $row['id']) {
                $prevbtndisable = 1;
            }
            if ($firstRowno == $row['id']) {
                $nextbtndisable = 1;
            }
            $html .= '</tr>';
        }

        // closing table
        $html .= '
                </tbody>
            </table>
            </div>
        ';
        if ($filePage == 'deleteDetails.php') {
            $html .= '<button type="button" value="DELETE" class="btn btn-dark my-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">DELETE</button>';
        }

        // printing table
        echo $html;
    }
} else {
    echo "<br><center><h4 class='text-danger'>No Match found</h4></center><br>";
    $nextbtndisable = 2;
    $prevbtndisable = 2;
}
echo '<input value="' . $prevbtndisable . '" name="lastrowno" id="lastrowno" hidden>';
echo '<input value="' . $nextbtndisable . '" name="firstrowno" id="firstrowno" hidden>';
