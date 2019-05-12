<?php
$server = "localhost";
$suname = "phpmyadmin";
$spassword = "accioubuntu";
$database = "anu";
$email = $_POST["email"];
$password = $_POST["password"];
$connect = new mysqli($server, $suname, $spassword, $database);
if ($connect->connect_error) {
    die("Connection Error" . $connect->connect_error);
} else {
    $sql = "INSERT into login(email,password) VALUES('$email','$password') WHERE email <> $email";
    if ($connect->query($sql) === true) {
        echo "Success";
       header("Location:/login.html");
    } else {
        echo "Failure";
    }
}
$connect->close();
