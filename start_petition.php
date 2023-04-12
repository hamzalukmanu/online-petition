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
                <h2 style="text-align: center;">Start Petition</h2>
                <form action="./activities/start_petition_activity.php" method="post" enctype="multipart/form-data">
                    <!-- title input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" name="petition_title" type="text" placeholder="Title" required />
                        <label for="title">Petition Title</label>
                    </div>
                    <!-- details input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="details" style="height: 100px" name="petition_details" type="text" placeholder="Details for petition" required></textarea>
                        <label for="details">Petition Details</label>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <select class="form-control" id="category" name="petition_category" required>
                            <option value="#">Select category</option>
                            <option value="1">Wild Life</option>
                            <option value="2">Child Abuse</option>
                        </select>
                        <label for="email">Category</label>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="image" name="password"  accept=".jpg, .png, .jpeg, .webp" type="file" required />
                        <label for="image">Choose Image</label>
                    </div>
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Post</button></div>
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