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

    $statement = $connection->prepare("SELECT * FROM birth_data WHERE $type like '%$input%' ORDER BY id DESC LIMIT $limitValue , $totalRows");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();

    $lastRow = $connection->prepare("SELECT id FROM birth_data WHERE $type like '%$input%' ORDER BY id DESC LIMIT 1");
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

    $firstRow = $connection->prepare("SELECT id FROM birth_data WHERE $type like '%$input%' ORDER BY id ASC LIMIT 1");
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
                        <th scope="col">DOB</th>
                        <th scope="col">Birth Place</th>
                        <th scope="col">जन्मस्थान</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">वडिलांचे नाव</th>
                        <th scope="col">Mother Name</th>
                        <th scope="col">आईचे नाव</th>
                        <th scope="col">Parents Address During Birth</th>
                        <th scope="col">मुलाच्या जन्मावेळी पालकांचा पत्ता</th>
                        <th scope="col">Parents permenant Address</th>
                        <th scope="col">पालकांचा कायमचा पत्ता</th>
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
                <td scope='row'>{$row['id']}</td>
                <td id='name$tbid'>{$row['name']}</td>
                <td id='name_m$tbid' class='hinditext'>{$row['name_m']}</td>
                <td id='sex$tbid'>{$row['sex']}</td>
                <td id='DOB$tbid'>{$row['DOB']}</td>
                <td id='placeOfBirth$tbid'>{$row['placeOfBirth']}</td>
                <td id='placeOfBirth_m$tbid' class='hinditext'>{$row['placeOfBirth_m']}</td>
                <td id='nameOfFather$tbid'>{$row['nameOfFather']}</td>
                <td id='nameOfFather_m$tbid' class='hinditext'>{$row['nameOfFather_m']}</td>
                <td id='nameOfMother$tbid'>{$row['nameOfMother']}</td>
                <td id='nameOfMother_m$tbid' class='hinditext'>{$row['nameOfMother_m']}</td>
                <td id='addressDuringBirth$tbid'>{$row['addressDuringBirth']}</td>
                <td id='addressDuringBirth_m$tbid' class='hinditext'>{$row['addressDuringBirth_m']}</td>
                <td id='permanentAddressOfParents$tbid'>{$row['permanentAddressOfParents']}</td>
                <td id='permanentAddressOfParents_m$tbid' class='hinditext'>{$row['permanentAddressOfParents_m']}</td>
                <td id='dateOfRegistration$tbid'>{$row['dateOfRegistration']}<td>
                <td id='remark$tbid'>{$row['remark']}<td>
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
