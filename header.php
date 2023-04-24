<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <script src="script.js" defer></script>
    <title>Login System</title>
</head>
<body>
    <header>
        <a href='index.php' class="logo"><div>BLOGZ</div></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="blogs.php">Find Blogz</a></li>
                <?php
                    if (isset($_SESSION['userUId'])) {
                        echo "<li><a href='profile.php'>" . $_SESSION['userUId'] . "'s Profile</a></li>";
                        echo "<li><a href='./Includes/logout.inc.php'>Log Out</a></li>";
                    } else {
                        echo "<li><a href='signup.php'>Sign Up</a></li>";
                        echo "<li><a href='login.php'>Log In</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>