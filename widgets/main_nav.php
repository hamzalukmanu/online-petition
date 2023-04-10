<style>
    .nav-element{
        margin: 5px 8px;
    }
</style>
<div style="display: flex; justify-content: right;">
    <div class="nav-element"><a style="text-decoration: none;" href="index.php">Home</a></div>

    &nbsp;<?php if (!isset($_SESSION['current_user'])) : ?>
        <div class="nav-element"><a style="text-decoration: none;" href="login.php">Login</a></div>

        <div class="nav-element"><a style="text-decoration: none;" href="sign_up.php">Sign up</a></div>
    <?php else: ?>
        <div class="nav-element"><a style="text-decoration: none;" href="start_petition.php">Start Petition</a></div>
        <div class="nav-element"><a style="text-decoration: none;" href="browse_petition.php">Browse Petition</a></div>
        <div class="nav-element"><a style="text-decoration: none;" href="my_petition.php">My Petitions</a></div>

        <div class="nav-element"><a style="text-decoration: none;" href="javascript:void(0)"><?=$_SESSION['current_user']?></a></div>

        <div class="nav-element"><a style="text-decoration: none;" href="logout.php">Log out</a></div>
    <?php endif; ?>
</div>