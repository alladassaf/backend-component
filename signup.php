<?php
    include './header.php';
?>


<main>
    <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyinput") {

                echo "<p class='error-text'>Fill in all fields</p>";

            } elseif($_GET['error'] == "invalidUID") {

                echo "<p class='error-text'>Choose a valid Username.";

            } elseif($_GET['error'] == "invalidEmail") {

                echo "<p class='error-text'>Please Type in a valid email address.";

            } elseif($_GET['error'] == "pwdDontMatch") {

                echo "<p class='error-text'>Your passwords must match before signing up.";

            } elseif($_GET['error'] == "stmtFailed") {

                echo "<p class='error-text'>Something ent wrong while connecting to the database... please try again later.";

            } else if($_GET['error'] == "usernameTaken") {

                echo "<p class='error-text'>This username is already taken, please choose another username.";

            } else if($_GET['error'] == "none") {

                echo "<p class='success-text'>You have successfully signed up, CONGRATS!!";

            }
        }
    ?>
    <form action="./Includes/signup.inc.php" method="POST">
        <h2 class="signup-text form-header">Sign Up</h2>
        <input type="text" name="name" placeholder="Full Name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="RPpwd" placeholder="Repeat Password">
        <input type="submit" name="signUp" value="Sign Up">
    </form>

</main>
<?php
    include './footer.php';
?>