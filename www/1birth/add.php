<?php

include '../navbar.php';
include '../resources/cssLinks.php';
?>

<head>
	<title>Add Details</title>
	<style type="text/css">
		select:focus {
			box-shadow: none !important;
		}

		/* body{
			background-image: url('bk.jpg') !important;
  			background-size: cover;
		} */
	</style>

</head>
<script>
	//for changing the class name (# replacement for active class)
	var element = document.getElementById("birthAdd");
	element.classList.remove("text-light");
	element.classList.add("text-white");
	var elementt = document.getElementById("addDetails");
	elementt.classList.add("text-light");
	elementt.classList.add("bg-dark");
</script>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

	<?php
	//////////////// Login Success ////////////////////
	if (isset($_SESSION["loginSuccess"])) {
		if ($_SESSION["loginSuccess"] == 1) {
			$_SESSION["loginSuccess"] = 0;
	?>
			<div class="alert alert-success mb-0 alert-dismissible alert-static fade show go-up animate-hide full-alert" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: auto;">
				<?php echo $tick; ?>
				Login Successfull
				<button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php
		}
	}
	?>

	<?php
	////////////////// Save Success ///////////
	if (isset($_SESSION["saveSuccess"])) {
		if ($_SESSION["saveSuccess"] == 1) {
			$_SESSION["saveSuccess"] = 0;
	?>
			<div class="alert alert-success mb-0 alert-dismissible alert-static fade show go-up animate-hide full-alert" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary">
				<?php echo $tick; ?>
				<span class="ms-1">Saved Successfully !</span>
				<button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php
		}
	}
	?>

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
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="mx-auto">
			<h1 class="h2">Birth Certificate</h1>
		</div>
	</div>

	<div class="container">
		<form action="./form/dataEntry.php" method="post" class="" onsubmit="return validate(this, 'addressDuringBirth')">
			<!-- 2 column grid layout with text inputs for the first and last names -->
			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="name" name="name" />
						<label class="form-label" for="name">Born Persons Name</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="name_m" name="name_m" />
						<label class="form-label hinditext" for="name_m">बाळाचे नाव</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">

				<div class="col">
					<span class="m-4">Sex : </span>
					<div class="form-check form-check-inline">
						<input required class="form-check-input" type="radio" name="sex" id="Male" value="Male" required />
						<label class="form-check-label" for="Male">Male</label>
					</div>

					<div class="form-check form-check-inline">
						<input required class="form-check-input" type="radio" name="sex" id="Female" value="Female" required />
						<label class="form-check-label" for="Female">Female</label>
					</div>

					<div class="form-check form-check-inline">
						<input required class="form-check-input" type="radio" name="sex" id="Other" value="Other" required />
						<label class="form-check-label" for="Other">Other</label>
					</div>
				</div>
				<div class="col">
					<div class="input-group">
						<span class="input-group-text" id="DOB" style="opacity: 0.8; font-size: 14px; ">DOB</span>
						<input required type="date" class="form-control" placeholder="dob" aria-label="DOB" aria-describedby="DOB" name="DOB" style="background: transparent;" />
					</div>
				</div>
			</div>


			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" />
						<label class="form-label" for="placeOfBirth">Place of Birth</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="placeOfBirth_m" name="placeOfBirth_m" />
						<label class="form-label hinditext" for="placeOfBirth_m">जन्मस्थान</label>
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
						<label class="form-label hinditext" for="nameOfFather_m">वडिलांचे पूर्ण नाव</label>
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
						<label class="form-label hinditext" for="nameOfMother_m">आईचे पूर्ण नाव</label>
					</div>
				</div>
			</div>


			<div class="row mb-4">
				<div class="col">
					<div class="form-outline aadhar-input">
						<input required type="number" class="form-control" id="fatherAadharNo" name="fatherAadharNo" />
						<label class="form-label" data-label="Father" for="fatherAadharNo">Father's Aadhar no.</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline aadhar-input">
						<input required type="number" class="form-control" id="motherAadharNo" name="motherAadharNo" />
						<label id="hahaha" class="form-label" data-label="Mother" for="motherAadharNo">Mother's Aadhar no.</label>
					</div>
				</div>
			</div>
			<div class="col mb-4">
				<select required onchange="checkOther(this)" class="form-select" id="addressDuringBirth" name="addressDuringBirth" aria-label="Default select example" style="opacity: 0.8; font-size: 14px;">
					<option data-warning="PLEASE SELECT ADDRESS OF PARENTS AT TIME OF BIRTH OF CHILD" selected value="-1">Address of Parents at time of birth of child</option>
					<option value="Palasdeo">Palasdeo (पळसदेव)</option>
					<option value="Bandewadi">Bandewadi (बांडेवाडी)</option>
					<option value="Kalewadi">Kalewadi (काळेवाडी)</option>
					<option value="Malewadi">Malewadi (माळेवाडी)</option>
					<option value="other" id="otherOption">Other</option>
				</select>
			</div>
			<div id="display" style="display: none;" class="mb-4">
				<div class="form-outline mb-4">
					<textarea class="form-control" rows="1" id="addressDuringBirthOther" name=""></textarea>
					<label class="form-label" for="addressDuringBirthOther">Address of Parents at time of birth of child</label>
				</div>
				<div class="form-outline">
					<textarea class="form-control hinditext" rows="1" id="addressDuringBirthOther_m" name=""></textarea>
					<label class="form-label" for="addressDuringBirthOther_m">मुलाच्या जन्मावेळी पालकांचा पत्ता</label>
				</div>
			</div>
			<script>
				function checkOther(select) {
					var selValue = select.value;
					select.style.color = "black";

					if (selValue == "other") {
						document.getElementById('display').style.display = "block";
						document.getElementById('addressDuringBirth').name = "";
						document.getElementById('addressDuringBirthOther').name = "addressDuringBirth";
						document.getElementById('addressDuringBirthOther_m').name = "addressDuringBirth_m";
						document.getElementById('addressDuringBirth').removeAttribute('required');
						document.getElementById('addressDuringBirthOther').setAttribute('required', '');
						document.getElementById('addressDuringBirthOther_m').setAttribute('required', '');
						document.getElementById('otherOption').innerHTML = "Other (Enter the Address Below)";
						document.getElementById('addressDuringBirthOther').focus();
					} else {
						document.getElementById('display').style.display = "none";
						document.getElementById('addressDuringBirth').name = "addressDuringBirth";
						document.getElementById('addressDuringBirthOther').name = "";
						document.getElementById('addressDuringBirthOther_m').name = "";
						document.getElementById('addressDuringBirth').setAttribute('required', '');
						document.getElementById('addressDuringBirthOther').removeAttribute('required');
						document.getElementById('addressDuringBirthOther_m').removeAttribute('required');
						document.getElementById('otherOption').innerHTML = "Other";
					}
				}
			</script>

			<div class="form-outline mb-4">
				<textarea required class="form-control" id="permanentAddressOfParents" name="permanentAddressOfParents" rows="1"></textarea>
				<label class="form-label" for="permanentAddressOfParents">Permanant Address of Parents</label>
			</div>

			<div class="form-outline mb-4">
				<textarea required class="form-control hinditext" id="permanentAddressOfParents_m" name="permanentAddressOfParents_m" rows="1"></textarea>
				<label class="form-label hinditext" for="permanentAddressOfParents_m">पालकांचा कायम पत्ता</label>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="input-group">
						<span class="input-group-text" style="opacity: 0.8; font-size: 14px; " id="dateOfReg">Registration Date</span>
						<input type="date" class="form-control" aria-label="dateOfReg" aria-describedby="dateOfReg" name="dateOfReg" />
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<textarea class="form-control" rows="1" id="remark" name="remark"></textarea>
						<label class="form-label" for="remark">Remark (if any)</label>
					</div>
				</div>
			</div>
			<!-- Submit button -->
			<div class="row mb-4">
				<div class="col-3">
					<button type="reset" class="btn btn-dark btn-block" name="print">RESET</button>
				</div>
				<div class="offset-3 col-3">
					<button type="submit" class="btn btn-dark btn-block" name="print">Save & Print</button>
				</div>
				<div class="col-3">
					<button type="submit" class="btn btn-success btn-block" name="save">Save</button>
				</div>
			</div>

		</form>
	</div>
	<div class="pt-5 pb-5"></div>
	<div class="pt-5 pb-5"></div>


</main>

<?php
require "../common.php";
include '../resources/jsScript.php';
?>
<script src="../resources/bootstrap/js/jquery.js"></script>
<script src="../resources/bootstrap/js/bootstrap.min.js"></script>
<script src="../resources/bootstrap/js/popper.min.js"></script>