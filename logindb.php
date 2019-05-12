

<?php
session_start();
$server = "localhost";
$suname = "phpmyadmin";
$spassword = "accioubuntu";
$database = "anu";
$username = $_POST["email"];
$password = $_POST["password"];
$connect = new mysqli($server, $suname, $spassword, $database);
	$id = $_SESSION['id'];
if ($connect->connect_error) {
    echo "Connection error";
} else {
    $sql = "SELECT email,password FROM login WHERE email='$username'";
    $output = $connect->query($sql);
    if ($output === false) {
        echo "SQL error";
    } else {
        while ($row = $output->fetch_assoc()) {
            if ($password === $row["password"]) {

                echo "Login Success ";
            	$_SESSION['email'] = $username;
                header('location: index.php');

            } else {
                echo "Login Failed,Wrong Password";

            }
        }
    }
}

