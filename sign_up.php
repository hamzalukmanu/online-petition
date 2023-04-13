<?php
include ("widgets/check_sessions.php");
?>
<!DOCTYPE html>
<html id="sign_up" lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Petition Power | Sign Up</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/styles.css" rel="stylesheet"/>
</head>

<body>
<?php
include("./widgets/main_nav.php");
?>
<section class="bg-light py-5">
    <div class="container px-5 my-5 px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <?php
                if (sessionHas("sign_up_error")){
                    sendAlert("An error occurred while creating your account. Please try again later!", "danger");
                }
                ?>
                <h2 style="text-align: center;">Sign Up</h2>
                <form action="./activities/sign_up_activity.php" method="post">
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." required />
                        <label for="name">Name</label>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                        <label for="email">Email address</label>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password" placeholder="password" required />
                        <label for="password">password</label>
                    </div>
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Sign Up</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("./widgets/footer.php");
?>
</body>

</html>