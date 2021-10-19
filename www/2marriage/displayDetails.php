<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Display Details</title>
</head>

<script>
	//for changing the class name (# replacement for active class)
	var element = document.getElementById("marriageAdd");
	element.classList.remove("text-light");
	element.classList.add("text-white");
	var elementt = document.getElementById("displayDetails");
	elementt.classList.add("text-light");
	elementt.classList.add("bg-dark");
</script>

<body>
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
					<button id="searchBtn" onclick="call()" class="btn btn-dark btn-block">SEARCH</button>
				</div>
			</div>
		</div>
		<div class="container mt-2">
			<div class="table-responsive" id="output">
			</div>
		</div>
		<?php include '../resources/PageButtons.php'; ?>
	</main>
	<!-- modal -->
	<!-- Modal -->
	<div class="modal fade" id="exampleModalupd" tabindex="-1" aria-labelledby="exampleModalupd" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalupd">Marriage Certificate</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="./form/dataUpdate.php" method="post" class="" onsubmit="return validate(this, 'husbandAddress')">
						<!-- 2 column grid layout with text inputs for the first and last names -->
						<input type="number" data-type="id" name="idToUpdate" id="idToUpdate" hidden style="display:none;opacity:0;">
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
									<input type="date" class="form-control" aria-label="dateOfReg" aria-describedby="dateOfReg" id="regdate" name="dateOfReg" />
								</div>
							</div>
						</div>

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
		document.getElementById('husbandName').value = document.getElementById('husbandName' + id).innerHTML;
		document.getElementById('husbandName_m').value = document.getElementById('husbandName_m' + id).innerHTML;
		document.getElementById('wifeName').value = document.getElementById('wifeName' + id).innerHTML;
		document.getElementById('wifeName_m').value = document.getElementById('wifeName_m' + id).innerHTML;
		document.getElementById('husbandAge').value = document.getElementById('husbandAge' + id).innerHTML;
		document.getElementById('wifeAge').value = document.getElementById('wifeAge' + id).innerHTML;
		document.getElementById('husbandAadharNo').value = document.getElementById('husbandAadharNo' + id).innerHTML;
		document.getElementById('wifeAadharNo').value = document.getElementById('wifeAadharNo' + id).innerHTML;
		document.getElementById('husbandReligion').value = document.getElementById('husbandReligion' + id).innerHTML;
		document.getElementById('husbandReligion_m').value = document.getElementById('husbandReligion_m' + id).innerHTML;
		document.getElementById('wifeReligion').value = document.getElementById('wifeReligion' + id).innerHTML;
		document.getElementById('wifeReligion_m').value = document.getElementById('wifeReligion_m' + id).innerHTML;
		document.getElementById('husbandNationality').value = document.getElementById('husbandNationality' + id).innerHTML;
		document.getElementById('husbandNationality_m').value = document.getElementById('husbandNationality_m' + id).innerHTML;
		document.getElementById('wifeNationality').value = document.getElementById('wifeNationality' + id).innerHTML;
		document.getElementById('wifeNationality_m').value = document.getElementById('wifeNationality_m' + id).innerHTML;
		document.getElementById('husbandFatherName').value = document.getElementById('husbandFatherName' + id).innerHTML;
		document.getElementById('husbandFatherName_m').value = document.getElementById('husbandFatherName_m' + id).innerHTML;
		document.getElementById('wifeFatherName').value = document.getElementById('wifeFatherName' + id).innerHTML;
		document.getElementById('wifeFatherName_m').value = document.getElementById('wifeFatherName_m' + id).innerHTML;
		var birthAddress = document.getElementById('husbandAddress' + id).innerHTML;
		if (birthAddress == 'Palasdeo' || birthAddress == 'Kalewadi' || birthAddress == 'Malewadi' || birthAddress == 'Bandewadi') {
			document.getElementById('husbandAddress').value = birthAddress;
			document.getElementById('display').style.display = "none";
			document.getElementById('husbandAddress').name = "husbandAddress";
			document.getElementById('husbandAddressOther').name = "";
			document.getElementById('husbandAddressOther_m').name = "";
			document.getElementById('husbandAddress').setAttribute('required', '');
			document.getElementById('husbandAddressOther').removeAttribute('required');
			document.getElementById('husbandAddressOther_m').removeAttribute('required');
			document.getElementById('otherOption').innerHTML = "Other";
		} else {
			document.getElementById('husbandAddress').value = 'other';
			document.getElementById('husbandAddressOther').value = birthAddress;
			document.getElementById('husbandAddressOther_m').value = document.getElementById('husbandAddress_m' + id).innerHTML;;
			document.getElementById('display').style.display = "block";
			document.getElementById('husbandAddress').name = "";
			document.getElementById('husbandAddressOther').name = "husbandAddress";
			document.getElementById('husbandAddressOther_m').name = "husbandAddress_m";
			document.getElementById('husbandAddress').removeAttribute('required');
			document.getElementById('husbandAddressOther').setAttribute('required', '');
			document.getElementById('husbandAddressOther_m').setAttribute('required', '');
			document.getElementById('otherOption').innerHTML = "Other (Enter the Address Below)";
			document.getElementById('husbandAddressOther').focus();
		}
		document.getElementById('wifeAddress').value = document.getElementById('wifeAddress' + id).innerHTML;
		document.getElementById('wifeAddress_m').value = document.getElementById('wifeAddress_m' + id).innerHTML;
		document.getElementById('dateOfMarriage').value = document.getElementById('dateOfMarriage' + id).innerHTML;
		document.getElementById('placeOfMarriage').value = document.getElementById('placeOfMarriage' + id).innerHTML;
		document.getElementById('placeOfMarriage_m').value = document.getElementById('placeOfMarriage_m' + id).innerHTML;
		document.getElementById('regdate').value = document.getElementById('dateOfRegistration' + id).innerHTML;

		//document.getElementById('').value = document.getElementById('' + id).innerHTML;
	}
</script>
<script src="../script/allCommonScripts.js"></script>