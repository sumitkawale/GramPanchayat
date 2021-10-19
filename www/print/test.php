<!-- // use this file for only testing purpose.... 😉 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <title>Title</title>
</head>

<body>
    <select id="type">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <input type="text" id="input" placeholder="search">
    <button id="searchBtn" onclick="call()">Search</button>
    <br>
    <hr>
    <br>

    <body>
        <div id="output"></div>
    </body>
</body>

</html>
<script src="../resources/bootstrap/js/jquery.js"></script>

<script>
    let call = () => {
        var type = $("#type").val(); // to get value of selected column
        var input = $("#input").val(); // to get input of search input field

        $.ajax({
            url: "test2.php",
            type: "POST",
            data: {
                type: type,
                input: input
            },
            success: function(data) {
                $('#output').html(data);
            }
        });
    }
</script>