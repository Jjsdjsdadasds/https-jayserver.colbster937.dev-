<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: maintenance.php');
    exit;
}

// Check session timeout (10 minutes)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 60)) {
    session_unset();
    session_destroy();
    header('Location: maintenance.php');
    exit;
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Brickia</title>
   
    <!-- Styling Stuff -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  
    <!-- Captcha -->
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
    
    <style>
        body {
            background-color: #212529;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
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
            background: linear-gradient(to bottom, #337ab7 0%, #265a88 100%);
            color: #fff;
            border: 1px solid #265a88;
        }

        .login-btn-modal:hover {
            text-decoration: none;
            transform: scale(1.05);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .forgot-password-btn-modal,
        .create-account-btn-modal {
            display: block;
            margin-top: 10px;
            text-align: center;
            font-size: 1rem;
            color: #265a88;
        }

        .forgot-password-btn-modal:hover,
        .create-account-btn-modal:hover {
            text-decoration: underline;
        }

        .info-text {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <!--<left><a href="/" class="btn btn-link"><i class="fas fa-arrow-left"></i> Back</a>-->
    </div>

    <div class="login-header">
        <div>
            <img src="/favicon.ico" alt="Logo" class="login-img">
            <h1 class="display-5">Login to Brickia</h1>
            Login to Brickia using an <b> already-made </b> account
        </div>
    </div>

    <form>
        <div class="form-group">
            <label for="username"><b>Username:</b></label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="password"><b>Password:</b></label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password">
        </div>

        <center>
        <div class="h-captcha" data-sitekey="f27c222c-fda6-423f-bf47-fcbfbfa634e2"></div>

        <button type="submit" class="btn btn-primary login-btn-modal"><i class="fas fa-sign-in-alt"></i> <b>Login</b></button>
    </form>

    <a href="#" class="forgot-password-btn-modal" data-toggle="modal" data-target="#passwordRecoveryModal">
        <i class="fas fa-question-circle"></i> I forgot my password
    </a>
    <a href="/register" class="create-account-btn-modal">
        <i class="fas fa-user-plus"></i> Create an account instead
    </a>
</div>

<!-- Password Recovery Modal -->
<div class="modal fade" id="passwordRecoveryModal" tabindex="-1" role="dialog" aria-labelledby="passwordRecoveryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordRecoveryModalLabel">Password Recovery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>If you forgot your password, please contact our support team at support@example.com for assistance.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Script to show modal on page load -->
<script>
    $(document).ready(function () {
        $('#loginModal').modal('show');
    });
</script>

</body>
</html>
