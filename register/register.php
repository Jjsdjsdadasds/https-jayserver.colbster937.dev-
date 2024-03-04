<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?
