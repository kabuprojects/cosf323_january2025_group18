<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuaCyber</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50;
            color: white;
        }

        .hero {
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn-get-started {
            background-color: #3498db;
            color: white;
            padding: 10px 30px;
            font-size: 18px;
        }

        .btn-watch-video {
            background-color: transparent;
            border: 1px solid #3498db;
            color: #3498db;
            padding: 10px 30px;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#" style="font-size: 40px;">Jua<span style="color:rgba(8, 235, 20, 0.8);">Cyber</span></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/quizzes.php">Quizzes</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Choose Language
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pages/englishquizzes.php">English</a>
                        <a class="dropdown-item" href="/pages/swahiliquizzes.php">Swahili</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="/pages/contactus.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/feedback.php">Feedback</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/about.php">About</a></li>
        </div>
    </nav>
    <br>
    <a href="/pages/englishquizzes.php">Please choose your prefered language!</a>
    <br>
    <br>
    <a href="/pages/swahiliquizzes.php">Tafadhali chagua lugha unayopendelea!</a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>