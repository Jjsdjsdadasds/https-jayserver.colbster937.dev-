<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredPassword = $_POST['password'];
    $correctHashedPassword = password_hash("kelzssecretsite", PASSWORD_BCRYPT);

    if (password_verify($enteredPassword, $correctHashedPassword)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['last_activity'] = time();
        
        header('Location: ' . ($_SESSION['loggedin'] ? '/' : '/maintenance/'));
        exit;
    } else {
        $error = "Incorrect maintenance key.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Maintenance - Brickia</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Helvetica+Neue:wght@400&display=swap">
    </head>

    <style>
     @font-face {
            font-family: 'Helvetica Neue';
            src: local('Helvetica Neue'), local('HelveticaNeue'), url(HelveticaNeue.woff2) format('woff2');
            font-weight: 400;
            font-style: normal;
        }

        body {
            background-color: #343a40;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #fff;
        }

        .card {
            background-color: #444;
            color: #fff;
            border: 1px solid #555;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: scale(1.05);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="alert alert-warning" role="alert">
    <i class="bi bi-exclamation-triangle-fill"></i>
    <strong> Warning! </strong> This website is currently in development and not finished yet as things are being worked on currently.
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-dark">

                    <img src="/util/img/banner1.png" alt="Smaller Banner" class="img-fluid mb-3" style="max-height: 100px;">
                    <h4><i class="bi bi-nothing"></i> Enter maintenance password </h4>
                    <h5> <strong> (You need this to view Brickia) </strong> </h5>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="password"><i class="bi bi-nothing"></i> Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-door-open"></i> <b> Enter </b> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-3">
    <p>For the meantime, check out our Discord server:</p>
    <a href="https://discord.gg/5vmYrRnRx4" target="_blank" class="btn btn-outline-light"><i class="bi bi-discord"></i> <b>Join Discord</b></a>
</div>

</body>
</html>
