<?php
//session_start();
include '../authentication/db.php';

// Fetch only Swahili courses
$query = "SELECT title_sw AS title, content_sw AS content, category FROM cybersecurity_content ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

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
        </div>
    </nav>

    <br>
    <?php
    // Maudhui ya Vitisho vya Usalama wa Mtandao (Swahili)
    $awareness = [
        "title" => "Uhamasishaji wa Usalama wa Mtandaoni Kenya",
        "intro" => "Karibu kwenye jukwaa letu la elimu ya usalama wa mtandaoni. Hapa utajifunza jinsi ya kujilinda mtandaoni nchini Kenya.",
        "threats_title" => "Vitisho vya Mtandaoni nchini Kenya"
    ];

    $content_swahili = [
        [

            "title" => "1. Ulaghai wa Pesa za Simu",
            "definition" => "Aina ya ulaghai ambapo wadanganyifu huwadanganya wahasiriwa kutuma pesa au kutoa maelezo ya benki ya simu.",
            "safety_measures" => [
                "Daima hakikisha utambulisho wa mpigaji simu kabla ya kutuma pesa.",
                "Usishiriki PIN au OTP na mtu yeyote.",
                "Tumia nambari rasmi za huduma kwa wateja kupata msaada."
            ],
            "regulation" => "Sheria ya Kenya: Benki Kuu ya Kenya (CBK) - Miongozo ya kuzuia ulaghai wa pesa za simu.",
            "real_life_example" => "Mnamo 2022, Wakenya walipoteza mamilioni kwa wadanganyifu waliodai kuwa mawakala wa M-Pesa wa Safaricom, wakidai PIN na kutoa pesa.",
            "case_study" => "Mfanyabiashara wa Nairobi alipoteza KSh 50,000 baada ya kupokea ombi bandia la 'kuboresha SIM card'."
        ],
        [
            "title" => "2. Mashambulizi ya Hadaa (Phishing)",
            "definition" => "Aina ya uhalifu wa mtandaoni ambapo wadanganyifu hujifanya mashirika halali ili kuiba data nyeti.",
            "safety_measures" => [
                "Daima hakikisha chanzo cha barua pepe.",
                "Usibofye viungo visivyotambulika.",
                "Washa uthibitishaji wa vipengele vingi (MFA)."
            ],
            "regulation" => "Sheria ya Kenya: Sheria ya Uhalifu wa Kompyuta na Mtandao (2018) - Sehemu ya 28 inakataza hadaa za mtandaoni.",
            "real_life_example" => "Mnamo 2022, benki za Kenya ziliripoti ongezeko la hadaa ambapo wadanganyifu walitengeneza barua pepe zinazofanana na benki ili kuiba maelezo ya akaunti za wateja."
        ],
        [
            "title" => "3. Wizi wa Utambulisho",
            "definition" => "Matumizi yasiyoidhinishwa ya maelezo ya kibinafsi ya mtu mwingine kwa ulaghai.",
            "safety_measures" => [
                "Tumia nywila kali na za kipekee.",
                "Epuka kushiriki maelezo binafsi kwenye mitandao ya kijamii.",
                "Fuatilia miamala ya benki mara kwa mara."
            ],
            "regulation" => "Sheria ya Kenya: Sheria ya Mifumo ya Malipo ya Kitaifa - Hulinda watumiaji dhidi ya udanganyifu wa kifedha.",
            "real_life_example" => "Kampuni moja jijini Nairobi ilipoteza KSh 2 milioni baada ya wadukuzi kutumia kitambulisho cha mfanyakazi kupata ufikiaji wa mfumo wa malipo."
        ],
        [
            "title" => "4. Ransomware",
            "definition" => "Programu hasidi inayofunga mafaili na kudai malipo ili kuyafungua.",
            "safety_measures" => [
                "Hifadhi nakala za data mara kwa mara.",
                "Usifungue viambatisho vya barua pepe visivyojulikana.",
                "Tumia programu za antivirus zinazoaminika."
            ],
            "regulation" => "Sheria ya Kenya: Sheria ya Ulinzi wa Data (2019) - Inawataka mashirika kulinda data binafsi dhidi ya vitisho vya mtandaoni.",
            "case_study" => "Mnamo 2023, mtoa huduma wa afya nchini Kenya alishambuliwa na ransomware 'WannaCry', na kusababisha data za wagonjwa kufungwa kwa siku kadhaa."
        ],
        [
            "title" => "5. Mashambulizi ya Uhandisi wa Kijamii",
            "definition" => "Mbinu ya kudanganya watu kutoa taarifa za siri.",
            "safety_measures" => [
                "Hakikisha utambulisho wa mpigaji simu kabla ya kushiriki taarifa.",
                "Epuka kuchapisha maelezo nyeti hadharani.",
                "Wape wafanyakazi mafunzo kuhusu mbinu za uhandisi wa kijamii."
            ],
            "regulation" => "Sheria ya Kenya: Sheria ya Uhalifu wa Mtandaoni (2018) - Sehemu ya 31 inaharamisha shughuli za ulaghai wa mtandao.",
            "case_study" => "Mfanyakazi wa serikali ya Kenya alitoa kwa bahati mbaya nywila za faili za siri baada ya kupokea simu bandia ya msaada wa IT."
        ],
        [
            "title" => "6. Mifumo ya Pyramid na Ponzi",
            "definition" => "Mifumo ya uwekezaji ya ulaghai inayotoa ahadi za faida kubwa bila hatari.",
            "safety_measures" => [
                "Kuwa makini na ahadi za uwekezaji zisizo na masharti.",
                "Hakikisha uhalali wa miradi ya kifedha kutoka kwa mamlaka husika.",
                "Epuka uwekezaji unaohitaji kuajiri watu wengine ili kupata faida."
            ],
            "regulation" => "Sheria ya Kenya: Sheria ya Mamlaka ya Masoko ya Mitaji - Inakataza mifumo ya pyramid.",
            "real_life_example" => "Mnamo 2021, maelfu ya Wakenya walipoteza pesa kwenye mpango wa Ponzi wa 'Amazon Web Worker', ambao ulisambaratika baada ya kudanganya wawekezaji kwa faida bandia."
        ],
        [
            "title" => "7. Uvujaji wa Data",
            "definition" => "Ufikiaji usioidhinishwa wa data ya siri.",
            "safety_measures" => [
                "Simamisha faili nyeti.",
                "Tumia firewalls na udhibiti madhubuti wa ufikiaji.",
                "Fanya ukaguzi wa usalama mara kwa mara."
            ],
            "regulation" => "Sheria ya Kenya: Sheria ya Ulinzi wa Data (2019) - Inalazimisha mashirika kuripoti uvujaji wa data kwa Kamishna wa Data.",
            "real_life_example" => "Mnamo 2021, kampuni moja kubwa ya mawasiliano ya simu nchini Kenya ilikumbwa na uvujaji wa data ambapo rekodi za wateja ziliwekwa wazi mtandaoni.",
            "cta" => "Fanya jaribio letu la usalama wa mtandaoni ili kupima maarifa yako!",
        ]
    ];
    ?>
    <?php
    // Display the title and introduction
    echo "<h1>{$awareness['title']}</h1>";
    echo "<p>{$awareness['intro']}</p>";
    echo "<h2>{$awareness['threats_title']}</h2>";

    // Loop through the threats and display them
    foreach ($content_swahili as $threat) {
        echo "<div class='threat'>";
        echo "<h3>{$threat['title']}</h3>";
        echo "<p><strong>Maelezo:</strong> {$threat['definition']}</p>";

        // Display safety measures
        if (!empty($threat['safety_measures'])) {
            echo "<p><strong>Hatua za Usalama:</strong></p>";
            echo "<ul>";
            foreach ($threat['safety_measures'] as $measure) {
                echo "<li>$measure</li>";
            }
            echo "</ul>";
        }

        echo "<p><strong>Kanuni:</strong> {$threat['regulation']}</p>";

        if (!empty($threat['real_life_example'])) {
            echo "<p><strong>Mfano wa Maisha Halisi:</strong> {$threat['real_life_example']}</p>";
        }

        if (!empty($threat['case_study'])) {
            echo "<p><strong>Utafiti wa Kesi:</strong> {$threat['case_study']}</p>";
        }

        if (!empty($threat['cta'])) {
            echo "<p><a href='swahiliquizzes.php'>{$threat['cta']}</a></p>";
        }

        echo "</div>";
    }
    ?>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>