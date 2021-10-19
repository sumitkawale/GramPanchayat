<?php

//getting data
$type = isset($_POST['type']) ? $_POST['type'] : "";
$input = isset($_POST['input']) ? $_POST['input'] : "";
$filePage = $_POST['filePage'];
$data = null;
$totalRows = 10;
if(isset($_POST['nextValue'])){
    $nextValue = $_POST['nextValue'];
}else{
    $nextValue = 0;
}
$limitValue = ($nextValue * $totalRows);
try {
    require "./connection.php";

    $statement = $connection->prepare("SELECT * FROM marriage_data_deleted WHERE $type like '%$input%' ORDER BY id DESC LIMIT $limitValue , $totalRows");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();

    $lastRow = $connection->prepare("SELECT id FROM marriage_data_deleted WHERE $type like '%$input%' ORDER BY id DESC LIMIT 1");
    $lastRow->execute();
    $lastRow->setFetchMode(PDO::FETCH_ASSOC);
    $lastRow = $lastRow->fetchAll();
    if(!empty($lastRow[0])){
        $lastRow = $lastRow[0];
    }else{
        $lastRow = 0;
    }
    if(empty($lastRow['id'])){

    }else{
        $lastRowno = (int)$lastRow['id'];
    }

    $firstRow = $connection->prepare("SELECT id FROM marriage_data_deleted WHERE $type like '%$input%' ORDER BY id ASC LIMIT 1");
    $firstRow->execute();
    $firstRow->setFetchMode(PDO::FETCH_ASSOC);
    $firstRow = $firstRow->fetchAll();
    if(!empty($firstRow[0])){
        $firstRow = $firstRow[0];
    }else{
        $firstRow = 0;
    }
    if(empty($firstRow['id'])){

    }else{
        $firstRowno = (int)$firstRow['id'];
    }
    
} catch (PDOException $e) {
    echo "<br>please insert text to search<br>";
}
$html = '';
if($filePage == 'deleteDetails.php'){
    $html .= '<button type="button" value="DELETE" class="btn btn-dark" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">DELETE</button>';
}

//opening table
$html .= '
<button type="button" onclick="recoverDeleted()" value="RECOVER" class="btn btn-success">RECOVER DATA</button>
<span class="p-5"></span>
<button type="button" onclick="deletePermanently()" value="DELETE PERMANENTLY" class="btn btn-danger">DELETE PERMANENTLY</button>
            <div class="table-responsive">
            <table class="table table-striped table-hover " style="cursor: pointer;">
                <thead>
                    <tr>
                        ';
                        if($filePage == 'recoverDetails.php'){
                            $html .= '<th scope="col"></th>';
                        }
                        $html .='
                        <th scope="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Husband Name</th>
                        <th scope="col">वराचे नाव</th>
                        <th scope="col">Wife Name</th>
                        <th scope="col">वधूचे नाव</th>
                        <th scope="col">Husband Age</th>
                        <th scope="col">Wife Age</th>
                        <th scope="col">Husband Aadhar No. </th>
                        <th scope="col">Wife Aadhar No. </th>
                        <th scope="col">Husband Religion</th>
                        <th scope="col">वराचा धर्म</th>
                        <th scope="col">Wife Religion</th>
                        <th scope="col">वधूचा धर्म</th>
                        <th scope="col">Husband Nationality</th>
                        <th scope="col">वराचे राष्ट्रीयत्व</th>
                        <th scope="col">Wife Nationality</th>
                        <th scope="col">वधूचे राष्ट्रीयत्व</th>
                        <th scope="col">Husband Father Name</th>
                        <th scope="col">वराच्या वडिलांचे नाव</th>
                        <th scope="col">Wife Father Name</th>
                        <th scope="col">वधूच्या वडिलांचे नाव</th>
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
            $html .= "<tr onclick='selectRow(this, {$row['id']})'>";
            if($filePage == 'recoverDetails.php'){
                $html .= "<td><input type='checkbox' name='checkboxes[]' onclick='changeColor(this)' value='{$row['id']}' id='{$row['id']}'> </th>";
            }
            $html .= "
            <th scope='row'>$sr</th>
            <td>{$row['id']}</td>
            <td>{$row['husbandName']}</td>
            <td class='hinditext'>{$row['husbandName_m']}</td>
            <td>{$row['wifeName']}</td>
            <td class='hinditext'>{$row['wifeName_m']}</td>
            <td>{$row['husbandAge']}</td>
            <td>{$row['wifeAge']}</td>
            <td>{$row['husbandAadharNo']}</td>
            <td>{$row['wifeAadharNo']}</td>
            <td>{$row['husbandReligion']}</td>
            <td class='hinditext'>{$row['husbandReligion_m']}</td>
            <td>{$row['wifeReligion']}</td>
            <td class='hinditext'>{$row['wifeReligion_m']}</td>
            <td>{$row['husbandNationality']}</td>
            <td class='hinditext'>{$row['husbandNationality_m']}</td>
            <td>{$row['wifeNationality']}</td>
            <td class='hinditext'>{$row['wifeNationality_m']}</td>
            <td>{$row['husbandFatherName']}</td>
            <td class='hinditext'>{$row['husbandFatherName_m']}</td>
            <td>{$row['wifeFatherName']}</td>
            <td class='hinditext'>{$row['wifeFatherName_m']}</td>
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
            if($lastRowno == $row['id']){
                $prevbtndisable = 1;
            }
            if($firstRowno == $row['id']){
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
        if($filePage == 'deleteDetails.php'){
            $html .= '<button type="button" value="DELETE" class="btn btn-dark my-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">DELETE</button>';
        }
        $html .= ' 
            <div class="my-3">
                <button type="button" onclick="recoverDeleted()" value="RECOVER" class="btn btn-success">RECOVER DATA</button>
                <span class="p-5"></span>
                <button type="button" onclick="deletePermanently()" value="DELETE" class="btn btn-danger">DELETE PERMANENTLY</button>
            </div>
        ';
        
            // printing table
        echo $html;
    }
} else {
    echo "<br><center><h4 class='text-danger'>No Match found</h4></center><br>";
    $nextbtndisable = 2;
    $prevbtndisable = 2;    
}
echo '<input value="'.$prevbtndisable.'" name="lastrowno" id="lastrowno" hidden>';
echo '<input value="'.$nextbtndisable.'" name="firstrowno" id="firstrowno" hidden>';
