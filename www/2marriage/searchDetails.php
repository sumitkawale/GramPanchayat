<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Details</title>
</head>
<script>
    //for changing the class name (# replacement for active class)
    var element = document.getElementById("marriageAdd");
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
                        <option value="id">ID</option>
                        <option selected value="husbandName">Husband Name </option>
                        <option value="husbandName_m">वराचे नाव </option>
                        <option value="wifeName">Wife Name </option>
                        <option value="wifeName_m">वधूचे नाव </option>
                        <option value="husbandAge">Husband Age </option>
                        <option value="wifeAge">Wife Age </option>
                        <option value="husbandReligion">Husband Religion </option>
                        <option value="husbandReligion_m">वराचा धर्म </option>
                        <option value="wifeReligion">Wife Religion </option>
                        <option value="wifeReligion_m">वधूचा धर्म </option>
                        <option value="husbandNationality">Husband Nationality </option>
                        <option value="wifeNationality">Wife Nationality </option>
                        <option value="husbandFatherName">Husband Father Name </option>
                        <option value="husbandFatherName_m">वराच्या वडिलांचे नाव </option>
                        <option value="wifeFatherName">Wife Father Name </option>
                        <option value="wifeFatherName_m">वधूच्या वडिलांचे नाव </option>
                        <option value="husbandAddress">Husband Address </option>
                        <option value="wifeAddress">Wife Address </option>
                        <option value="wifeAddress_m">वधूचा पत्ता </option>
                        <option value="dateOfMarriage">Date Of Marriage </option>
                        <option value="placeOfMarriage">Place Of Marriage </option>
                        <option value="placeOfMarriage_m">विवाहाचे ठिकाण </option>
                        <option value="dateOfRegistration">Reg. Date </option>
                    </select>
                </div>

                <div class=" col-md-3">
                    <div class="form-outline">
                        <input type="search" id="input" class="form-control" />
                        <label class="form-label" for="input">Enter Text To Search</label>
                    </div>
                </div>

                <div class="col-md-3">
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