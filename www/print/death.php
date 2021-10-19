<?php
session_start();

$_SESSION["printSuccess"] = 1;
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
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="Description" content="Enter your description here" />
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
                    font-family: Times, 'Times New Roman';
                }

                .marginp {
                    margin: 0;
                }

                .fblock1 {
                    display: block;
                    padding: 75px;
                    /* border: 2px solid red; */
                }

                .fblock2 {
                    margin-top: 15px;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    text-align: center;
                }

                .fblock3 {
                    padding: 75px;
                }

                .sign {
                    display: block;
                    margin-left: 0;
                    margin-right: 10px;
                    text-align: center;
                    font-weight: 600;
                }

                .textNormal {
                    text-transform: none;
                    font-size: 1.3rem;
                }

                @font-face {
                    font-family: kruti dev;
                    src: url('../resources/Kruti_Dev_010.ttf') format("truetype");
                }

                .hinditext {
                    font-family: kruti dev;
                    font-size: auto;
                }
            </style>

        </head>

        <body>
            <div class="d-print-none m-4">
                <input type="button" value="Go Back" onclick='window.history.back()' class="btn btn-outline-dark">
                <input type="text" value="<?php echo $file ?>" width='100%' id="filename" hidden>
            </div>
            <div class="container-fluid" style="height: 1500px;border: 2px solid black">

                <!-- first Block (fblock) -->

                <div class="fblock row">
                    <div class="fblock1 col-3 font-weight-bold" style="font-size: 13px;">
                        क्रमांक. 1<br>
                        No. 1<br>
                        <img src="../media/maharashtraSarkarLogo.png" height="80">
                    </div>

                    <div class="fblock2 col-6">
                        <img src="../media/Emblem_of_India.svg.png" height="60">
                        <p class="marginp" style="margin-top: 10px;">महाराष्ट्र शासन</p>
                        <p>GOVERMENT OF MAHARASHTRA</p>
                        <p class="marginp">आरोग्य विभाग</p>
                        <p>DEPARTMENT OF HEALTH</p>
                        <p style="margin: 20px 0 20px;">GRAMPANCHAYAT PALASDEO</p>
                        <h5 class="marginp">मृत्यू प्रमाणपत्र</h5>
                        <p style="font-weight: 500;">DEATH CERTIFICATE</p>
                    </div>

                    <div class="fblock3 col-3 font-weight-bold" style="font-size: 13px;">
                        फोर्म-५<br>
                        FORM-5<br>
                        <img src="../media/birthAndDeathLogo.jpg" height="70">
                    </div>
                </div>

                <!-- Second Block (sblock)-->

                <div class="sblock">
                    <div class="sblock1">
                        <p class="marginp">जन्म व मृत्यू नोंदणी अधिनियम, १९६९ च्या कलम १२/१७ आणि महाराष्ट्र जन्म आणि मृत्यू
                            नोंदणी नियम, २००० चे नियम ८/१३ अन्वये देण्यात आले आहे. </p>
                        <p>(ISSUED UNDER SECTION 12/17 OF THE REGISTRATION OF BIRTHS & DEATHS ACT, 1969 AND RULE OF THE
                            MAHARASHTRA REGISTRAION OF BIRTHS & DEATHS RULES 200)</p>
                    </div>
                    <div class="sblcok2">
                        <p class="marginp">प्रमाणित करण्यात येत आहे कि, खालील माहिती मृत्युच्या मूळ अभिलेखाच्या नोंदणीतून
                            घेण्यात आली आहे, जी की ग्रामपंचायत पळसदेव, तालुका इंदापूर, जिल्हा पुणे, महाराष्ट्र राज्याच्या
                            नोंदवहीत उल्लेख आहे.</p>
                        <p>THIS IS TO CERTIFY THAT THE FOLLOWING INFROMATION HAS BEEN TAKEN FROM THE ORIGINAL RECORD OF DEATH
                            WHICH IS THE REGISTER FOR GRAMPANCHAYAT PALASDEO OF TAHSIL/BLOCK INDAPUR OF DISTRICT PUNE OF
                            STATE/UNION TERRITORY MAHARASHTRA, INDIA</p>
                    </div>
                </div>

                <!-- MAIN BLOCK THIRD BLOCK (tblock) -->

                <div class="tblock row font-weight-bold" style="margin-top: 25px;">
                    <div class="tdata1 col-7 ">
                        <p>मृताचे नाव / NAME OF DECEASED: <span><?php echo $name ?></span>/<span class="hinditext textNormal"><?php echo  $name_m; ?></span></p>

                        <p class="marginp">आधार क्रमांक / AADHAAR NO.:</p>
                        <p><span class="hideAadhar"><?php echo $aadharNo;  ?></span></p>

                        <p class="marginp">मृत्यू दिनांक / DATE OF DEATH:</p>
                        <p class="marginp"><span><?php echo $dateOfDeath;  ?></span></p>
                        <p><span><?php echo $dateOfDeath_m;  ?></span></p>

                        <p class="marginp">मृत व्यक्तीचे वय / AGE OF DECEASED:</p>
                        <p><span><?php echo $age;  ?></span></p>

                        <p class="marginp">आईचे पूर्ण नाव / NAME OF MOTHER: </p>
                        <p><span><?php echo $nameOfMother ?></span>/<span class="hinditext textNormal"><?php echo $nameOfMother_m;  ?></span></p>

                        <p>आधार क्रमांक / MOTHER'S AADHAAR NO.: <span class="hideAadhar"><?php echo $motherAadhaar;  ?></span></p>

                        <p class="marginp">मयत व्यक्तीचा मृत्युसमयीचा पत्ता / ADDRESS OF DECEASED AT THE TIME OF DEATH:</p>
                        <p><span><?php echo $addressDuringDeath ?></span>/
                            <?php
                            if ($addressDuringDeath_m == 'पळसदेव' || $addressDuringDeath_m == 'बांडेवाडी' || $addressDuringDeath_m == 'काळेवाडी' || $addressDuringDeath_m == 'माळेवाडी') { ?>
                                <span class="hinditext textNormal" style="font-size: 00.9rem;"><?php echo $addressDuringDeath_m;  ?></span>
                        </p>
                    <?php } else { ?>
                        <span class="hinditext textNormal"><?php echo $addressDuringDeath_m;  ?></span></p>
                    <?php }
                    ?>

                    <p class="marginp">नोंदणी क्रमांक / REGISTRATION NO.:</p>
                    <p><span><?php echo $id;  ?></span></p>

                    <p class="marginp">शेरा /REMARKS (IF ANY):</p>
                    <p><span> <?php echo $remark; ?></span></p>
                    </div>
                    <div class="tdata3 col-5">
                        <p>लिंग/SEX: <span><?php echo $sex . "</span>/<span style='font-size: 0.9rem;'>" . $sex_m; ?></span></p>

                        <p class="marginp">मृत्यूचे ठिकाण / PLACE OF DEATH: </p>
                        <p><span><?php echo $placeOfDeath ?></span>/<span class="hinditext textNormal"><?php echo  $placeOfDeath_m; ?></span> </p>

                        <p class="marginp">पती / पत्नी माहिती नाव / NAME OF HUSBAND/WIFE: </p>
                        <p><span><?php echo $nameOfHusband_Wife ?></span>/<span class="hinditext textNormal"><?php echo  $nameOfHusband_Wife_m; ?></span></p>

                        <p>आधार क्रमांक / HUSBAND/WIFE AADHAAR NO.: <span class="hideAadhar"><?php echo $aadhaarOfHusband_Wife; ?></span></p>

                        <p class="marginp"> वडिलांचे पूर्ण नाव / NAME OF FATHER:</p>
                        <p><span><?php echo $nameOfFather ?></span>/<span class="hinditext textNormal"><?php echo $nameOfFather_m; ?></span></p>

                        <p>आधार क्रमांक / FATHER'S AADHAAR NO.: <span class="hideAadhar"><?php echo $fatherAadhaar; ?></span></p>

                        <p class="marginp">मयत व्यक्तीचा कायमचा पत्ता / PERMANENT ADDRESS OF DECEASED: </p>
                        <p class="marginp"><span><?php echo $permanentAddressOfDeceased; ?></span></p>
                        <p><span class="hinditext textNormal"><?php echo $permanentAddressOfDeceased_m; ?></span></p>

                        <p class="marginp"> नोंदणी दिनांक / DATE OF REGISTRATION:</p>
                        <p><span><?php echo $dateOfRegistration; ?></span></p>
                    </div>
                </div>

                <!-- fourth block (forblock)-->

                <div class="forblock row" style="margin-top: 15px;">
                    <div class="fordata1 col-7">
                        <p class="marginp">प्रमाणपत्र दिल्याची दिनांक / DATE OF ISSUE:</p>
                        <p><span><?php echo $dateOfIssue; ?></span></p>
                    </div>
                    <div class="fordata3 col-5">
                        <center>
                            <p class="marginp">निर्गमित करणारे प्राधिकारी / ISSUING AUTHORITY</p>
                        </center>
                        <div class="sign">
                            <p class="marginp">निबंधक (जन्म व मृत्यू)</p>
                            <p class="marginp">REGISTRAR (BIRTH & DEATH)</p>
                            <p style="margin-left: 10px;">GRAMPANCHAYAT PALASDEO</p>
                        </div>
                    </div>
                </div>

                <!-- fifth block (fifblock)-->

                <div class="fifblock">
                    <p class="marginp">UPDATED ON:</p>
                    <p class="marginp"><span><?php echo $updatedOn; ?></span></p>
                    <img src="<?php echo $file ?>" height="80px">
                </div>

                <!-- Airtel thanks block -->

                <div class="airtelT">
                    <center>
                        <p class="marginp">*THIS IS A COMPUTER GENERATED CERTIFICATE WHICH CONTAINS FACSIMILE SIGNATURE OF THE
                            ISSUING AUTHORITY*</p>
                        <p class="marginp">THE GOVT. OF INDIA VIDE CIRCULAR NO. 1/12/2014-VS(CRS) DATED 27-JULY-2015 HAS</p>
                        <p class="marginp">APPROVED THIS CERTIFICATE AS A VALID LEGAL DOCUMENT FOR ALL OFFICIAL PURPOSES.</p>
                        <p class="marginp" style="font-weight: 600;">*प्रत्येक जन्म आणि मृत्यूची घटना नोंदल्याची खात्री करा* /
                            ENSURE REGISTRATION OF EVERY BIRTH AND DEATH*</p>
                    </center>
                </div>

            </div>

            <?php include '../resources/jsScript.php'; ?>

        </body>

        </html>
        <script src="../resources/bootstrap/js/jquery.js"></script>
        <script>
            hideAadhar();
            window.print();

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

<?php

    } else {
        showErr();
    }
} else {
    showErr();
}

?>