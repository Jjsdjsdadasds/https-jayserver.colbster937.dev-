<?php
session_start();
include 'util/db_connect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: /maintenance');
    exit;
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 60))) {
    session_unset();
    session_destroy();
    header('Location: /maintenance');
    exit;
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Brickia</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
    
    <style>
        body {
            background-color: #212529;
            color: #fff;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #343a40;
            border-radius: 5px;
            margin-top: 20px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header a {
            color: #fff;
            font-size: 1rem;
            margin-right: 10px;
        }

        .login-img {
            max-width: 80px;
            margin-right: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .login-btn-modal {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1.5rem;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background: linear-gradient(to bottom, #28a745 0%, #218838 100%);
            color: #fff;
            border: 1px solid #218838;
        }

        .login-btn-modal:hover {
            text-decoration: none;
            transform: scale(1.05);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .forgot-password-btn-modal,
        .create-account-btn-modal {
            display: block;
            text-align: center;
            font-size: 1rem;
            color: #fff;
            margin-top: 10px;
        }

        .forgot-password-btn-modal,
        .create-account-btn-modal {
            display: block;
            margin-top: 10px;
            text-align: center;
            font-size: 1rem;
            color: #0;
        }

        .forgot-password-btn-modal:hover,
        .create-account-btn-modal:hover {
            text-decoration: underline;
        }

        .forgot-password-btn-modal:hover,
        .create-account-btn-modal:hover {
            text-decoration: underline;
            color: #1e7e34;
        }

        .info-text {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="alert alert-warning" role="alert">
    <i class="bi bi-exclamation-triangle-fill"></i>
    <strong> Warning! </strong> This website is currently in development and not finished yet as things are being worked on currently.
</div>

<div class="login-container">
    <div class="login-header">
    </div>

    <div class="login-header">
        <div>
            <img src="/favicon.ico" alt="Logo" class="login-img">
            <h1 class="display-5">Register on Brickia</h1>
            Create a <b> new </b> account on Brickia to start your adventure!
        </div>
    </div>

    <form>
        <div class="form-group">
            <label for="username"><b>Username:</b></label>
            <input type="text" class="form-control" id="username" placeholder="Choose a username">
        </div>
        <div class="form-group">
            <label for="password"><b>Password:</b></label>
            <input type="password" class="form-control" id="password" placeholder="Choose a password">
        </div>
        <div class="form-group">
            <label for="password"><b>Confirm Password:</b></label>
            <input type="password" class="form-control" id="password" placeholder="Enter the same password">
        </div>
        <div class="form-group">
            <label for="email">(Optional) <b>Email:</b></label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email if you want news on updates and more">
        </div>

        <center>
        <div class="h-captcha" data-sitekey="f27c222c-fda6-423f-bf47-fcbfbfa634e2"></div>

<form action="register.php" method="post">

    <button type="submit" class="btn btn-success login-btn-modal"><i class="fas fa-user-plus"></i> <b>Register!</b></button>
</form>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#loginModal').modal('show');
    });
</script>

</body>
</html>
