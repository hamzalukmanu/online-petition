<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">Petition Power</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <?php if (!isset($_SESSION['current_user'])) : ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="sign_up.php">Sign Up</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="start_petition.php">Start Petition</a></li>
                    <li class="nav-item"><a class="nav-link" href="browse_petition.php">Browse Petition</a></li>
                    <li class="nav-item"><a class="nav-link" href="my_petition.php">My Petitions</a></li>
                    <li style="margin-bottom: 4px" class="nav-item"><a class="nav-link btn btn-outline-secondary" href="javascript:void(0)"><?=$_SESSION['current_user']?></a></li>
                    <li style="margin-left: 4px" class="nav-item"><a class="nav-link btn btn-primary" href="logout.php">Log out</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>