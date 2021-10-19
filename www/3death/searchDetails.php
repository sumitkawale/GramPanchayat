<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Details</title>
    <style type="text/css">
        select:focus {
            box-shadow: none !important;
        }
    </style>
</head>
<script>
    //for changing the class name (# replacement for active class)
    var element = document.getElementById("deathAdd");
    element.classList.remove("text-light");
    element.classList.add("text-white");
    var elementt = document.getElementById("searchDetails");
    elementt.classList.add("text-light");
    elementt.classList.add("bg-dark");
</script>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-3">
                    <select class="form-select" aria-label="Default select example" id="type" name="permanentAddressOfDeceased" style="opacity: 0.8; font-size: 14px; ">
                        <option value="name" selected>Name </option>
                        <option value="name_m">नाव </option>
                        <option value="sex">Sex </option>
                        <option value="aadharNo">Aadhaar No. </option>
                        <option value="age">Age </option>
                        <option value="dateOfDeath">Death Date </option>
                        <option value="placeOfDeath">Death Place </option>
                        <option value="placeOfDeath_m">मृत्यू ठिकाण </option>
                        <option value="nameOfHusband_Wife">Father/Husband Name </option>
                        <option value="nameOfHusband_Wife_m">वडील@पतीचे नाव </option>
                        <option value="aadhaarOfHusband_Wife">Father/Husband Aadhar no.</option>
                        <option value="nameOfFather">Father Name </option>
                        <option value="nameOfFather_m">वडिलांचे नाव </option>
                        <option value="nameOfMother">Mother Name </option>
                        <option value="nameOfMother_m">आईचे नाव </option>
                        <option value="fatherAadhaar">Father's Aadhaar No. </option>
                        <option value="motherAadhaar">Mother's Aadhaar No. </option>
                        <option value="addressDuringDeath">Address During Death </option>
                        <option value="addressDuringDeath_m">मृत्यूवेळी मृत व्यक्तीचा पत्ता </option>
                        <option value="permanentAddressOfDeceased">Deceased permenant Address </option>
                        <option value="dateOfRegistration">Reg. Date </option>
                    </select>
                </div>

                <div class=" col-md-3">
                    <div class="form-outline">
                        <input type="search" id="input" class="form-control" />
                        <label class="form-label" for="input">Enter Text To Search</label>
                    </div>
                </div>
                <div class=" col-md-3">
                    <button id="searchBtn" onclick="call(); enableBtn();" class="btn btn-dark btn-block">SEARCH</button>
                </div>
            </div>

        </div>

        <div class="container mt-5">
            <div class="table-responsive" id="output">
            </div>
        </div>
        <div id="pageButtons">
            <?php include '../resources/PageButtons.php'; ?>
        </div>
    </main>
</body>

</html>
<script src="../resources/bootstrap/js/jquery.js"></script>
<?php include '../resources/jsScript.php'; ?>

<script>
    var btnStatus = document.getElementById('pageButtons');
    window.onload = ()=>{
        btnStatus.setAttribute('hidden','');
    };
    function enableBtn(){
        btnStatus.removeAttribute('hidden');
    }
</script>
<script src="../script/allCommonScripts.js"></script>