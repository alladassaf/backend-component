<?php

if (array_key_exists('login', $_POST)) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($uid, $pwd) !== false) {
        header("Location: ../login.php?error=emptyInput");
        exit();
    }

    loginUser(conn(), $uid, $pwd);


} else {
    header("Location: ../index.php");
    exit();
}