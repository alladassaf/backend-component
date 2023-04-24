<?php

    if (isset($_POST['signUp'])) {
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["RPpwd"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputSignup($name, $email, $uid, $pwd, $pwdRepeat) !== false) {
            header("Location: ../signup.php?error=emptyInput");
            exit();
        }

        if (invalidUID($uid) !== false) {
            header("Location: ../signup.php?error=invalidUID");
            exit();
        }

        if (invalidEmail($email) !== false) {
            header("Location: ../signup.php?error=invalidEmail");
            exit();
        }

        if (passwordMatch($pwd, $pwdRepeat) !== false) {
            header("Location: ../signup.php?error=pwdDontMatch");
            exit();
        }

        if (uidExists(conn(), $uid, $email) !== false) {
            header("Location: ../signup.php?error=usernameTaken");
            exit();
        }

        createUser(conn(), $name, $email, $uid, $pwd);

    } else {
        header("Location: ../signup.php");
        exit();
    }