<?php
session_start();

// Default to English if no language is set
$lang = $_SESSION["lang"] ?? "en";

// Navigation text based on language selection
$texts = [
    "en" => ["home" => "Home", "quizzes" => "Quizzes", "feedback" => "Feedback", "logout" => "Logout", "login" => "Login", "register" => "Register"],
    "sw" => ["home" => "Nyumbani", "quizzes" => "Maswali", "feedback" => "Maoni", "logout" => "Toka", "login" => "Ingia", "register" => "Jisajili"]
];

?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Basic Navbar Styling */
        .navbar {
            background: #007bff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-links li {
            margin: 0 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 8px 12px;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .menu-toggle {
            display: none;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }

        .auth-links {
            display: flex;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                background: #007bff;
                position: absolute;
                top: 50px;
                left: 0;
            }

            .nav-links.show {
                display: flex;
            }

            .nav-links li {
                text-align: center;
                padding: 10px 0;
            }

            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <span class="menu-toggle" onclick="toggleMenu()">☰</span>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php"><?php echo $texts[$lang]["home"]; ?></a></li>
            <li><a href="quizzes.php"><?php echo $texts[$lang]["quizzes"]; ?></a></li>
            <li><a href="feedback.php"><?php echo $texts[$lang]["feedback"]; ?></a></li>
        </ul>
        <div class="auth-links">
            <?php if (isset($_SESSION["user_id"])): ?>
                <a href="logout.php" class="nav-links"><?php echo $texts[$lang]["logout"]; ?></a>
            <?php else: ?>
                <a href="login.php" class="nav-links"><?php echo $texts[$lang]["login"]; ?></a>
                <a href="register.php" class="nav-links"><?php echo $texts[$lang]["register"]; ?></a>
            <?php endif; ?>
        </div>
    </nav>

    <script>
        function toggleMenu() {
            var navLinks = document.getElementById("navLinks");
            navLinks.classList.toggle("show");
        }
    </script>

</body>

</html>