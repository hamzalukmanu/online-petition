<?php
include("widgets/check_sessions.php");
?>
<!DOCTYPE html>
<html id="homepage" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Petition Power | Home</title>
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

<!-- Header-->
<header class="bg-dark py-5 vh-100" style="background-image: url('assets/img/bg.jpg'); background-size: cover;">
    <div class="container px-vh-1005 vh-100" >
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <h1 class="display-5 fw-bolder text-white mb-2">Welcome To Petition Power</h1>
                    <p class="lead text-white-50 mb-4">Join us in making your voice heard on the issues that matter to
                        you. Our online petition platform is your go-to destination for creating and signing petitions
                        that can make a real impact.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="sign_up.php">Get Started</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#about">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5 border-bottom" id="about">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h2 class="h4 fw-bolder">Amplify Your Voice</h2>
                <p>Start a petition and gather support from like-minded individuals who share your passion for change.
                    Together, we can create a powerful movement that demands action.</p>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h2 class="h4 fw-bolder">Drive Change</h2>
                <p>Petition Power has a track record of successful campaigns, with real results that have influenced
                    policy changes, corporate decisions, and more. Your signature can be the catalyst for positive
                    change.
                </p>
            </div>
            <div class="col-lg-4">
                <h2 class="h4 fw-bolder">Easy and Effective</h2>
                <p>Our user-friendly platform makes it simple to create, share, and sign petitions in just a few clicks.
                    Get your petition up and running in no time and start making a difference.
                </p>
            </div>
        </div>
    </div>
</section>


<?php
include("./widgets/footer.php");
?>
</body>
</html>