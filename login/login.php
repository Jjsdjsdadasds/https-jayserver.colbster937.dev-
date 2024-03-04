<?php
session_start();

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            header('Location: welcome.php');
            exit;
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}

$conn->close();
?>
