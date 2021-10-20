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
	</style>
</head>
<script>
	//for changing the class name (# replacement for active class)
	var element = document.getElementById("deathAdd");
	element.classList.remove("text-light");
	element.classList.add("text-white");
	var elementt = document.getElementById("addDetails");
	elementt.classList.add("text-light");
	elementt.classList.add("bg-dark");
</script>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

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
			<h1 class="h2">Death Certificate</h1>
		</div>
	</div>

	<div class="container">
		<form action="./form/dataEntry.php" method="POST" class="" onsubmit="return validate(this, 'addressDuringDeath')">
			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="name" name="name" />
						<label class="form-label" for="name">Full Name of Deceased</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="name_m" name="name_m" />
						<label class="form-label hinditext" for="name_m">मृताचे पूर्ण नाव</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">

				<div class="col-6">
					<span class="m-4">Sex &nbsp;&nbsp; लिंग: </span>
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

				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text" style="opacity: 0.8; font-size: 14px; " id="dateOfDeath">Death Date</span>
						<input required type="date" class="form-control" aria-label="dateOfDeath" aria-describedby="dateOfDeath" name="dateOfDeath" />
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col-12">
					<div class="form-outline aadhar-input">
						<input required type="number" class="form-control" id="aadharNo" name="aadharNo" />
						<label class="form-label" data-label="deceased" for="aadharNo">Aadhar number of deceased</label>
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
						<label class="form-label" for="nameOfHusband_Wife">Full Name of Father / Husband</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="nameOfHusband_Wife_m" name="nameOfHusband_Wife_m" />
						<label class="form-label hinditext" for="nameOfHusband_Wife_m">वडील @ पतीचे पूर्ण नाव</label>
					</div>
				</div>
			</div>

				<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="nameOfMother" name="nameOfMother" />
						<label class="form-label" for="nameOfMother">Full Name of Mother</label>
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
					<div class="form-outline">
						<textarea required class="form-control" rows="1" id="addressDuringDeath" name="addressDuringDeath"></textarea>
						<label class="form-label" for="addressDuringDeath">Address of Deceased at time of Death</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<textarea required class="form-control hinditext" rows="1" id="addressDuringDeath_m" name="addressDuringDeath_m"></textarea>
						<label class="form-label hinditext" for="addressDuringDeath_m">मृत्यूच्या वेळी मृत व्यक्तीचा पत्ता</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<textarea required class="form-control" rows="1" id="permanentAddressOfDeceased" name="permanentAddressOfDeceased"></textarea>
						<label class="form-label" for="permanentAddressOfDeceased">Permanant address of Deceased</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<textarea required class="form-control hinditext" rows="1" id="permanentAddressOfDeceased_m" name="permanentAddressOfDeceased_m"></textarea>
						<label class="form-label hinditext" for="permanentAddressOfDeceased_m">मृत व्यक्तीचा कायम पत्ता</label>
					</div>
				</div>
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
			<!-- //////////////////////////////////////////////////////////////// -->


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