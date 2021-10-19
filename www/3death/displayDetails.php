<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Display Details</title>
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
	var elementt = document.getElementById("displayDetails");
	elementt.classList.add("text-light");
	elementt.classList.add("bg-dark");
</script>

<body>
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">

		<?php
		//////////////// Login Success ////////////////////
		if (isset($_SESSION["updateSuccess"])) {
			if ($_SESSION["updateSuccess"] == 1) {
				$_SESSION["updateSuccess"] = 0;
		?>
				<div class="alert alert-success mb-3 alert-dismissible alert-static fade show go-up animate-hide full-alert" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: auto;">
					<?php echo $tick; ?>
					Data Updated Successfull
					<button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php
			} else {
				echo "<br><br>";
			}
		} else {
			echo "<br><br>";
		}
		?>
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
					<button id="searchBtn" onclick="call()" class="btn btn-dark btn-block">SEARCH</button>
				</div>
			</div>

		</div>

		<div class="container">
			<div class="table-responsive" id="output">
			</div>
		</div>
		<?php include '../resources/PageButtons.php'; ?>
	</main>
	<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade" id="exampleModalupd" tabindex="-1" aria-labelledby="exampleModalupd" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalupd">Death Certificate</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="./form/dataUpdate.php" method="post" class="" onsubmit="return validate(this, 'addressDuringDeath')">
						<!-- 2 column grid layout with text inputs for the first and last names -->
						<input type="number" data-type="id" name="idToUpdate" id="idToUpdate" hidden style="display:none;opacity:0;">
						<div class="row mb-4">
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control" id="name" name="name" />
									<label class="form-label" for="name">Name of Deceased</label>
								</div>
							</div>
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control hinditext" id="name_m" name="name_m" />
									<label class="form-label hinditext" for="name_m">मृताचे नाव</label>
								</div>
							</div>
						</div>

						<div class="row mb-4">

							<div class="col-4">
								<span class="m-4">Sex : </span>
								<div class="form-check form-check-inline">
									<input required class="form-check-input" type="radio" name="sex" id="male" value="male" required />
									<label class="form-check-label" for="male">Male</label>
								</div>

								<div class="form-check form-check-inline">
									<input required class="form-check-input" type="radio" name="sex" id="female" value="female" required />
									<label class="form-check-label" for="female">Female</label>
								</div>

								<div class="form-check form-check-inline">
									<input required class="form-check-input" type="radio" name="sex" id="other" value="other" required />
									<label class="form-check-label" for="other">Other</label>
								</div>
							</div>
							<div class="col-2">
								<div class="form-outline">
									<input required type="number" class="form-control" id="age" name="age" />
									<label class="form-label" for="age">Deceased Age</label>
								</div>
							</div>

							<div class="col-3">
								<div class="input-group">
									<span class="input-group-text" style="opacity: 0.8; font-size: 14px; " id="dateOfDeath">Death Date</span>
									<input required type="date" class="form-control" aria-label="dateOfDeath" aria-describedby="dateOfDeath" id="dod" name="dateOfDeath" />
								</div>
							</div>

							<div class="col-3">
								<div class="form-outline aadhar-input">
									<input required type="number" class="form-control" id="aadharNo" name="aadharNo" />
									<label class="form-label" data-label="deceased" for="aadharNo">Aadhar no.</label>
								</div>
							</div>
						</div>

						<div class="row mb-4">
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control" id="placeOfDeath" name="placeOfDeath" />
									<label class="form-label" for="placeOfDeath">Place of Death</label>
								</div>
							</div>
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control hinditext" id="placeOfDeath_m" name="placeOfDeath_m" />
									<label class="form-label hinditext" for="placeOfDeath_m">मृत्यू ठिकाण</label>
								</div>
							</div>
						</div>


						<div class="row mb-4">
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control" id="nameOfHusband_Wife" name="nameOfHusband_Wife" />
									<label class="form-label" for="nameOfHusband_Wife">Name of Husband/Wife</label>
								</div>
							</div>
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control hinditext" id="nameOfHusband_Wife_m" name="nameOfHusband_Wife_m" />
									<label class="form-label hinditext" for="nameOfHusband_Wife_m">पती@पत्नीचे नाव</label>
								</div>
							</div>
						</div>

						<div class="row mb-4">
							<div class="col-6">
								<div class="form-outline aadhar-input">
									<input required type="number" class="form-control" id="aadhaarOfHusband_Wife" name="aadhaarOfHusband_Wife" />
									<label class="form-label" data-label="Husband/Wife" for="aadhaarOfHusband_Wife">Aadhar no. of Husband/Wife</label>
								</div>
							</div>
						</div>

						<div class="row mb-4">
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control" id="nameOfFather" name="nameOfFather" />
									<label class="form-label" for="nameOfFather">Name of Father</label>
								</div>
							</div>
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control hinditext" id="nameOfFather_m" name="nameOfFather_m" />
									<label class="form-label hinditext" for="nameOfFather_m">वडिलांचे नाव</label>
								</div>
							</div>
						</div>

						<div class="row mb-4">
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control" id="nameOfMother" name="nameOfMother" />
									<label class="form-label" for="nameOfMother">Name of Mother</label>
								</div>
							</div>
							<div class="col">
								<div class="form-outline">
									<input required type="text" class="form-control hinditext" id="nameOfMother_m" name="nameOfMother_m" />
									<label class="form-label hinditext" for="nameOfMother_m">आईचे नाव</label>
								</div>
							</div>
						</div>


						<div class="row mb-4">
							<div class="col">
								<div class="form-outline aadhar-input">
									<input required type="number" class="form-control" id="fatherAadhaar" name="fatherAadhaar" />
									<label class="form-label" data-label="Father" for="fatherAadhaar">Aadhar no. of Father</label>
								</div>
							</div>
							<div class="col">
								<div class="form-outline aadhar-input">
									<input required type="number" class="form-control" id="motherAadhaar" name="motherAadhaar" />
									<label class="form-label" data-label="Mother" for="motherAadhaar">Aadhar no. of Mother</label>
								</div>
							</div>
						</div>

						<div class="row mb-4">
							<div class="col">
								<select required onchange="checkOther(this)" class="form-select" aria-label="Default select example" id="addressDuringDeath" name="addressDuringDeath" style="opacity: 0.8; font-size: 14px; ">
									<option data-warning="PLEASE SELECT ADDRESS OF DECEASED AT TIME OF DEATH" selected value="-1">Address of Deceased at time of Death</option>
									<option value="Palasdeo">Palasdeo (पळसदेव)</option>
									<option value="Bandewadi">Bandewadi (बांडेवाडी)</option>
									<option value="Kalewadi">Kalewadi (काळेवाडी)</option>
									<option value="Malewadi">Malewadi (माळेवाडी)</option>
									<option value="other" id="otherOption">Other</option>
								</select>
							</div>
						</div>

						<div id="display" style="display: none;" class="mb-4">
							<div class="form-outline mb-4">
								<textarea class="form-control" rows="1" id="addressDuringDeathOther" name=""></textarea>
								<label class="form-label" for="addressDuringDeathOther">Address of Deceased at time of Death</label>
							</div>
							<div class="form-outline">
								<textarea class="form-control hinditext" rows="1" id="addressDuringDeathOther_m" name=""></textarea>
								<label class="form-label" for="addressDuringDeathOther_m">मृत्यूच्या वेळी मृत व्यक्तीचा पत्ता</label>
							</div>
						</div>
						<script>
							function checkOther(select) {
								var selValue = select.value;
								select.style.color = "black";

								if (selValue == "other") {
									document.getElementById('display').style.display = "block";
									document.getElementById('addressDuringDeath').name = "";
									document.getElementById('addressDuringDeathOther').name = "addressDuringDeath";
									document.getElementById('addressDuringDeathOther_m').name = "addressDuringDeath_m";
									document.getElementById('addressDuringDeath').removeAttribute('required');
									document.getElementById('addressDuringDeathOther').setAttribute('required', '');
									document.getElementById('addressDuringDeathOther_m').setAttribute('required', '');
									document.getElementById('otherOption').innerHTML = "Other (Enter the Address Below)";
									document.getElementById('addressDuringDeathOther').focus();
								} else {
									document.getElementById('display').style.display = "none";
									document.getElementById('addressDuringDeath').name = "addressDuringDeath";
									document.getElementById('addressDuringDeathOther').name = "";
									document.getElementById('addressDuringDeathOther_m').name = "";
									document.getElementById('addressDuringDeath').setAttribute('required', '');
									document.getElementById('addressDuringDeathOther').removeAttribute('required');
									document.getElementById('addressDuringDeathOther_m').removeAttribute('required');
									document.getElementById('otherOption').innerHTML = "Other";
								}
							}
						</script>
						<div class="col mb-4">
							<div class="form-outline">
								<textarea required class="form-control" rows="1" id="permanentAddressOfDeceased" name="permanentAddressOfDeceased"></textarea>
								<label class="form-label" for="permanentAddressOfDeceased">Permanant address of Deceased</label>
							</div>
						</div>
						<div class="col mb-4">
							<div class="form-outline">
								<textarea required class="form-control hinditext" rows="1" id="permanentAddressOfDeceased_m" name="permanentAddressOfDeceased_m"></textarea>
								<label class="form-label hinditext" for="permanentAddressOfDeceased_m">मृत व्यक्तीचा कायम पत्ता</label>
							</div>
						</div>

						<div class="row mb-4">
							<div class="col">
								<div class="input-group">
									<span class="input-group-text" style="opacity: 0.8; font-size: 14px; " id="dateOfReg">Registration Date</span>
									<input type="date" class="form-control" aria-label="dateOfReg" aria-describedby="dateOfReg" id="regdate" name="dateOfReg" />
								</div>
							</div>
							<div class="col">
								<div class="form-outline">
									<textarea class="form-control" rows="1" id="remark" name="remark"></textarea>
									<label class="form-label" for="remark">Remark (if any)</label>
								</div>
							</div>
						</div>
						<!-- //////////////////////////////////////////////////////////////// -->


						<!-- Submit button -->
						<div class="row m-0 mb-4">
							<div class="col-3">
								<button type="button" class="btn btn-block btn-dark " data-mdb-dismiss="modal" aria-label="Close" name="">close</button>
							</div>
							<div class="offset-3 col-3">
								<button type="reset" class="btn btn-block btn-primary" name="">Reset</button>
							</div>
							<div class="col-3">
								<button type="submit" class="btn btn-block btn-danger" name="update">Update</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</body>

