<?php
session_start();

$_SESSION["printSuccess"] = 1;
function makeMarathiDateText($stringDate)
{
    $stringDate = str_replace("/", " ∕ ", $stringDate);
    $stringDate = str_replace(":", "∶", $stringDate);
    $stringDate = str_replace("-", " ∕ ", $stringDate);
    return $stringDate;
}
require "../common.php";
class numbertowordconvertsconver
{
    function convert_number($number)
    {
        if (($number < 0) || ($number > 999999999)) {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 1000000);
        // Millions (giga)
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga) {
            $result .= $this->convert_number($giga) .  "Million";
        }
        if ($kilo) {
            $result .= (empty($result) ? "" : " ") . $this->convert_number($kilo) . " Thousand";
        }
        if ($hecto) {
            $result .= (empty($result) ? "" : " ") . $this->convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result)) {
                $result .= " and ";
            }
            if ($deca < 2) {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n) {
                    $result .= " " . $ones[$n];
                }
            }
        }
        if (empty($result)) {
            $result = "zero";
        }
        return $result;
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = str_replace("'", "", $id);

    if ($id != "") {

        $dateOfIssue = date("d-m-Y");
        try {
            require "./connection.php";

            $query = "UPDATE death_data set 'dateOfIssue' = '$dateOfIssue' where id='$id'";
            $stm = $connection->prepare($query);

            $statement = $connection->prepare("SELECT * FROM death_data WHERE id = '$id';");
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $data = $statement->fetchAll();


            if (count($data)) {
                $data = $data[0];

                // saving data to variables;
                $id                           = $data['id'];
                $name                         = $data['name'];
                $name_m                       = $data['name_m'];
                $sex                          = $data['sex'];
                $aadharNo                     = $data['aadharNo'];
                $dateOfDeath                  = $data['dateOfDeath'];
                $placeOfDeath                 = $data['placeOfDeath'];
                $placeOfDeath_m               = $data['placeOfDeath_m'];
                $age                          = $data['age'];
                $nameOfHusband_Wife           = $data['nameOfHusband_Wife'];
                $nameOfHusband_Wife_m         = $data['nameOfHusband_Wife_m'];
                $aadhaarOfHusband_Wife        = $data['aadhaarOfHusband_Wife'];
                $nameOfMother                 = $data['nameOfMother'];
                $nameOfMother_m               = $data['nameOfMother_m'];
                $nameOfFather                 = $data['nameOfFather'];
                $nameOfFather_m               = $data['nameOfFather_m'];
                $motherAadhaar                = $data['motherAadhaar'];
                $fatherAadhaar                = $data['fatherAadhaar'];
                $addressDuringDeath           = $data['addressDuringDeath'];
                $addressDuringDeath_m         = $data['addressDuringDeath_m'];
                $permanentAddressOfDeceased   = $data['permanentAddressOfDeceased'];
                $permanentAddressOfDeceased_m = $data['permanentAddressOfDeceased_m'];
                $remark                       = $data['remark'];
                $dateOfRegistration           = $data['dateOfRegistration'];
                date_default_timezone_set('Asia/Kolkata');
                $updatedOn                    = date("j-m-Y H:i:s");

                if ($sex == 'male') {
                    $sex_m = 'पुरुष';
                } else if ($sex == 'female') {
                    $sex_m = 'स्त्री';
                } elseif ($sex == 'other') {
                    $sex_m = 'इतर';
                } else {
                    $sex_m = " ";
                }
                $d = date('d', strtotime($dateOfDeath));
                $m = date('F', strtotime($dateOfDeath));
                $y = date('Y', strtotime($dateOfDeath));
                $class_obj = new numbertowordconvertsconver();
                $d = $class_obj->convert_number($d);
                $y = $class_obj->convert_number($y);

                $dateOfDeath_m = $d . "-" . $m . "-" . $y;
                $dateOfDeath_m = strtoupper($dateOfDeath_m);
            } else {
                $id                           = " − ";
                $name                         = " − ";
                $name_m                       = " − ";
                $sex                          = " − ";
                $sex_m                        = " − ";
                $aadharNo                     = " − ";
                $dateOfDeath                  = " − ";
                $dateOfDeath_m                = " − ";
                $placeOfDeath                 = " − ";
                $placeOfDeath_m               = " − ";
                $age                          = " − ";
                $nameOfHusband_Wife           = " − ";
                $nameOfHusband_Wife_m         = " − ";
                $aadhaarOfHusband_Wife        = " − ";
                $nameOfMother                 = " − ";
                $nameOfMother_m               = " − ";
                $nameOfFather                 = " − ";
                $nameOfFather_m               = " − ";
                $motherAadhaar                = " − ";
                $fatherAadhaar                = " − ";
                $addressDuringDeath           = " − ";
                $addressDuringDeath_m         = " − ";
                $permanentAddressOfDeceased   = " − ";
                $permanentAddressOfDeceased_m = " − ";
                $remark                       = " − ";
                $dateOfRegistration           = " − ";
                $updatedOn                    = " − ";
            }
            // generating qrcode
            require_once '../phpqrcode/qrlib.php';
            $arrayData =
                array(
                    'name'                          => $name,
                    'sex'                           => $sex,
                    'aadharNo'                      => $aadharNo,
                    'dateOfDeath'                   => $dateOfDeath,
                    'placeOfDeath'                  => $placeOfDeath,
                    'age'                           => $age,
                    'nameOfHusband_Wife'            => $nameOfHusband_Wife,
                    'addressDuringDeath'            => $addressDuringDeath,
                    'permanentAddressOfDeceased'    => $permanentAddressOfDeceased
                );
            $jsonString = json_encode($arrayData);
            $jsonString = str_replace('"', '%27', $jsonString);
            $jsonString = str_replace(',', '%2C', $jsonString);
            $jsonString = str_replace(':', '%3A', $jsonString);
            $jsonString = str_replace('{', '%7B', $jsonString);
            $jsonString = str_replace('}', '%7D', $jsonString);
            $jsonString = str_replace(' ', '%20', $jsonString);
            $text = "https://sumitkawale.github.io/QR-Code-Generators-Static.github.io/death.html?data=%22$jsonString%22";
            $path = '../qrImage/';
            $file = $path . $id . $name . 'qrImg.png';
            QRcode::png($text, $file, 'L', 8);
        } catch (PDOException $e) {
            echo "error aala aahe";
        }

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../resources/mdb/css/bootstrap.min.css">
            <title>Death Certificate</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                body {
                    text-transform: capitalize;
                    font-weight: 500;
                }

                .main {
                    width: 100%;
                    height: 1500px;
                    border: 2px solid black;
                }


                .top-header p {
                    margin: 0;
                }

                .header .title {
                    font-size: 1.3rem;
                    font-weight: 600;
                    display: flex;
                    flex-direction: row;
                    justify-content: center;
                    height: 100%;
                    align-items: center;
                }

                .bottom-header .title {
                    font-size: 1.7rem;
                    text-decoration: underline;
                    font-weight: 1000;
                    text-align: center;
                    border-top: 2px solid #333333;
                    border-bottom: 2px solid #333333;
                    padding: 1rem;
                }

                .definition {
                    font-size: 1.1rem;
                }


                .body-data p {
                    margin: 0;
                }

                p {
                    margin: 0 !important;
                }

                .body-data p:nth-child(even) {
                    margin-bottom: 1.2rem !important;
                }

                .body-data p:last-child {
                    margin: 0 !important;
                }

                .footer {
                    align-items: center;
                }

                .seal {
                    border: 2px solid rgba(0, 0, 0, 0.2);
                    padding: 1.2rem .5rem;
                    color: #000000cc;
                }

                .data {
                    font-weight: bolder;
                    font-size: 1.1rem;
                }

                .highlight {
                    background-color: orange;
                }
            </style>
            <style>
                @font-face {
                    font-family: marathi;
                    src: url('../resources/Kruti_Dev_010.ttf') format("truetype");
                }

                @font-face {
                    font-family: marathiNumber;
                    src: url('../resources/Shivaji01.ttf') format("truetype");
                }

                .marathi {
                    font-family: "marathi";
                    text-transform: none !important;
                }

                .marathiNumber {
                    font-family: "marathiNumber";
                    font-size: 1.4rem;
                }
            </style>
        </head>

        <body>
            <div class="d-print-none m-4 row">
                <div class="col-6">
                    <button class="btn btn-outline-dark" onclick='window.history.back()'>
                        Go Back
                    </button>
                </div>
                <div class="col-6 text-right">
                    <button class="btn btn-warning" onclick='window.print()'>
                        Print
                    </button>
                </div>
            </div>
            <div class="main">
                <div class="row top-header border-bottom p-2 m-0">
                    <p class="col ">प्रमाणपत्र क्र. / Certificate no.:<span>--data--</span></p>
                    <p class="col text-right">नमुना ५ / form 5</p>
                </div>
                <div class="row header p-3 m-0">
                    <div class="col-1 text-center">
                        <img src="../media/Emblem_of_India.svg.png" height="130px" alt="img">
                    </div>
                    <div class="col-10">
                        <p class="title">
                            <span class="text-center">
                                महाराष्ट्र शासन <br>Government Of Maharashtra
                                <br>
                                आरोग्य विभाग <br>Health Department
                            </span>
                        </p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="bottom-header">
                    <p class="title">मृत्यू प्रमाणपत्र &nbsp;&nbsp; Death certificate</p>
                </div>
                <div class="top-body p-3 border-bottom m-0">
                    <p class="definition m-0">
                        (जन्म व मृत्यू नोंदणी अधिनियम, १९६९ च्या कलम १२/१७ अन्वयें आणि महाराष्ट्र जन्म आणि मृत्यू नोंदणी
                        नियम २००० चे नियम ८/१३ अन्वये देण्यात आले आहे.)<br>
                        (Issued under section 12/17 of the registration of
                        birth and death act, 1969 and rule 8/13 of the maharashtra registration of birth and death rules
                        2000.)
                    </p>
                </div>
                <div class="body m-0">
                    <div class="body-data row p-3 pb-4 m-0 mt-2">
                        <div class="col p-2 m-0">
                            <p>मृताचे पूर्ण नाव: <span class="data marathi"><?php echo $name_m ?></span></p>
                            <p>Full Name Of Deceased: <span class="data"><?php echo $name ?></span></p>

                            <p>मृत्यू तारीख: <span class="data marathiNumber date"><?php echo makeMarathiDateText($dateOfDeath);  ?></span></p>
                            <p>Death date: <span class="data date"><?php echo makeMarathiDateText($dateOfDeath);  ?></span></p>

                            <p>आईचे पूर्ण नाव: <span class="data marathi"><?php echo $nameOfMother_m;  ?></span></p>
                            <p>full name of mother: <span class="data"><?php echo $nameOfMother;  ?></span></p>

                            <p>मयत व्यक्तीचा मृत्युसमयी पत्ता: <br><span class="data marathi"><?php echo $addressDuringDeath_m;  ?></span></p>
                            <p>address of deceased at the time of death: <br><span class="data"><?php echo $addressDuringDeath;  ?></span></p>

                            <p>शेरा: <span contenteditable="" class="data"><?php echo $remark; ?></span></p>
                            <p>remarks: <span contenteditable="" class="data"><?php echo $remark; ?></span></p>

                            <p>नोंदणी क्रमांक: <span contenteditable="" class="data marathiNumber"><?php echo $id;  ?></span></p>
                            <p>registration number: <span contenteditable="" class="data"><?php echo $id;  ?></span></p>

                            <p>प्रमाणपत्र दिल्याचा दिनांक: <span class="data marathiNumber"><?php echo makeMarathiDateText(date('d-m-Y')); ?></span></p>
                            <p>certificate issue date: <span class="data"><?php echo makeMarathiDateText(date('d-m-Y')); ?></span></p>
                        </div>
                        <div class="col p-2 border-left m-0">
                            <p>मृत्यू ठिकाण: <span class="data marathi"><?php echo $placeOfDeath_m ?></span></p>
                            <p>place of death: <span class="data"><?php echo $placeOfDeath ?></span></p>

                            <p>लिंग: <span class="data marathi"><?php echo $sex_m; ?></span></p>
                            <p>sex: <span class="data"><?php echo $sex; ?></span></p>

                            <p>वडिलांचे / पतीचे पूर्ण नाव: <span class="data marathi"><?php echo $nameOfHusband_Wife_m; ?></span></p>
                            <p>name of father / husband: <span class="data"><?php echo $nameOfHusband_Wife; ?></span></p>

                            <p>मयत व्यक्तीचा कायमचा पत्ता: <br><span class="data marathi"><?php echo $permanentAddressOfDeceased_m; ?></span></p>
                            <p>permanent address of the deceased: <br><span class="data"><?php echo $permanentAddressOfDeceased; ?></span></p>

                            <p>मयात व्यक्तीचा आधार क्रमांक: <span class="data marathiNumber"><?php echo $aadharNo; ?></span></p>
                            <p>Aadhar card number of deceased: <span class="data"><?php echo $aadharNo; ?></span></p>

                            <p>नोंदणी दिनांक: <span contenteditable="" class="data marathiNumber date"><?php echo makeMarathiDateText($dateOfRegistration); ?></span></p>
                            <p>date of registration: <span contenteditable="" class="data date"><?php echo makeMarathiDateText($dateOfRegistration); ?></span></p>
                        </div>
                    </div>
                    <p contenteditable="" class="definition border-top border-bottom p-4">
                        प्रमाणित कार्य्नात येते आहे की, खालील माहिती मृत्यू च्या मुळ अभिलेखाच्या नोंदवहीतून घेण्यात आली आहे.
                        ज्याचा (स्थानिक क्षेत्र) <span class="highlight">—</span> ता. <span class="highlight">—</span> जि. <span class="highlight">—</span> महाराष्ट्र राज्याच्या नोंदवहीत
                        उल्लेख आहे. <br>
                        this is a certify that the following information has been taken from the original record
                        of death which is the register for (local area/ local body) <span class="highlight">—</span> of tehsil / block <span class="highlight">—</span>
                        of district <span class="highlight">—</span> of maharashtra state.
                    </p>
                </div>
                <div class="footer definition row m-0 mt-5 pt-4">
                    <div class="col text-center">
                        <span class="seal">
                            शिक्का / seal
                        </span>
                    </div>
                    <div class="signature col text-center">
                        निबंधक, <br>जन्म मृत्यू नोंदणी अधिकारी<br>
                        REGISTRAR (BIRTH & DEATH)
                        <!-- <br><br> -->
                        <!-- ग्रामपंचायत ---------- ता. ---------- जि. ---------- -->
                    </div>
                </div>
            </div>
            <script src="../resources/bootstrap/js/jquery.js"></script>
            <script>
                hideAadhar();
                window.print();
                dateFix()

                function delqr() {
                    var file = $("#filename").val();
                    $.ajax({
                        url: './deleteQR.php',
                        type: "POST",
                        data: {
                            file: file
                        },
                        success: function(data) {
                            //$('').html(data);
                        }
                    });
                }

                delqr();
                //window.onafterprint = function(){
                //    var hist = history.back();
                ///  window.open(hist,"_self")
                //}
            </script>
        </body>

        </html>

<?php

    } else {
        showErr();
    }
} else {
    showErr();
}

?>