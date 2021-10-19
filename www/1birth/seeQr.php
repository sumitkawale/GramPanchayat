<?php
include '../navbar.php';
include '../resources/cssLinks.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>See QR</title>
</head>

<script>
    //for changing the class name (# replacement for active class)
    var element = document.getElementById("birthAdd");
    element.classList.remove("text-light");
    element.classList.add("text-white");
    var elementt = document.getElementById("seeQr");
    elementt.classList.add("text-light");
    elementt.classList.add("bg-dark");
</script>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
        <?php if (isset($_GET['pgno'])) {
            echo $_GET['pgno'];
        } ?>
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

        <div class="container mt-5">
            <div class="table-responsive" id="output">
            </div>
        </div>

        <!-- Modal -->
        <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="modal">

                    </div>
                    <div class="modal-body">
                        <img src="" id="qrimg" height="475px"></img>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-mdb-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../resources/PageButtons.php'; ?>
    </main>

</body>

</html>
<script src="../resources/bootstrap/js/jquery.js"></script>
<?php include '../resources/jsScript.php'; ?>
<script>

    let selectRow = (row, id) => {
        
        $.ajax({
            url: "./ajax/generateQR.php",
            type: "POST",
            data: {
                id: id
            },
            success: function(data) {
                $('#modal').html(data);
                var qr = document.getElementById('qrimg');
                qr.src = "../qrImage/"+id+"qrImg.png";
                //setTimeout(10, deleteQR(id));
                //setTimeout(10000, deleteQR(id));
                //deleteQR(id);
            }
        });                 
    };
    window.onload = () => {
        call();
        deleteQR(2);
    };
</script>
<script src="../script/allCommonScripts.js"></script>