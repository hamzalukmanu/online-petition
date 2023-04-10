<?php
include ("widgets/check_sessions.php");
?>
<!DOCTYPE html>
<html id="sign_up" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>
<?php
include("./widgets/main_nav.php");
?>
<hr/>

<h2 style="text-align: center;">Sign Up</h2>

<form style="text-align: center;" action="./activities/sign_up_activity.php" method="post">

    <label for="#username"><i>
            <h5>Name:</h5>
        </i></label>
    <br/>
    <input id="username" required name="name" type="text">

    <label for="#email"><i>
            <h5>Email:</h5>
        </i></label>
    <br/>
    <input id="email" required name="email" type="email">

    <label for="#password"><i>
            <h5>Password:</h5>
        </i></label>

    <input id="password" required name="password" type="password">
    <br/>
    <br/>
    <input type="submit">
</form>
</body>

</html>