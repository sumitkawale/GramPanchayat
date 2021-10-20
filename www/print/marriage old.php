<?php
session_start();
$_SESSION["printSuccess"] = 1;
require "../common.php";

function makeMarathiDateText($stringDate)
{
    $stringDate = str_replace("/", " ∕ ", $stringDate);
    $stringDate = str_replace(":", "∶", $stringDate);
    $stringDate = str_replace("-", " ∕ ", $stringDate);
    return $stringDate;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = str_replace("'", "", $id);

    if ($id != "") {
        $dateOfIssue = date('d-m-Y');

        try {
            require "./connection.php";
            $query = "UPDATE marriage_data set 'dateOfIssue' = '$dateOfIssue' where id = '$id'";
            $stm = $connection->prepare($query);

            $statement = $connection->prepare("SELECT * FROM marriage_data WHERE id = '$id';");
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $data = $statement->fetchAll();


            if (count($data)) {
                $data = $data[0];

                // saving data to variables;
                $husbandName            = $data['husbandName'];
                $husbandName_m          = $data['husbandName_m'];

                $wifeName               = $data['wifeName'];
                $wifeName_m             = $data['wifeName_m'];

                $husbandAge             = $data['husbandAge'];
                $wifeAge                = $data['wifeAge'];

                $husbandAadharNo        = $data['husbandAadharNo'];
                $wifeAadharNo           = $data['wifeAadharNo'];

                $husbandReligion        = $data['husbandReligion'];
                $husbandReligion_m      = $data['husbandReligion_m'];

                $wifeReligion           = $data['wifeReligion'];
                $wifeReligion_m         = $data['wifeReligion_m'];

                $husbandNationality     = $data['husbandNationality'];
                $husbandNationality_m   = $data['husbandNationality_m'];

                $wifeNationality        = $data['wifeNationality'];
                $wifeNationality_m      = $data['wifeNationality_m'];

                $husbandFatherName      = $data['husbandFatherName'];
                $husbandFatherName_m    = $data['husbandFatherName_m'];

                $wifeFatherName         = $data['wifeFatherName'];
                $wifeFatherName_m       = $data['wifeFatherName_m'];

                $husbandAddress         = $data['husbandAddress'];
                $husbandAddress_m       = $data['husbandAddress_m'];

                $wifeAddress            = $data['wifeAddress'];
                $wifeAddress_m          = $data['wifeAddress_m'];

                $dateOfMarriage         = $data['dateOfMarriage'];
                $placeOfMarriage        = $data['placeOfMarriage'];
                $placeOfMarriage_m      = $data['placeOfMarriage_m'];

                $dateOfRegistration     = $data['dateOfRegistration'];

                // date strings to be printed in marathi
                $dateOfMarriage_m       = makeMarathiDateText($dateOfMarriage);
                $dateOfRegistration_m   = makeMarathiDateText($dateOfRegistration);
                $dateOfIssue_m          = makeMarathiDateText($dateOfIssue);
            } else {
                $id                     = " − ";
                $husbandName            = " − ";
                $husbandName_m          = " − ";

                $wifeName               = " − ";
                $wifeName_m             = " − ";

                $husbandAge             = " − ";
                $wifeAge                = " − ";

                $husbandAadharNo        = " − ";
                $wifeAadharNo           = " − ";

                $husbandReligion        = " − ";
                $husbandReligion_m      = " − ";

                $wifeReligion           = " − ";
                $wifeReligion_m         = " − ";

                $husbandNationality     = " − ";
                $husbandNationality_m   = " − ";

                $wifeNationality        = " − ";
                $wifeNationality_m      = " − ";

                $husbandFatherName      = " − ";
                $husbandFatherName_m    = " − ";

                $wifeFatherName         = " − ";
                $wifeFatherName_m       = " − ";

                $husbandAddress         = " − ";
                $husbandAddress_m       = " − ";

                $wifeAddress            = " − ";
                $wifeAddress_m          = " − ";

                $dateOfMarriage         = " − ";
                $placeOfMarriage        = " − ";
                $placeOfMarriage_m      = " − ";

                $dateOfRegistration     = " − ";

                $dateOfMarriage_m       = " − ";
                $dateOfRegistration_m   = " − ";
            }
            // generating qrcode
            require_once '../phpqrcode/qrlib.php';
            $arrayData =
                array(
                    'husbandName' => $husbandName,
                    'wifeName' => $wifeName,
                    'husbandAge' => $husbandAge,
                    'wifeAge' => $wifeAge,
                    'husbandReligion' => $husbandReligion,
                    'wifeReligion' => $wifeReligion,
                    'husbandAddress' => $husbandAddress,
                    'wifeAddress' => $wifeAddress,
                    'dateOfMarriage' => $dateOfMarriage,
                    'placeOfMarriage' => $placeOfMarriage
                );
            $jsonString = json_encode($arrayData);
            $jsonString = json_encode($arrayData);
            $jsonString = str_replace('"', '%27', $jsonString);
            $jsonString = str_replace(',', '%2C', $jsonString);
            $jsonString = str_replace(':', '%3A', $jsonString);
            $jsonString = str_replace('{', '%7B', $jsonString);
            $jsonString = str_replace('}', '%7D', $jsonString);
            $jsonString = str_replace(' ', '%20', $jsonString);
            $text = "https://sumitkawale.github.io/QR-Code-Generators-Static.github.io/marriage.html?data=%22$jsonString%22";
            $path = '../qrImage/';
            $file = $path . $id . $husbandName . 'qrImg.png';
            QRcode::png($text, $file, 'L', 8); //echo $file;
        } catch (PDOException $e) {
            echo "error aala aahe " . $e;
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
            <link rel="stylesheet" href="../resources/fontawesome/css/all.min.css">
            <title>Marriage Certificate</title>

            <!-- code starts here -->
            <style>
                :root {
                    --heading: 1.2rem;
                    --title: 1.1rem;
                }

                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                body {
                    text-transform: capitalize;
                    font-family: Times, 'Times New Roman';
                }

                .main {
                    height: 1500px;
                    border: 2px solid black;
                }

                .topHeadingPanel {
                    font-weight: 600;
                }

                .mainHeadingCenter center p {
                    font-weight: bold;
                    font-size: var(--heading);
                    margin: 0;
                }

                .borderBottom {
                    border-bottom: 1px solid black;
                }

                .borderDark {
                    border: 1.5px solid black;
                }

                .bodyTitlePanel .titlePart {
                    width: 400px;
                    margin: auto;
                    padding-top: 10px;
                    padding-bottom: 5px;

                    border: 2px solid black;
                    box-shadow: 5px 5px 5px black;
                }

                .titlePart center h4 {
                    font-weight: 600;
                }

                .spaceBefore::before {
                    content: "                ";
                    white-space: pre;
                }

                .bodyDetailsPanel p {
                    font-weight: 600;
                    font-size: var(--title);
                    margin: 0px;
                }

                .fontHeading {
                    font-size: var(--heading);
                }

                .fontTitle {
                    font-size: var(--title);
                }

                .bodyDataPanel div p {
                    margin: 5px 0;
                    font-weight: 600;
                }

                .bodyDataPanel div p:nth-child(even) {
                    margin-bottom: 10px;
                }

                .footerBottom {
                    font-weight: 600;
                }

                .textNormal {
                    text-transform: none;
                    font-size: 1.3rem;
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
                }

                .marathiNumber {
                    font-family: "marathiNumber";
                    font-size: 1.4rem;
                }
            </style>
            <!-- code ends here -->
        </head>

        <body>
            <div class="d-print-none m-4">
                <button class="btn btn-outline-dark" onclick='window.history.back()'>
                    Go Back
                </button>
                <input type="text" value="<?php echo $file ?>" width='100%' id="filename" hidden>
            </div>
            <!-- code starts here -->
            <div class="main container-fluid">
                <div class="row">
                    <div class="headingContent borderBottom col-12 mb-3">
                        <div class="topHeadingPanel row borderBottom pb-1">
                            <div class="col-6 text-left">प्रमाणपत्र क्र. <span class="marathiNumber"><?php echo $id ?></span> Certificate No. <span><?php echo $id ?></span></div>
                            <div class="col-6 text-right">नमुना - 'ई' /Form - <span>E</span></div>
                        </div>
                        <div class="mainHeadingPanel row border">
                            <div class="mainHeadingLeft col-3 border-right mt-2">
                                <center>
                                    <div style="width:9em; border: 1px solid gray; padding: 4.5rem 0;">
                                        Photo of Husband
                                        <!-- <img src="../media/Emblem_of_India.svg.png" height="130px" alt="img" class=""> -->
                                    </div>
                                </center>
                            </div>
                            <div class="mainHeadingCenter col-6 p-3 pt-4">
                                <center>
                                    <!-- <p>महाराष्ट्र शासन</p>
                                        <p>GOVERNMENT OF MAHARASHTRA</p>
                                        <p>आरोग्य विभाग</p>
                                        <p>HEALTH DEPARTMENT</p>
                                        <p>प्रमाणित निर्गमित करणाऱ्या स्थानिक क्षेत्राचे नाव</p>
                                        <p>Name of local body issuing certificate</p> -->
                                    <img src="../media/Emblem_of_India.svg.png" height="130px" alt="img">
                                    <br>
                                    <b>महाराष्ट्र शासन</b>
                                </center>
                            </div>
                            <div class="mainHeadingRight col-3 border-left mt-2">
                                <center>
                                    <div style="width:9em; border: 1px solid gray; padding: 4.5rem 0;">
                                        Photo of Wife
                                        <!-- <img src="../media/marriageLogo.png" height="130px" alt="img" class=""> -->
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="bottomHeadingPanel p-1">
                            <center>
                                <p class="fontTitle m-0">
                                    ग्रामपंचायत - पळसदेव. तालुका - इंदापूर. जिल्हा - पुणे
                                </p>
                            </center>
                        </div>
                    </div>
                    <div class="bodyContent col-12">
                        <div class="bodyTitlePanel">
                            <div class="titlePart">
                                <center>
                                    <h4>विवाह नोंदणीचे प्रमाणपत्र</h4>
                                    <h4>MARRIAGE CERTIFICATE</h4>
                                </center>
                            </div>
                        </div>
                        <div class="bodyDetailsPanel p-4">
                            <p class="text-justify">
                                (महाराष्ट्र विवाह मंडळाचे विधीनियम आणि विवाह नोंदणी अधिनियम १९९८ च्या कलम ६(१) विवाह नोंदणी नियम १९९९
                                नियम ५ अन्वये देण्यात आलेले आहे)
                            </p>
                            <p class=" text-justify">
                                (Issued under section 6(1) of the Registration of Marriage Acts, 1998 and issue under
                                Registration of Marriage Rule 1999 Rule 5 of Maharashtra Regulation Marriage Bureaus)
                            </p>
                            <br>
                            <p class=" text-justify">
                                प्रमाणित करण्यात येते कि, खालील माहिती विवाह नोंदणीच्या मुळ अभिलेखाच्या नोंदवहीतून घेण्यात आली
                                आहे. जी कि (स्थानिक क्षेत्र) ग्रामपंचायत - पळसदेव. तालुका - इंदापूर. जिल्हा - पुणे. महाराष्ट्र
                                राज्याच्या नोंदवहीत उल्लेख
                                आहे.
                            </p>
                            <p class=" text-justify">This is to certify that the following information has been taken
                                from the original record of Marriage is the register for (Local Area / Local Body) of District
                                of Maharashtra State.</p>
                        </div>
                        <div class="bodyDataPanel row p-3 pl-4 pr-4 border-top border-bottom">
                            <div class="data1 col-6">
                                <p>वराचे नाव : <span class="marathi textNormal"><?php echo $husbandName_m ?></span></p>
                                <p>Husband Name : <span><?php echo $husbandName ?></span></p>

                                <p>वराचे वय : <span class="marathi marathiNumber"><?php echo $husbandAge ?></span></p>
                                <p>Husband Age : <span><?php echo $husbandAge ?></span></p>

                                <p>वराचा आधार क्र. : <span class="hideAadhar marathi marathiNumber"><?php echo $husbandAadharNo ?></span></p>
                                <p>Husband's Aadhar No. : <span class="hideAadhar"><?php echo $husbandAadharNo ?></span></p>

                                <p>वराचा धर्म : <span class="marathi textNormal"><?php echo $husbandReligion_m ?></span></p>
                                <p>Husband Religion : <span><?php echo $husbandReligion ?></span></p>

                                <p>वराचे राष्ट्रीयत्व : <span class="marathi textNormal"><?php echo $husbandNationality_m ?></span></p>
                                <p>Husband Nationality : <span><?php echo $husbandNationality ?></span></p>

                                <p>वराच्या वडिलांचे नाव : <span class="marathi textNormal"><?php echo $husbandFatherName_m ?></span></p>
                                <p>Husband's Father Name : <span><?php echo $husbandFatherName ?></span></p>

                                <?php
                                if ($husbandAddress_m == 'पळसदेव' || $husbandAddress_m == 'बांडेवाडी' || $husbandAddress_m == 'काळेवाडी' || $husbandAddress_m == 'माळेवाडी') { ?>
                                    <p>वराचा पत्ता : <span class="marathi textNormal" style="font-size: 00.9rem;"><?php echo $husbandAddress_m ?></span></p>
                                <?php } else { ?>
                                    <p>वराचा पत्ता : <span class="marathi textNormal"><?php echo $husbandAddress_m ?></span></p>
                                <?php }
                                ?>
                                <p>Husband Address : <span><?php echo $husbandAddress ?></span></p>

                                <p>विवाहाची तारीख : <span class="marathi marathiNumber"><?php echo $dateOfMarriage_m ?></span></p>
                                <p>Date of Marriage : <span><?php echo $dateOfMarriage ?></span></p>
                            </div>
                            <div class="data2 col-6">
                                <p>वधूचे नाव : <span class="marathi textNormal"><?php echo $wifeName_m ?></span></p>
                                <p>Wife Name : <span><?php echo $wifeName ?></span></p>

                                <p>वधूचे वय : <span class="marathi marathiNumber"><?php echo $wifeAge ?></span></p>
                                <p>Wife Age : <span><?php echo $wifeAge ?></span></p>

                                <p>वधूचा आधार क्र. : <span class="hideAadhar marathi marathiNumber"><?php echo $wifeAadharNo ?></span></p>
                                <p>Wife's Aadhar No. : <span class="hideAadhar"><?php echo $wifeAadharNo ?></span></p>

                                <p>वधूचा धर्म : <span class="marathi textNormal"><?php echo $wifeReligion_m ?></span></p>
                                <p>Wife Religion : <span><?php echo $wifeReligion ?></span></p>

                                <p>वधूचे राष्ट्रीयत्व : <span class="marathi textNormal"><?php echo $wifeReligion_m ?></span></p>
                                <p>Wife Nationality : <span><?php echo $wifeReligion ?></span></p>

                                <p>वधूच्या वडिलांचे नाव : <span class="marathi textNormal"><?php echo $wifeFatherName_m ?></span></p>
                                <p>Wife's Father Name : <span><?php echo $wifeFatherName ?></span></p>

                                <p>वधूचा पत्ता : <span class="marathi textNormal"><?php echo $wifeAddress_m ?></span></p>
                                <p>Wife Address : <span><?php echo $wifeAddress ?></span></p>

                                <p>विवाहाचे ठिकाण : <span class="marathi textNormal"><?php echo $placeOfMarriage_m ?></span></p>
                                <p>Place Of Marriage : <span><?php echo $placeOfMarriage ?></span></p>
                            </div>
                        </div>
                    </div>
                    <!-- <img src="../qrImage/qrImg.png" height="75px"> -->
                    <div class="footerContent col-12" style="margin-top: 8px;">
                        <div class="footerBottom row">
                            <div class="footerBottomLeft col-1">
                                <img src="<?php echo $file ?>" height="100px" style='margin-left:20px;'>
                            </div>
                            <div class="footerDetailsPanel pl-5 pr-5 col-11">
                                <center>
                                    <p class="text-justify pl-5 pr-5">
                                        महाराष्ट्र विवाह मंडळाचे विधीनियाम आणि विवाह नोंदणी विधेयक, १९९८ अन्वये ठेवण्यात आलेल्या
                                        नोंदवहीच्या नोंदणी खंड क्रमांक २४ वर दिनांक <span class="marathiNumber"><?php echo $dateOfRegistration_m ?> </span> रोजी माझ्या कडून नोंदणी करण्यात
                                        आली आहे.
                                    </p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="footerContent col-12" style="margin-top: 8px;">
                        <div class="footerBottom row">
                            <div class="footerBottomLeft col-4">
                                <center>
                                    <p class="m-0 mb-2">प्रमाणपत्र दिल्याचा दिनांक : <span class="marathiNumber"><?php echo $dateOfIssue_m ?></span></p>
                                    <p class="m-0 ">Certificate Issue Date : <span><?php echo $dateOfIssue; ?></span></p>
                                </center>
                            </div>
                            <div class="footerBottomCenter col-4">
                                <center>
                                    <div class="borderDark d-inline-block p-3">
                                        <span>शिक्का</span><br>
                                        <span>Seal</span>
                                    </div>
                                </center>
                            </div>
                            <div class="footerBottomRight col-4">
                                <center>
                                    <p>
                                        प्राधिकारी ची सही<br>
                                        निबंधक जन्म - मृत्यू व विवाह नोंदणी<br>
                                        Signature / Name of Birth, Death and<br>
                                        Marriage Registration<br>
                                    </p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($id != " − ") { ?>
                <script src="../resources/bootstrap/js/jquery.js"></script>
                <script>
                    hideAadhar();
                    print();

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
                </script>
            <?php } ?>
            <!-- code ends here -->

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