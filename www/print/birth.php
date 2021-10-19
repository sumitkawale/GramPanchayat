<?php
session_start();

$_SESSION["printSuccess"] = 1;

require "../common.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = str_replace("'", "", $id);

    if ($id != "") {

        $dateOfIssue = date("d-m-Y");
        try {
            require "./connection.php";

            $query = "UPDATE birth_data set 'dateOfIssue' = '$dateOfIssue' where id='$id'";
            $stm = $connection->prepare($query);

            $statement = $connection->prepare("SELECT * FROM birth_data WHERE id = '$id';");
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
                $DOB                          = $data['DOB'];
                $placeOfBirth                 = $data['placeOfBirth'];
                $placeOfBirth_m               = $data['placeOfBirth_m'];
                $nameOfMother                 = $data['nameOfMother'];
                $nameOfMother_m               = $data['nameOfMother_m'];
                $nameOfFather                 = $data['nameOfFather'];
                $nameOfFather_m               = $data['nameOfFather_m'];
                $motherAadharNo               = $data['motherAadharNo'];
                $fatherAadharNo               = $data['fatherAadharNo'];
                $addressDuringBirth           = $data['addressDuringBirth'];
                $addressDuringBirth_m         = $data['addressDuringBirth_m'];
                $permanentAddressOfParents    = $data['permanentAddressOfParents'];
                $permanentAddressOfParents_m  = $data['permanentAddressOfParents_m'];
                $remark                       = $data['remark'];
                $dateOfRegistration           = $data['dateOfRegistration'];
                $dateOfIssue                  = $data['dateOfIssue'];
                date_default_timezone_set('Asia/Kolkata');
                $updatedOn                    = date("j-m-Y H:i:s");

                if ($sex == 'Male') {
                    $sex_m = 'पुरुष';
                }
                if ($sex == 'Female') {
                    $sex_m = 'स्त्री';
                }
                if ($sex == 'Other') {
                    $sex_m = 'इतर';
                }
                if (empty($sex)) {
                    $sex_m = " ";
                }
            } else {
                $id                           = " − ";
                $name                         = " − ";
                $name_m                       = " − ";
                $sex                          = " − ";
                $DOB                          = " − ";
                $placeOfBirth                 = " − ";
                $placeOfBirth_m               = " − ";
                $nameOfMother                 = " − ";
                $nameOfMother_m               = " − ";
                $nameOfFather                 = " − ";
                $nameOfFather_m               = " − ";
                $motherAadharNo               = " − ";
                $fatherAadharNo               = " − ";
                $addressDuringBirth           = " − ";
                $addressDuringBirth_m         = " − ";
                $permanentAddressOfParents    = " − ";
                $permanentAddressOfParents_m  = " − ";
                $remark                       = " − ";
                $dateOfRegistration           = " − ";
                $dateOfIssue                  = " − ";
                $updatedOn                    = " − ";
            }
        } catch (PDOException $e) {
            echo "error aala aahe";
        }

        // generating qrcode
        require_once '../phpqrcode/qrlib.php';
        $arrayData =
            array(
                'name'          => $name,
                'sex'           => $sex,
                'dob'           => $DOB,
                'placeOfBirth'  => $placeOfBirth,
                'fatherName'    => $nameOfFather,
                'motherName'    => $nameOfMother,
                'address'       => $permanentAddressOfParents
            );
        $jsonString = json_encode($arrayData);
        $jsonString = str_replace('"', '%27', $jsonString);
        $jsonString = str_replace(',', '%2C', $jsonString);
        $jsonString = str_replace(':', '%3A', $jsonString);
        $jsonString = str_replace('{', '%7B', $jsonString);
        $jsonString = str_replace('}', '%7D', $jsonString);
        $jsonString = str_replace(' ', '%20', $jsonString);
        $text = "https://sumitkawale.github.io/QR-Code-Generators-Static.github.io/birth.html?data=%22$jsonString%22";
        $path = '../qrImage/';
        $file = $path . $id . $name . 'qrImg.png';
        QRcode::png($text, $file, 'L', 8); //echo $file;
    }
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
    <title>Birth Certificate</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* font-family: 'Times New Roman'; */
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

        .textNormal {
            text-transform: none;
            font-size: 1.3rem;
        }

        .sign {
            display: block;
            margin-left: 0;
            margin-right: 10px;
            text-align: center;
            font-weight: 600;
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
        <button class="btn btn-outline-dark" onclick='var hist = history.back(); window.location(hist)'>
            Go Back
        </button>
        <input type="text" value="<?php echo $file ?>" width='100%' id="filename" hidden>
    </div>
    <div class="container" style="height: 1500px;border: 2px solid black">

        <!-- first Block (fblock) -->

        <div class="fblock row">
            <div class="fblock1 col-3 font-weight-bold" style="font-size: 13px;">
                क्रमांक. 1<br>
                No. 1<br>
                <img src="../media/maharashtraSarkarLogo.png" height="80">
            </div>

            <div class="fblock2 col-6">
                <img src="../media/Emblem_of_India.svg.png" height="60">
                <!-- <p class="marginp" style="margin-top: 10px;">महाराष्ट्र शासन egkjk"Vª 'kklu</p> -->
                <p class="marginp" style="margin-top: 10px;">महाराष्ट्र शासन</p>
                <p>GOVERMENT OF MAHARASHTRA</p>
                <p class="marginp">आरोग्य विभाग</p>
                <p>DEPARTMENT OF HEALTH</p>
                <p style="margin: 20px 0 20px;">GRAMPANCHAYAT PALASDEO</p>
                <h5 class="marginp font-weight-bold">जन्म प्रमाणपत्र </h5>
                <p class="font-weight-bold" style="font-weight: 500;">BIRTH CERTIFICATE</p>
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
                    नोंदणी नियम, २००० चे नियम ८/१३ अन्वये देण्यात आले आहे.
                    (ISSUED UNDER SECTION 12/17 OF THE REGISTRATION OF BIRTHS & DEATHS ACT, 1969 AND RULE OF THE
                    MAHARASHTRA REGISTRAION OF BIRTHS & DEATHS RULES 200)</p><br>
            </div>
            <div class="sblcok2">
                <p class="marginp">प्रमाणित करण्यात येत आहे कि, खालील माहिती जन्माच्या मूळ अभिलेखाच्या नोंदणीतून
                    घेण्यात आली आहे, जी की ग्रामपंचायत पळसदेव, तालुका इंदापूर, जिल्हा पुणे, महाराष्ट्र राज्याच्या
                    नोंदवहीत उल्लेख आहे.</p>
                <p>THIS IS TO CERTIFY THAT THE FOLLOWING INFROMATION HAS BEEN TAKEN FROM THE ORIGINAL RECORD OF DEATH
                    WHICH IS THE REGISTER FOR GRAMPANCHAYAT PALASDEO OF TAHSIL/BLOCK INDAPUR OF DISTRICT PUNE OF
                    STATE/UNION TERRITORY MAHARASHTRA, INDIA</p>
            </div>
        </div>

        <!-- MAIN BLOCK THIRD BLOCK (tblock) -->

        <div class="tblock row font-weight-bold" style="margin-top: 30px;">
            <div class="tdata1 col-7 ">
                <p>नाव / NAME: <span><?php echo $name ?></span>/<span class="hinditext textNormal"><?php echo $name_m ?></span></p>

                <p class="marginp">जन्म तारीख / DATE OF BIRTH:</p>
                <p><span><?php echo $DOB;  ?></span></p>

                <p class="marginp">आईचे पूर्ण नाव / NAME OF MOTHER:</p>
                <p class="marginp"><span><?php echo $nameOfMother;  ?></span></p>
                <p><span class="hinditext textNormal"><?php echo $nameOfMother_m;  ?></span></p>

                <p class="marginp">आधार क्रमांक / MOTHER'S AADHAAR NO:</p>
                <p><span class="hideAadhar"><?php echo $motherAadharNo;  ?></span></p>

                <p class="marginp">बाळाच्या जन्माच्यावेळी आई वडिलांचा पत्ता / ADDRESS OF PARENTS AT THE TIME OF BIRTH OF THE CHILD: </p>
                <?php
                if ($addressDuringBirth_m == 'पळसदेव' || $addressDuringBirth_m == 'बांडेवाडी' || $addressDuringBirth_m == 'काळेवाडी' || $addressDuringBirth_m == 'माळेवाडी') { ?>
                    <span class="hinditext textNormal" style="font-size: 00.9rem;"><?php echo $addressDuringBirth_m;  ?></span></p>
                <?php } else { ?>
                    <span class="hinditext textNormal"><?php echo $addressDuringBirth_m;  ?></span></p>
                <?php }
                ?>
                /<p><span><?php echo $addressDuringBirth ?></span>

                <p class="marginp">नोंदणी क्रमांक / REGISTRATION NO.:</p>
                <p><span><?php echo $id;  ?></span></p>

                <p class="marginp">शेरा /REMARKS (IF ANY):</p>
                <p><span> <?php echo $remark; ?></span></p>
            </div>
            <div class="tdata3 col-5">
                <p>लिंग/SEX: <span><?php echo $sex . "</span>/<span style='font-size: 0.9rem;'>" . $sex_m; ?></span></p>

                <p class="marginp">जन्म ठिकाण / PLACE OF BIRTH: </p>
                <p><span><?php echo $placeOfBirth ?></span>/<span class="hinditext textNormal"><?php echo $placeOfBirth_m; ?></span> </p>

                <p class="marginp"> वडिलांचे पूर्ण नाव / NAME OF FATHER:</p>
                <p><span><?php echo $nameOfFather ?></span>/<span class="hinditext textNormal"><?php echo $nameOfFather_m; ?></span></p>

                <p>आधार क्रमांक / FATHER'S AADHAAR NO.: <span class="hideAadhar"><?php echo $fatherAadharNo; ?></span></p>

                <p class="marginp">आई-वडिलांचा कायमचा पत्ता / PERMANENT ADDRESS OF PARENTS: </p>
                <p class="marginp"><span><?php echo $permanentAddressOfParents; ?></span></p>
                <p><span class="hinditext textNormal"><?php echo $permanentAddressOfParents_m; ?></span></p>

                <p class="marginp"> नोंदणी दिनांक / DATE OF REGISTRATION:</p>
                <p><span><?php echo $dateOfRegistration; ?></span></p>
            </div>
        </div>

        <!-- fourth block (forblock)-->
        <div class="forblock row" style="margin-top: 15px;">
            <div class="fordata1 col-7">
                <p class="marginp">प्रमाणपत्र दिल्याची दिनांक / DATE OF ISSUE:</p>
                <p><span><?php echo date('d-m-Y'); ?></span></p>
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
            <img src="<?php echo $file ?>" height="100px">
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

?>