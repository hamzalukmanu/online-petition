<?php
include("widgets/check_sessions.php");
include("activities/get_petitions_activity.php");
include("activities/support_activity.php");

if (!isset($_GET['id'])) {
    header("location: browse_petition.php");
} else {
    $petition = getSinglePetition($_GET["id"]);
    $supporters = getPetitionSupporters($_GET["id"]);
    if (!$petition) {
        header("location: browse_petition.php");
    }
}
?>
<!DOCTYPE html>
<html id="browse_petition" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Petition Power | View Petition</title>
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
            <h2 class="fw-bolder"><?= $petition[1] ?></h2>
            <!--            <p class="lead mb-0">Find all the petitions available here</p>-->
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-12">
                <!-- Testimonial 1-->
                <div class="card-body p-4">
                    <img src="assets/img/uploads/<?= $petition[4] ?>" class="img-thumbnail" alt="...">
                    <div class="d-flex">
                        <div class="flex-shrink-0 mt-2">
                            <i class="bi bi-chat-right-quote-fill text-primary fs-1"></i><br>
                        </div>
                        <div class="ms-4 mt-3">
                            <p class="mb-1">
                                <?= $petition[2] ?>
                            </p>
                            <div class="small text-muted">
                                <span id="supporters">
                                    <?php if (!$supporters) {
                                        echo "0";
                                    } else {
                                        echo $supporters->num_rows;
                                    }
                                    ?>
                                </span> supporters
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="text-center row">
                        <?php if(getPetitionSupporter($petition[0], getSession("user_data")[0])):?>
                            <button id="support" type="button" style="display: none" class="btn btn-primary">Support Petition</button>
                            <button id="retract" type="button"  class="btn btn-danger">Retract
                                Support
                            </button>
                        <?php else:?>
                        <button id="support" type="button" class="btn btn-primary">Support Petition</button>
                        <button id="retract" type="button" style="display: none" class="btn btn-danger">Retract
                            Support
                        </button>
                        <?php endif; ?>

                        <?php if((string)$petition[5] == (string)getSession("user_data")[0]):?>
                            <button id="delete" type="button" class="mt-3 btn btn-danger">
                                Delete petition
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
</section>
<div class="toast- position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Notification</strong>
            <small>a few mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div id="message" class="toast-body">

        </div>
    </div>
</div>
<?php
include("./widgets/footer.php");
?>
<script>
    let supportBtn = $("#support"),
        retractBtn = $("#retract"),
        deleteBtn = $("#delete"),
        toastCard = $("#liveToast"),
        message = $("#message"),
        supporters = $("#supporters")


    supportBtn.on("click", () => {
        let data = {
            user_id: <?= getSession("user_data")[0]?>,
            petition_id: <?= $petition[0] ?>,
            type: "support"
        }

        $.post("activities/support_activity.php", data, function (data) {
            data = JSON.parse(data);

            if (data.msg === "success") {
                toastCard.addClass("text-bg-success");
                toastCard.removeClass("text-bg-warning");
                message.text("You are supporting this petition")
                supportBtn.hide()
                retractBtn.show()
                supporters.text(parseInt(supporters.text()) + 1)
            } else {
                toastCard.addClass("text-bg-warning");
                toastCard.removeClass("text-bg-success");
                message.text("You are already supporting this petition")
            }
            let toastLiveExample = document.getElementById("liveToast")
            let toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        });
    });

    retractBtn.on("click", () => {
        let data = {
            user_id: <?= getSession("user_data")[0]?>,
            petition_id: <?= $petition[0] ?>,
            type: "retract"
        }
        $.post("activities/support_activity.php", data, function (data) {
            data = JSON.parse(data);

            if (data.msg === "success") {
                toastCard.addClass("text-bg-success");
                toastCard.removeClass("text-bg-warning");
                message.text("You have retracted your support for this petition")
                retractBtn.hide()
                supportBtn.show()
                supporters.text(parseInt(supporters.text()) - 1)
            } else {
                toastCard.addClass("text-bg-warning");
                toastCard.removeClass("text-bg-success");
                message.text("You have already retracted your support for this petition")
            }
            let toastLiveExample = document.getElementById("liveToast")
            let toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        });
    });

    deleteBtn.on("click", () => {
        let data = {
            user_id: <?= getSession("user_data")[0]?>,
            petition_id: <?= $petition[0] ?>,
            type: "delete"
        }
        $.post("activities/support_activity.php", data, function (data) {
            data = JSON.parse(data);

            if (data.msg === "success") {
                toastCard.addClass("text-bg-success");
                toastCard.removeClass("text-bg-warning");
                message.text("You have deleted this petition successfully")
                setTimeout(()=>{
                    window.location.href = window.location.href.replace(window.location.href.split("/")[4], "browse_petition.php")
                }, 1000)
            } else {
                toastCard.addClass("text-bg-danger");
                toastCard.removeClass("text-bg-success");
                message.text("An error occured. Please try again later!")
            }
            let toastLiveExample = document.getElementById("liveToast")
            let toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        });
    });


</script>
</body>
</html>