</html>
<script src="../resources/bootstrap/js/jquery.js"></script>
<?php
include '../resources/jsScript.php';
require "../common.php";
?>

<script>
	window.onload = () => {
		call()
	};

	function passData(id) {
		document.getElementById("idToUpdate").value = id;
		var name = document.getElementById('name' + id).innerHTML;
		document.getElementById('name').value = name;
		document.getElementById('name_m').value = document.getElementById('name_m' + id).innerHTML;
		var sex = document.getElementById('sex' + id).innerHTML;
		document.getElementById(sex).checked = true;
		document.getElementById('aadharNo').value = document.getElementById('aadharNo' + id).innerHTML;
		document.getElementById('age').value = document.getElementById('age' + id).innerHTML;
		document.getElementById('dod').value = document.getElementById('dateOfDeath' + id).innerHTML;
		document.getElementById('placeOfDeath').value = document.getElementById('placeOfDeath' + id).innerHTML;
		document.getElementById('placeOfDeath_m').value = document.getElementById('placeOfDeath_m' + id).innerHTML;
		document.getElementById('nameOfHusband_Wife').value = document.getElementById('nameOfHusband_Wife' + id).innerHTML;
		document.getElementById('nameOfHusband_Wife_m').value = document.getElementById('nameOfHusband_Wife_m' + id).innerHTML;
		document.getElementById('aadhaarOfHusband_Wife').value = document.getElementById('aadhaarOfHusband_Wife' + id).innerHTML;
		document.getElementById('nameOfFather').value = document.getElementById('nameOfFather' + id).innerHTML;
		document.getElementById('nameOfFather_m').value = document.getElementById('nameOfFather_m' + id).innerHTML;
		document.getElementById('nameOfMother').value = document.getElementById('nameOfMother' + id).innerHTML;
		document.getElementById('nameOfMother_m').value = document.getElementById('nameOfMother_m' + id).innerHTML;
		document.getElementById('fatherAadhaar').value = document.getElementById('fatherAadhaar' + id).innerHTML;
		document.getElementById('motherAadhaar').value = document.getElementById('motherAadhaar' + id).innerHTML;
		var birthAddress = document.getElementById('addressDuringDeath' + id).innerHTML;
		if (birthAddress == 'Palasdeo' || birthAddress == 'Kalewadi' || birthAddress == 'Malewadi' || birthAddress == 'Bandewadi') {
			document.getElementById('addressDuringDeath').value = birthAddress;
			document.getElementById('display').style.display = "none";
			document.getElementById('addressDuringDeath').name = "addressDuringDeath";
			document.getElementById('addressDuringDeathOther').name = "";
			document.getElementById('addressDuringDeathOther_m').name = "";
			document.getElementById('addressDuringDeath').setAttribute('required', '');
			document.getElementById('addressDuringDeathOther').removeAttribute('required');
			document.getElementById('addressDuringDeathOther_m').removeAttribute('required');
			document.getElementById('otherOption').innerHTML = "Other";
		} else {
			document.getElementById('addressDuringDeath').value = 'other';
			document.getElementById('addressDuringDeathOther').value = birthAddress;
			document.getElementById('addressDuringDeathOther_m').value = document.getElementById('addressDuringDeath_m' + id).innerHTML;
			document.getElementById('display').style.display = "block";
			document.getElementById('addressDuringDeath').name = "";
			document.getElementById('addressDuringDeathOther').name = "addressDuringDeath";
			document.getElementById('addressDuringDeathOther_m').name = "addressDuringDeath_m";
			document.getElementById('addressDuringDeath').removeAttribute('required');
			document.getElementById('addressDuringDeathOther').setAttribute('required', '');
			document.getElementById('addressDuringDeathOther_m').setAttribute('required', '');
			document.getElementById('otherOption').innerHTML = "Other (Enter the Address Below)";
			document.getElementById('addressDuringDeathOther').focus();
		}
		document.getElementById('permanentAddressOfDeceased').value = document.getElementById('permanentAddressOfDeceased' + id).innerHTML;
		document.getElementById('permanentAddressOfDeceased_m').value = document.getElementById('permanentAddressOfDeceased_m' + id).innerHTML;
		document.getElementById('regdate').value = document.getElementById('dateOfRegistration' + id).innerHTML;
		document.getElementById('remark').value = document.getElementById('remark' + id).innerHTML;

		//document.getElementById('').value = document.getElementById('' + id).innerHTML;
	}
</script>
<script src="../script/allCommonScripts.js"></script>