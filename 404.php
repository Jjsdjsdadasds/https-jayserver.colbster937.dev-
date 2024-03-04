<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Error - Brickia</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
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

        .error-container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #343a40;
            border-radius: 5px;
            margin-top: 20px;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .error-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .error-img {
            max-width: 80px;
            margin-right: 10px;
        }

        .error-message {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .confused-emoji {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .helpful-links {
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .helpful-links a {
            color: #fff;
            font-size: 1rem;
            margin-top: 10px;
        }

        .helpful-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="error-container">
    <div class="error-header">
        <div>
            <img src="/favicon.ico" alt="Logo" class="error-img">
            <h1 class="display-5">404 Error - Page Not Found</h1>
        </div>
    </div>

    <center> <div class="confused-emoji">&#129300;</div>

    <p class="error-message"> <b> Oops! </b> It seems like the page you're looking for doesn't exist.</p>

    <div class="helpful-links">
        Here are some helpful links:
        <a href="/"> <b> Go to Home Page </b> </a>
        <a href="/login"> <b> Login to your Account </b> </a>
        <a href="/register"> <b> Create a New Account </b> </a>
        <a href="/support"> <b> Contact Support </b> </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
