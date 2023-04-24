<?php

function conn() {
    $servername = "localhost";
    $dbUserName = "root";
    $dbPass = "";
    $dbName = "loginsystem";

    $conn = mysqli_connect($servername, $dbUserName, $dbPass, $dbName);

    return $conn;
}