<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print Certificate</title>
</head>
<script>
    //for changing the class name (# replacement for active class)
    var element = document.getElementById("deathAdd");
    element.classList.remove("text-light");
    element.classList.add("text-white");
    var elementt = document.getElementById("printCertificate");
    elementt.classList.add("text-light");
    elementt.classList.add("bg-dark");

</script>

<body id="body">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-0">
<?php
////////////////// Print Success ///////////
	if (isset($_SESSION["printSuccess"])) {
		if ($_SESSION["printSuccess"] == 1) {
			$_SESSION["printSuccess"] = 0; 
			?>
				<div class="alert alert-success mb-0 alert-dismissible alert-static fade show go-up animate-hide full-alert" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: auto;">
					<?php echo $tick; ?>
  						Printed Successfully !
  					<button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php
		}
	}
?>
        <div class="container mt-5">

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
                    <button id="searchBtn" onclick="call()" class="btn btn-dark btn-block">SEARCH</button>
                </div>
            </div>

        </div>

        <div class="container mt-5">
            <div class="table-responsive" id="output">
            </div>
        </div>
        <?php include '../resources/PageButtons.php'; ?>
    </main>
</body>

</html>
<script src="../resources/bootstrap/js/jquery.js"></script>
<?php include '../resources/jsScript.php'; ?>

<script>
    window.onload = ()=>{
        call()
    };
    function selectRow(row, id){
        var url = "./../print/death.php?id=" + id;
        window.location.href = url;
    }
</script>
<script src="../script/allCommonScripts.js"></script>