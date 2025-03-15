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
    <?php

    // Determine the selected language (default: English)
    $language = isset($_GET['lang']) && $_GET['lang'] === 'sw' ? 'sw' : 'en';

    // Content for both languages
    $content = [
        'en' => [
            'title' => 'Welcome to JuaCyber',
            'headline' => 'Our Mission',
            'mission' => 'Our mission is to empower Kenyans with essential cybersecurity knowledge, helping them stay safe in the digital world.',
            'about' => 'JuaCyber is a cybersecurity awareness and education platform designed specifically for Kenyan users. We provide accessible and easy-to-understand cybersecurity resources to protect individuals, businesses, and communities from digital threats.',
            'why_choose' => 'Why Choose JuaCyber?',
            'reasons' => [
                'Localized content tailored for Kenya',
                'Simple, practical cybersecurity lessons',
                'Interactive quizzes to test your knowledge',
                'Guidance on online safety, fraud prevention, and data protection'
            ],
            'image_alt' => 'Cybersecurity awareness illustration',
        ],
        'sw' => [
            'title' => 'Karibu JuaCyber',
            'headline' => 'Lengo Letu',
            'mission' => 'Lengo letu ni kuwawezesha Wakenya kwa maarifa muhimu ya usalama wa mtandaoni, ili kuwasaidia kubaki salama katika ulimwengu wa kidijitali.',
            'about' => 'JuaCyber ni jukwaa la uhamasishaji na elimu ya usalama wa mtandaoni lililoundwa mahsusi kwa watumiaji wa Kenya. Tunatoa rasilimali rahisi na zinazofikika ili kusaidia watu binafsi, biashara, na jamii kujilinda dhidi ya vitisho vya mtandaoni.',
            'why_choose' => 'Kwa Nini Uchague JuaCyber?',
            'reasons' => [
                'Maudhui yaliyoelekezwa kwa soko la Kenya',
                'Masomo ya usalama mtandaoni yaliyo rahisi na ya vitendo',
                'Maswali ya majaribio ya kujaribu uelewa wako',
                'Mwongozo kuhusu usalama wa mtandaoni, kuzuia udanganyifu, na ulinzi wa data'
            ],
            'image_alt' => 'Mchoro wa uhamasishaji wa usalama mtandaoni',
        ]
    ];

    ?>

    <div class="container">
        <h1><?php echo $content[$language]['title']; ?></h1>
        <br>
        <h1><?php echo $content[$language]['headline']; ?></h1>
        <br>

        <p><strong><?php echo $content[$language]['mission']; ?></strong></p>

        <p><?php echo $content[$language]['about']; ?></p>

        <h3><?php echo $content[$language]['why_choose']; ?></h3>
        <ul>
            <?php foreach ($content[$language]['reasons'] as $reason) { ?>
                <li><?php echo $reason; ?></li>
            <?php } ?>
        </ul>
        <img src="/images/cybersss.jpg" alt="<?php echo $content[$language]['image_alt']; ?>" width="0%">
    </div>

    <!-- Language Selection -->
    <div>
        <a href="about.php?lang=en">English</a> | <a href="about.php?lang=sw">Swahili</a>
    </div>

    <?php
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>