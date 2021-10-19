<?php

function showErr()
{
    echo "
        <h1 style='padding:1.2rem'>
            Hmmm🤔... Something went wrong.. or Maybe You are on wrong page..
        </h1>
        <button style='padding:10px 20px; background:orange; color:white; border-radius:1rem; zoom:1.6' onclick='window.history.back()'>
            Go Back
        </button>
    ";
}
?>

<script>
    function hideAadhar() {
        let aadharSpans = document.getElementsByClassName('hideAadhar')

        for (let i = 0; i < aadharSpans.length; i++) {
            // aadharSpans[i].innerHTML = "××××××××" + aadharSpans[i].innerHTML.substring(8)
        }
    }

    function validate(form, selectBox) {
        let aadharInputs = document.getElementsByClassName("aadhar-input");
        let status = true;
        for (let i = aadharInputs.length - 1; i >= 0; i--) {
            let aadharInput = aadharInputs[i]
            let input = aadharInput.children[0]
            let label = aadharInput.children[1]
            let value = input.value
            if (value.length != 12) {
                label.innerHTML = "Pease enter valid Aadhar no. of " + label.getAttribute("data-label")
                label.style.color = "red"
                status = false;
                input.focus()
            } else {
                label.innerHTML = label.getAttribute("data-label") + "'s Aadhar no."
                label.style.color = "gray"
            }
        }

        let select = form[selectBox]
        if (select.value == "-1") {
            select.style.color = "red"
            select.focus();
            select[0].innerHTML = select[0].getAttribute("data-warning")
            status = false;
        }

        return status;
    }
</script>