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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Choose Language
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pages/english.php">English</a>
                        <a class="dropdown-item" href="/pages/swahili.php">Swahili</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="/pages/quizzes.php">Quizzes</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/contactus.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/feedback.php">Feedback</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/about.php">About</a></li>
                <li class="nav-item"><a class="nav-link btn-get-started" href="/authentication/login.php">LOGIN</a></li>
            </ul>
        </div>
    </nav>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feedback - JuaCyber</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #2c3e50;
                color: white;
            }

            .container {
                max-width: 600px;
                margin: auto;
                padding: 50px 20px;
            }

            .feedback-container {
                background: rgba(255, 255, 255, 0.1);
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            }

            .form-control {
                border-radius: 20px;
                padding: 10px;
                border: 1px solid #ccc;
                background: rgba(255, 255, 255, 0.2);
                color: white;
            }

            .form-control::placeholder {
                color: rgba(255, 255, 255, 0.7);
            }

            .btn-submit {
                background-color: #3498db;
                color: white;
                border-radius: 20px;
                padding: 10px;
                width: 100%;
                font-size: 18px;
            }

            .btn-submit:hover {
                background-color: #2980b9;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <h3 class="text-center fw-bold">Feedback Form</h3>

            <div class="feedback-container">
                <form action="process_feedback.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subject:</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message:</label>
                        <textarea name="message" class="form-control" placeholder="Enter Message" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-submit">Submit →</button>
                </form>
            </div>
        </div>

    </body>

    </html>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>