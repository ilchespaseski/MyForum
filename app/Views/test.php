<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<script>
$(document).ready(() => {

    $('form').submit(function(e) {
        e.preventDefault();

        let inputs = {};
        $(this).find(':input').each(function() {
            inputs[$(this).attr("name")] = $(this).val();
        });

        $.post('/MyForum/testing', inputs, function(data, status) {
            console.log(data.message);
            console.log(data.status);

        });
    });
});
</script>

<body>
    <form>
        <input type="text" name='testinput'>
        <button name='submit' id="submit"> test </button>
    </form>
</body>

</html>