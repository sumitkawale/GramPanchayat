"user strict"
let loginBtn = document.getElementById("login-btn")
loginBtn.onclick = () => {
    const username = $("#username").val(); // to get value of selected column
    const password = $("#password").val(); // to get input of search input field
    $.ajax({
        url: "./ajax/login.php",
        type: "POST",
        data: {
            username: username,
            password: password
        },
        success: function (data) {
            $('#alert-area').html(data)
        }
    });
}