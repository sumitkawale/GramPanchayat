<?php
// use this file for only testing purpose.... 😉

//getting data
$type = $_POST['type'];
$input = $_POST['input'];

// getting data from database $data

//opening table
$html = "
    <table border='1'>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>username</th>
                <th>password</th>
                <th>verging?</th>
            </tr>
        </thead>
        <tbody>
";

// adding data to table
$i = 0;
while ($i <= 10) {
    $i++;
    $html .= "
            <tr>
                <td>$i</td>
                <td>$i</td>
                <td>$i</td>
                <td>$i</td>
                <td>$i</td>
            </tr>
    ";
}

// closing table
$html .= "
        </tbody>
    </table>
";

// printing table
echo $html;
