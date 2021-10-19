<?php

$data = array(
    "id" => "1",
    "husbandName" => "amit",
    "husbandName_m" => "अमित",
    "wifeName" => "monika",
    "wifeName_m" => "मोनिका",
    "husbandAge" => "24",
    "wifeAge" => "22"
);

print_r($data);
$dataJson = json_encode($data);
echo "<div id='output'></div>";
print_r($dataJson);
?>

<script>
    var data = '<?php echo $dataJson; ?>';
    //below

    data = JSON.parse(data);

    var output = document.getElementById('output');
    var html = "<table >";
    html += "<tr>";
    html += "<td>" + data.husbandName + "</td>";
    html += "<td>" + data.wifeName + "</td>";
    html += "<td>" + data.husbandAge + "</td>";
    html += "<td>" + data.wifeAge + "</td>";
    html += "</tr>";
    html += "</table>";

    output.innerHTML = html;

    alert(data);
</script>
