<?php
    include './header.php';
?>


<main>
    <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyInput") {

                    echo "<p class='error-text'>Fill in all fields</p>";

                } elseif($_GET['error'] == "wrongNameLogin") {

                    echo "<p class='error-text'>The User/Email information you provided does not seem to be in our database. Please try again.</p>";

                } elseif($_GET['error'] == "wrongPassLogin") {

                    echo "<p class='error-text'>The Password information you provided does not seem to be in our database. Please try again.</p>";

                } 
            }
        ?>
    <form action="./Includes/login.inc.php" method="POST">
        <h2 class="signin-text form-header">Sign Up</h2>
        <input type="text" name="uid" placeholder="Username/Email">
        <input type="password" name="pwd" placeholder="Password">
        <input type="submit" name="login" value="Log In">
    </form>
</main>
<?= include './footer.php' ?>