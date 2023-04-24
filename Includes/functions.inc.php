<?php

    function emptyInputSignup($name, $email, $uid, $pwd, $pwdRepeat) {
        $result;

        if (empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwdRepeat)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    function invalidUID($uid) {
        $result;

        if (!preg_match("/^[A-Za-z0-9]*$/", $uid)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;

    }

    function invalidEmail($email) {
        $result;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;

    }

    function passwordMatch($pwd, $pwdRepeat) {
        $result;

        if ($pwd !== $pwdRepeat) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;

    }

    function uidExists($conn, $uid, $email) {
        $sql = "SELECT * FROM users WHERE users_uid = ? OR users_email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, 'ss', $uid, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) { // This line returns true if data inside function
            return $row;
        } else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }


    function createUser($conn, $name, $email, $uid, $pwd) {
        $sql = "INSERT INTO users(users_name, users_email, users_uid, users_pwd) VALUES(?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=stmtFailed");
            exit();
        }

        $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $uid, $hashedPWD);
        mysqli_stmt_execute($stmt);


        mysqli_stmt_close($stmt);

        header("Location: ../signup.php?error=none");
        exit();

    }


    function emptyInputLogin($uid, $pwd) {
        $result;

        if (empty($uid) || empty($pwd)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    function loginUser($conn, $uid, $pwd) {
        $uidExists = uidExists($conn, $uid, $uid);

        if ($uidExists == false) {
            header("Location: ../login.php?error=wrongNameLogin");
            exit();
        }

        $pwdHashed = $uidExists["users_pwd"];
        $checkPass = password_verify($pwd, $pwdHashed);

        if ($checkPass == false) {
            header("Location: ../login.php?error=wrongPassLogin");
            exit();
        } elseif ($checkPass == true) {
            session_start();
            $_SESSION["userId"] = $uidExists["usersId"];
            $_SESSION["userUId"] = $uidExists["users_uid"];

            header("Location: ../index.php");
            exit();
        }

    }