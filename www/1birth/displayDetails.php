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
	var element = document.getElementById("birthAdd");
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
						<option value="DOB">DOB </option>
						<option value="placeOfBirth">Birth Place </option>
						<option value="placeOfBirth_m">जन्मस्थान </option>
						<option value="nameOfFather">Father Name </option>
						<option value="nameOfFather_m">वडिलांचे नाव </option>
						<option value="nameOfMother">Mother Name </option>
						<option value="nameOfMother_m">आईचे नाव </option>
						<option value="fatherAadharNo">Father's Aadhaar No. </option>
						<option value="motherAadharNo">Mother's Aadhaar No. </option>
						<option value="addressDuringBirth">Parents Address During Birth </option>
						<option value="addressDuringBirth_m">मुलाच्या जन्मावेळी पालकांचा पत्ता </option>
						<option value="permanentAddressOfParents">Parents permenant Address </option>
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
	<!-- modal -->

	<!-- Modal -->
	<div class="modal fade" id="exampleModalupd" tabindex="-1" aria-labelledby="exampleModalLabelupd" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabelupd">Birth Certificate</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="./form/dataUpdate.php" method="post" class="" onsubmit="return validate(this, 'addressDuringBirth')">
						<!-- 2 column grid layout with text inputs for the first and last names -->
						<input type="number" data-type="id" name="idToUpdate" id="idToUpdate" hidden style="display:none;opacity:0;">
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
									<input required type="date" class="form-control" placeholder="dob" aria-label="DOB" aria-describedby="DOB" name="DOB" id="dob" style="background: transparent;" />
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
		document.getElementById('dob').value = document.getElementById('DOB' + id).innerHTML;
		document.getElementById('placeOfBirth').value = document.getElementById('placeOfBirth' + id).innerHTML;
		document.getElementById('placeOfBirth_m').value = document.getElementById('placeOfBirth_m' + id).innerHTML;
		document.getElementById('nameOfFather').value = document.getElementById('nameOfFather' + id).innerHTML;
		document.getElementById('nameOfFather_m').value = document.getElementById('nameOfFather_m' + id).innerHTML;
		document.getElementById('nameOfMother').value = document.getElementById('nameOfMother' + id).innerHTML;
		document.getElementById('nameOfMother_m').value = document.getElementById('nameOfMother_m' + id).innerHTML;
		document.getElementById('fatherAadharNo').value = document.getElementById('fatherAadharNo' + id).innerHTML;
		document.getElementById('motherAadharNo').value = document.getElementById('motherAadharNo' + id).innerHTML;
		var birthAddress = document.getElementById('addressDuringBirth' + id).innerHTML;
		if (birthAddress == 'Palasdeo' || birthAddress == 'Kalewadi' || birthAddress == 'Malewadi' || birthAddress == 'Bandewadi') {
			document.getElementById('addressDuringBirth').value = birthAddress;
			document.getElementById('display').style.display = "none";
			document.getElementById('addressDuringBirth').name = "addressDuringBirth";
			document.getElementById('addressDuringBirthOther').name = "";
			document.getElementById('addressDuringBirthOther_m').name = "";
			document.getElementById('addressDuringBirth').setAttribute('required', '');
			document.getElementById('addressDuringBirthOther').removeAttribute('required');
			document.getElementById('addressDuringBirthOther_m').removeAttribute('required');
			document.getElementById('otherOption').innerHTML = "Other";
		} else {
			document.getElementById('addressDuringBirth').value = 'other';
			document.getElementById('addressDuringBirthOther').value = birthAddress;
			document.getElementById('addressDuringBirthOther_m').value = document.getElementById('addressDuringBirth_m' + id).innerHTML;;
			document.getElementById('display').style.display = "block";
			document.getElementById('addressDuringBirth').name = "";
			document.getElementById('addressDuringBirthOther').name = "addressDuringBirth";
			document.getElementById('addressDuringBirthOther_m').name = "addressDuringBirth_m";
			document.getElementById('addressDuringBirth').removeAttribute('required');
			document.getElementById('addressDuringBirthOther').setAttribute('required', '');
			document.getElementById('addressDuringBirthOther_m').setAttribute('required', '');
			document.getElementById('otherOption').innerHTML = "Other (Enter the Address Below)";
			document.getElementById('addressDuringBirthOther').focus();
		}
		document.getElementById('permanentAddressOfParents').value = document.getElementById('permanentAddressOfParents' + id).innerHTML;
		document.getElementById('permanentAddressOfParents_m').value = document.getElementById('permanentAddressOfParents_m' + id).innerHTML;
		document.getElementById('regdate').value = document.getElementById('dateOfRegistration' + id).innerHTML;
		document.getElementById('remark').value = document.getElementById('remark' + id).innerHTML;

		//document.getElementById('').value = document.getElementById('' + id).innerHTML;
	}
</script>
<script src="../script/allCommonScripts.js"></script>