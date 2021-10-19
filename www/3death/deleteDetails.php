<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete Details</title>
</head>
<script>
    //for changing the class name (# replacement for active class)
    var element = document.getElementById("deathAdd");
    element.classList.remove("text-light");
    element.classList.add("text-white");
    var elementt = document.getElementById("deleteDetails");
    elementt.classList.add("text-light");
    elementt.classList.add("bg-dark");
</script>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-0">
        <?php
        ////////////////// Delete Success ///////////
        if (isset($_SESSION["deleteSuccess"])) {
            if ($_SESSION["deleteSuccess"] == 1) {
                $_SESSION["deleteSuccess"] = 0;
        ?>
                <div class="alert alert-warning mb-0 alert-dismissible alert-static fade show go-up animate-hide full-alert" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: auto;">
                    <?php echo $bin; ?>
                    Deleted Successfully !
                    <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            if ($_SESSION["deleteSuccess"] == 2) {
                $_SESSION["deleteSuccess"] = 0;
            ?>
                <div class="alert alert-danger mb-0 alert-dismissible alert-static fade show go-up animate-hide full-alert" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: auto;">
                    <?php echo "☹"; ?>
                    Password Incorrect. Deletion Operation Terminated (Failed).
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
        <form method="POST" action="./form/dataDelete.php">

            <div class="container mt-5" id="output">
                <!-- ajax table -->
            </div>
            <!-- Modal -->
            <div class="modal top fade" style="margin-top: 10rem;" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                <div class="modal-dialog  ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete the data?</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            If you want to delete the data you have to enter the password..
                            <div class="form-outline w-50 mx-auto mt-3">
                                <input type="password" id="typePassword" name="typePassword" class="form-control" />
                                <label class="form-label" for="typePassword">Password</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-mdb-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include '../resources/PageButtons.php'; ?> 
    </main>
</body>

</html>
<script src="../resources/bootstrap/js/jquery.js"></script>
<?php include '../resources/jsScript.php'; ?>
<script>
            
    function selectRow(row, id) {
        let checkbox = document.getElementById(id.toString());
        checkbox.checked = !checkbox.checked;
        if (checkbox.checked) {
            row.style.backgroundColor = 'grey';
            row.style.color = 'white';
        } else {
            row.style.backgroundColor = 'white';
            row.style.color = 'black';
        }
    }
    window.onload = () => {
        call()
    };
</script>
<script src="../script/allCommonScripts.js"></script>