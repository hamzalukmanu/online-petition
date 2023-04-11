<?php
include("widgets/check_sessions.php");
?>
<!DOCTYPE html>
<html id="start_a_petition" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start a petition</title>
</head>
<body>
<?php
include("./widgets/main_nav.php");
?>
<hr/>


<form style="text-align: center;" action="" method="post">
    <h1>Start a petition</h1>

    <select name="category">
        <option>Choose Category of your petition</option>
        <option value="wildlife">WildLife</option>
        <option value="environment">Environment</option>
        <option value="racism">Racism</option>
        <option value="childabuse">Child Abuse</option>
    </select>
    <br/>

    <label for="title"><i><h5>Title of your petition:</h5></i></label>
    <textarea name="title" id="title"></textarea>
    <br/>

    <label for="explanation"><i><h5>Explain the issue and offer a solution:</h5></i></label>
    <textarea name="title" id="explanation"></textarea>
    <br/>
    <br/>
    <input type="submit">
</form>
</body>
</html>