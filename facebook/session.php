<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $name = $_POST["name"];
    $email = $_POST["email"];


    $host = 'localhost';
    $uname = 'root';
    $password = "";
    $dbname = "lalitha";
    $conn = mysqli_connect($host, $uname, $password, $dbname);
    if ($conn) {
        echo "Connection successful.";
    } else {
        echo "Connection Failed.";
        die("Connection Failed:" . mysqli_connect_error());
    }
    $sql = "select * from insert_inf where first_name='$name' and email='$email'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) >0) {
        session_start();

        $_SESSION['name'] = $name;
        header('Location:dashd.php');
    } else {
        echo "<script> alert('Invalid Credentials')</script>";
        header('Location:register.html');
    }
}
?>