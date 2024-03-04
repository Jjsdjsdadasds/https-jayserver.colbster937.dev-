<?php
// require 'util/block_proxies.php'; -- remove the '//' only if you want to disable the use of proxies
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: /maintenance');
    exit;
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 60)) {
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
    <title>Brickia</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta property="og:image" content="https://brickia.xyz/favicon.ico">
    <meta property="og:title" content="Brickia">
    <meta property="og:description" content="A sandbox game where you can play awesome games curated by the community, interact with others, dress up your character, and more!">
    <meta property="og:url" content="https://brickia.xyz">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    
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

        .navbar {
            background-color: #343a40;
        }

        .jumbotron {
            background-color: #343a40;
            color: #fff;
        }

        .feature-card {
            background-color: #495057;
            color: #fff;
            transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
            border-radius: 10px;
        }

        .feature-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        }

        .icon {
            font-size: 3rem;
            color: #fff;
        }

        .animate {
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }

        .footer-links {
            margin-top: 20px;
            list-style: none;
            padding: 0;
        }

        .footer-link {
            display: inline-block;
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
            transition: color 0.3s ease-in-out;
        }

        .footer-link:hover {
            color: #28a745; 
        }

        .warning-message {
            background-color: #ffc107;
            color: #212529;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .warning-icon {
            font-size: 1.5rem;
            margin-right: 5px;
        }

        .login-btn, .register-btn {
            color: #fff;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border: 1px solid #265a88;
        }

        .login-btn:hover, .register-btn:hover {
            text-decoration: none;
            color: #fff;
            transform: scale(1.05);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .register-btn {
            background: linear-gradient(to bottom, #28a745 0%, #218838 100%);
        }

        .register-btn:hover {
            background: linear-gradient(to bottom, #21a436 0%, #197b2e 100%);
        }

        .site-icon {
            max-width: 60px;
            margin-bottom: 15px;
        }

        .or-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
        }

        .divider-line {
            flex-grow: 1;
            height: 1px;
            background-color: #fff;
            margin: 0 10px;
        }

        .divider-text {
            color: #fff;
            font-size: 1rem;
            opacity: 0;
            animation: fadeInUp 1s ease-out;
        }
    </style>
</head>
<body>

<script src="/util/embeds.js"></script>

<div class="alert alert-warning" role="alert">
    <i class="bi bi-exclamation-triangle-fill"></i>
    <strong> Warning! </strong> This website is currently in development and not finished yet as things are being worked on currently.
</div>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="/">
        <img src="favicon.ico" alt="Brickia Icon" class="site-icon">
        <b>Brickia</b>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="jumbotron text-center">
    <h1 class="display-4 animate"> <strong> Welcome to Brickia! </strong> </h1>
    <p class="lead animate">Join <b>0</b> users in the fun today!</p>
    <!-- Might add this back another time but for now removed because it's broken. 
        <div class="or-divider"> 
        <div class="divider-line"></div>
        <div class="divider-text">OR</div>
        <div class="divider-line"></div> -->
    <a href="/login" class="btn btn-primary login-btn animate"><i class="fas fa-sign-in-alt"></i> <strong> Login </strong> </a>
    <a href="/register" class="btn btn-success register-btn animate"><i class="fas fa-user-plus"></i> <strong> Register </strong> </a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card feature-card animate">
                <div class="card-body text-center">
                    <i class="fas fa-gamepad icon"></i>
                    <h5 class="card-title"><b>Play Games</b></h5>
                    <p class="card-text">Engage in exciting games curated by the community.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card feature-card animate">
                <div class="card-body text-center">
                    <i class="fas fa-users icon"></i>
                    <h5 class="card-title"><b>Interact With Others</b></h5>
                    <p class="card-text">Connect with a vibrant community of players.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card feature-card animate">
                <div class="card-body text-center">
                    <i class="fas fa-edit icon"></i>
                    <h5 class="card-title"><b>Customization</b> </h5>
                    <p class="card-text">Customize your character by wearing hats, gears, accessories and more!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2024 <b>Brickia.</b> All rights reserved.</p>
    <!-- <div class="footer-links">
        <b> QUICK LINKS </b> <br>
        <a href="/">Staff Team</a> <br>
        <a href="https://pastebin.com/raw/xSYsthxB" target="_blank">Terms of Service</a> <br>
        <a href="https://pastebin.com/raw/NXGeuXQZ" target="_blank">Privacy Policy</a> --!>
        <!-- Add more links as needed -->
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
