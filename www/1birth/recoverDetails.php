<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recover Details</title>
</head>

<script>
    //for changing the class name (# replacement for active class)
    var element = document.getElementById("birthAdd");
    element.classList.remove("text-light");
    element.classList.add("text-white");

    var elementt = document.getElementById("recover");
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
                    Data Deleted Successfully !
                    <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
        }
        if (isset($_SESSION["recoverSuccess"])) {

            if ($_SESSION["recoverSuccess"] == 1) {
                $_SESSION["recoverSuccess"] = 0;
            ?>
                <div class="alert alert-success mb-0 alert-dismissible alert-static fade show go-up animate-hide full-alert" id="alertExample" role="alert" id="alert" onclick="setTimeout(hidefun, 2000);" data-mdb-color="secondary" style="width: auto;">
                    Data Recovered Successfully !
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
        <div class="container mt-5" id="output">
            <!-- ajax table -->
        </div>
        <div hidden="true" id="hiddenForms" style="display:none;opacity:0;"></div>
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
            row.style.color = 'black';            }        }
    let deletePermanently = () => {            var input = $(" [name='checkboxes[]' ")
        var form = document.createElement("form")
        form.method = "POST"            
        form.action = "./form/dataDeletePermanently.php"
        input.map((key, val) => {
            form.appendChild(val)            })
        $("#hiddenForms").append(form)
        form.submit()
    };
    let recoverDeleted = () => {            var input = $(" [name='checkboxes[]' ")
        var form = document.createElement("form")
        form.method = "POST"            
        form.action = "./form/dataRecover.php"
        input.map((key, val) => {
            form.appendChild(val)            })
        $("#hiddenForms").append(form)
        form.submit()
    };
    window.onload = ()=>{
        call()
    };
</script>
<script src="../script/allCommonScripts.js"></script>