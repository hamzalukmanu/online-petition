<?php
include ("widgets/check_sessions.php");
?>
<!DOCTYPE html>
<html id="login" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
	<?php
		include("./widgets/main_nav.php");
	?>
    <hr/>

    <h2 style="text-align: center;">Login</h2>

    <form style="text-align: center;" action="activities/login_activity.php" method="post">

        <label for="#email"><i><h5>Email:</h5></i></label>
        <input id="email" name="email" type="email">
        <br/>

        <label for="#password"><i><h5>Password:</h5></i></label>
        <input id="password" name="password" type="password">
        <br/>
        <br/>
        <input type="submit">
    </form>
</body>
</html>