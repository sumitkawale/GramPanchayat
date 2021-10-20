<?php
//getting data
$type = $_POST['type'];
$input = $_POST['input'];
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

    $statement = $connection->prepare("SELECT * FROM death_data WHERE $type like '%$input%' ORDER BY id DESC LIMIT $limitValue , $totalRows");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();

    $lastRow = $connection->prepare("SELECT id FROM death_data WHERE $type like '%$input%' ORDER BY id DESC LIMIT 1");
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

    $firstRow = $connection->prepare("SELECT id FROM death_data WHERE $type like '%$input%' ORDER BY id ASC LIMIT 1");
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
            <div class="table-responsive">
            <table class="table table-striped table-hover " style="cursor: pointer;">
                <thead>
                    <tr>
                        ';
                        if($filePage == 'deleteDetails.php'){
                            $html .= '<th scope="col"></th>';
                        }
                        $html .='
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">नाव</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Aadhaar number of deceased</th>
                        <th scope="col">Death Date</th>
                        <th scope="col">मृत्यू ठिकाण</th>
                        <th scope="col">Death Place</th>
                        <th scope="col">वडील/पतीचे नाव</th>
                        <th scope="col">Husband/Father Name</th>
                        <th scope="col">आईचे नाव</th>
                        <th scope="col">Mother\'s Aadhaar No.</th>
                        <th scope="col">Address During Death</th>
                        <th scope="col">मृत्यूवेळी मृत व्यक्तीचा पत्ता</th>
                        <th scope="col">Deceased permenant Address</th>
                        <th scope="col">मृत व्यक्तीचा कायमचा पत्ता</th>
                        <th scope="col">Reg. Date</th>
                        <th scope="col">Remark</th>
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
            if($filePage == 'displayDetails.php'){
                $html .= "<tr  data-mdb-toggle='modal' data-mdb-target='#exampleModalupd' onclick='passData({$row['id']})'>";
            }else{
                $html .= "<tr onclick='selectRow(this, {$row['id']})' data-mdb-toggle='modal' data-mdb-target='#exampleModal'>";
            }
            if($filePage == 'deleteDetails.php'){
                $html .= "<td><input type='checkbox' name='checkboxes[]' onclick='changeColor(this)' value='{$row['id']}' id='{$row['id']}'> </th>";
            }
            $tbid = $row['id'];
            $html .= "
                <td scope='row'>$sr</td>
                <td id='$tbid'>{$row['id']}</td>
                <td id='name$tbid'>{$row['name']}</td>
                <td id='name_m$tbid' class='hinditext'>{$row['name_m']}</td>
                <td id='sex$tbid'>{$row['sex']}</td>
                <td id='aadharNo$tbid'>{$row['aadharNo']}</td>
                <td id='dateOfDeath$tbid'>{$row['dateOfDeath']}</td>
                <td id='placeOfDeath_m$tbid' class='hinditext'>{$row['placeOfDeath_m']}</td>
                <td id='placeOfDeath$tbid'>{$row['placeOfDeath']}</td>
                <td id='nameOfHusband_Wife_m$tbid' class='hinditext'>{$row['nameOfHusband_Wife_m']}</td>
                <td id='nameOfHusband_Wife$tbid'>{$row['nameOfHusband_Wife']}</td>
                <td id='nameOfMother_m$tbid' class='hinditext'>{$row['nameOfMother_m']}</td>
                <td id='nameOfMother$tbid'>{$row['nameOfMother']}</td>
                <td id='addressDuringDeath$tbid'>{$row['addressDuringDeath']}</td>
                <td id='addressDuringDeath_m$tbid' class='hinditext'>{$row['addressDuringDeath_m']}</td>
                <td id='permanentAddressOfDeceased$tbid'>{$row['permanentAddressOfDeceased']}</td>
                <td id='permanentAddressOfDeceased_m$tbid'>{$row['permanentAddressOfDeceased_m']}</td>
                <td id='dateOfRegistration$tbid'>{$row['dateOfRegistration']}</td>
                <td id='remark$tbid'>{$row['remark']}</td>
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
