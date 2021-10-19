var nextValue = 0;
var ajaxUrl = './ajax/printAjax.php';
var currentUrl = window.location.pathname;
var filename = currentUrl.substring(currentUrl.lastIndexOf('/')+1);
//alert(filename);

if(filename == 'recoverDetails.php'){
    //alert(filename)
    ajaxUrl = './ajax/recoverAjax.php';
}
function nextpage(turn){
    if(turn == 'next'){
        nextValue += 1;
    }else if(turn == 'prev'){
        nextValue -= 1;
    }
    callAjax();
}

let call = () => {  
    nextValue = 0;
    callAjax();                   
};

function callAjax(){
    var type = $("#type").val(); // to get value of selected column
    var input = $("#input").val(); // to get input of search input field

    $.ajax({
        url: ajaxUrl,
        type: "POST",
        data: {
            type: type,
            input: input,
            nextValue: nextValue,
            filePage: filename
        },
        success: function(data) {
            $('#output').html(data);
            disableBtn();
        }
    });
}
function disableBtn(){ //disabling the button when pages are over
    disableBtn2('previousbtn', 'lastrowno');
    disableBtn2('nextbtn', 'firstrowno');
}
function disableBtn2(idNameBtn, idNameInput){
    var prevcheck = document.getElementById(idNameInput).value;
    var button = document.getElementById(idNameBtn);
    button.removeAttribute('hidden');
    if(prevcheck == 1){
        button.classList.add('disabled');
    }else if(prevcheck == 2){
        button.setAttribute('hidden','');
    }else{                        
        button.classList.remove('disabled');
    }
}

let deleteQR = (id) => {
                
    $.ajax({
        url: "./ajax/deleteQR.php",
        type: "POST",
        data: {
            id: id
        },
        success: function(data) {
            $('').html(data);
        }
    });

};

// code to change color of row when selected
function changeColor(result) {
    result.checked = !result.checked;
    if (result.checked) {
        result.parentNode.parentNode.style.backgroundColor = 'grey';
        result.parentNode.parentNode.style.color = 'white';
    } else {
        result.parentNode.parentNode.style.backgroundColor = 'white';
        result.parentNode.parentNode.style.color = 'black';
    }
}