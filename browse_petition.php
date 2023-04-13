<?php
include("widgets/check_sessions.php");
include_once("activities/get_petitions_activity.php");
?>
<!DOCTYPE html>
<html id="browse_petition" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Petition Power | Browse</title>
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
<section class="py-5 border-bottom">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Browse petitions</h2>
            <p class="lead mb-0">Find all the petitions available here</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-12">
                <!-- Testimonial 1-->
                <?php
                $petitions = getAllPetitions();
                if (isset($petitions)) {
                    if (is_array($petitions)) {
                        foreach ($petitions as $petition) {
                            ?>
                            <div class="card mb-4">
                                <a href="view_petition.php?id=<?=$petition[0]?>" class="text-decoration-none nav-link">
                                    <div class="card-body p-4">
                                        <img src="assets/img/uploads/<?=$petition[4]?>" class="img-thumbnail" alt="...">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 mt-2">
                                                <i class="bi bi-chat-right-quote-fill text-primary fs-1"></i>
                                            </div>
                                            <div class="ms-4 mt-3">
                                                <h3><?= $petition[1] ?></h3>
                                                <p class="mb-1">
                                                    <?= $petition[2] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }
                    } else {
                        echo "<h3 class='text-center'>No petitions available</h3>";
                    }
                } ?>
            </div>
        </div>
</section>
<?php
include("./widgets/footer.php");
?>
<script>
    $(".card").hover(function () {
            $(this).addClass("shadow");
        },
        function () {
            $(this).removeClass("shadow");
        });
</script>
</body>
</html>