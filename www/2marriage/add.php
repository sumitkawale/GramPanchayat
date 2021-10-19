<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>

<head>
	<title>Add Details</title>
</head>
<script>
	//for changing the class name (# replacement for active class)
	var element = document.getElementById("marriageAdd");
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
			<h1 class="h2">Marriage Certificate</h1>
		</div>
	</div>

	<div class="container">
		<form action="./form/dataEntry.php" method="POST" class="" onsubmit="return validate(this, 'husbandAddress')">
			<!-- 2 column grid layout with text inputs for the first and last names -->
			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="husbandName" name="husbandName" />
						<label class="form-label" for="husbandName">Husband Name</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="husbandName_m" name="husbandName_m" />
						<label class="form-label hinditext" for="husbandName_m">वराचे नाव</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="wifeName" name="wifeName" />
						<label class="form-label" for="wifeName">Wife Name</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="wifeName_m" name="wifeName_m" />
						<label class="form-label hinditext" for="wifeName_m">वधूचे नाव</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="number" class="form-control" id="husbandAge" name="husbandAge" />
						<label class="form-label" for="husbandAge">Husband Age</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="number" class="form-control" id="wifeAge" name="wifeAge" />
						<label class="form-label" for="wifeAge">Wife Age</label>
					</div>
				</div>
				<div class="col">
					<div class="input-group">
						<span class="input-group-text" id="dom">Marriage Date</span>
						<input required type="date" class="form-control" aria-label="dom" aria-describedby="dom" id="dateOfMarriage" name="dateOfMarriage" />
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline aadhar-input">
						<input required type="number" class="form-control" id="husbandAadharNo" name="husbandAadharNo" />
						<label class="form-label" data-label="Husband" for="husbandAadharNo">Husband's Aadhar No.</label>
					</div>
				</div>

				<div class="col">
					<div class="form-outline aadhar-input">
						<input required type="number" class="form-control" id="wifeAadharNo" name="wifeAadharNo" />
						<label class="form-label" data-label="Wife" for="wifeAadharNo">Wife's Aadhar No.</label>
					</div>
				</div>

			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="husbandReligion" name="husbandReligion" />
						<label class="form-label" for="husbandReligion">Husband Religion</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="husbandReligion_m" name="husbandReligion_m" />
						<label class="form-label hinditext" for="husbandReligion_m">वराचा धर्म</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="wifeReligion" name="wifeReligion" />
						<label class="form-label" for="wifeReligion">Wife Religion</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="wifeReligion_m" name="wifeReligion_m" />
						<label class="form-label hinditext" for="wifeReligion_m">वधूचा धर्म</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="husbandNationality" name="husbandNationality" />
						<label class="form-label" for="husbandNationality">Husband Nationality</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="husbandNationality_m" name="husbandNationality_m" />
						<label class="form-label hinditext" for="husbandNationality_m">वराचे राष्ट्रीयत्व</label>
					</div>
				</div>
			</div>


			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="wifeNationality" name="wifeNationality" />
						<label class="form-label" for="wifeNationality">Wife Nationality</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="wifeNationality_m" name="wifeNationality_m" />
						<label class="form-label hinditext" for="wifeNationality_m">वधूचे राष्ट्रीयत्व</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="husbandFatherName" name="husbandFatherName" />
						<label class="form-label" for="husbandFatherName">Husband's Father Name</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="husbandFatherName_m" name="husbandFatherName_m" />
						<label class="form-label hinditext" for="husbandFatherName_m">वराच्या वडिलांचे नाव</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="wifeFatherName" name="wifeFatherName" />
						<label class="form-label" for="wifeFatherName">Wife's Father Name</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="wifeFatherName_m" name="wifeFatherName_m" />
						<label class="form-label hinditext" for="wifeFatherName_m">वधूच्या वडिलांचे नाव</label>
					</div>
				</div>
			</div>


			<div class="row mb-4">
				<div class="col">
					<select required onchange="checkOther(this)" class="form-select" aria-label="Default select example" id="husbandAddress" name="husbandAddress" style="opacity: 0.8; font-size: 14px; ">
						<option data-warning="PLEASE SELECT ADDRESS OF HUSBAND" selected value="-1">Husband Address</option>
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
					<textarea class="form-control" rows="1" id="husbandAddressOther" name=""></textarea>
					<label class="form-label" for="husbandAddressOther">Husband Address</label>
				</div>
				<div class="form-outline">
					<textarea class="form-control hinditext" rows="1" id="husbandAddressOther_m" name=""></textarea>
					<label class="form-label" for="husbandAddressOther_m">वराचा पत्ता</label>
				</div>
			</div>
			<script>
				function checkOther(select) {
					var selValue = select.value;
					select.style.color = "black";

					if (selValue == "other") {
						document.getElementById('display').style.display = "block";
						document.getElementById('husbandAddress').name = "";
						document.getElementById('husbandAddressOther').name = "husbandAddress";
						document.getElementById('husbandAddressOther_m').name = "husbandAddress_m";
						document.getElementById('husbandAddress').removeAttribute('required');
						document.getElementById('husbandAddressOther').setAttribute('required', '');
						document.getElementById('husbandAddressOther_m').setAttribute('required', '');
						document.getElementById('otherOption').innerHTML = "Other (Enter the Address Below)";
						document.getElementById('husbandAddressOther').focus();
					} else {
						document.getElementById('display').style.display = "none";
						document.getElementById('husbandAddress').name = "husbandAddress";
						document.getElementById('husbandAddressOther').name = "";
						document.getElementById('husbandAddressOther_m').name = "";
						document.getElementById('husbandAddress').setAttribute('required', '');
						document.getElementById('husbandAddressOther').removeAttribute('required');
						document.getElementById('husbandAddressOther_m').removeAttribute('required');
						document.getElementById('otherOption').innerHTML = "Other";
					}
				}
			</script>
			<div class="form-outline mb-4">
				<textarea required class="form-control" rows="1" id="wifeAddress" name="wifeAddress"></textarea>
				<label class="form-label" for="wifeAddress">Wife Address</label>
			</div>

			<div class="form-outline mb-4">
				<textarea required class="form-control hinditext" rows="1" id="wifeAddress_m" name="wifeAddress_m"></textarea>
				<label class="form-label hinditext" for="wifeAddress_m">वधूचा पत्ता</label>
			</div>

			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control" id="placeOfMarriage" name="placeOfMarriage" />
						<label class="form-label" for="placeOfMarriage">Place of Marriage</label>
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<input required type="text" class="form-control hinditext" id="placeOfMarriage_m" name="placeOfMarriage_m" />
						<label class="form-label hinditext" for="placeOfMarriage_m">विवाहाचे ठिकाण</label>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text" style="opacity: 0.8; font-size: 14px; " id="dateOfReg">Registration Date</span>
						<input type="date" class="form-control" aria-label="dateOfReg" aria-describedby="dateOfReg" name="dateOfReg" />
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
