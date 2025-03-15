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
                        <a class="dropdown-item" href="/pages/swahiliquizzes.php">Swahili</a>
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
    session_start();

    // Define questions and answers (keep your existing array)
    $questions = [
        [
            "question" => "1. Phishing ni nini?",
            "options" => ["A) Aina ya uvuvi", "B) Njia ya kuiba taarifa za kibinafsi", "C) Virusi vya kompyuta"],
            "answer" => "B"
        ],
        [
            "question" => "2. Unawezaje kutambua barua pepe ya ulaghai (phishing)?",
            "options" => ["A) Ina salamu ya jumla", "B) Inatoka kwa mtumaji unayemjua", "C) Haina viungo (links)"],
            "answer" => "A"
        ],
        [
            "question" => "3. Malware ni nini?",
            "options" => ["A) Programu inayokusaidia", "B) Programu hasidi iliyoundwa kuharibu", "C) Aina ya antivirus"],
            "answer" => "B"
        ],
        [
            "question" => "4. Aina za kawaida za malware ni zipi?",
            "options" => ["A) Virusi, minyoo, na trojans", "B) Vichunguzi vya wavuti na programu", "C) Mifumo ya uendeshaji"],
            "answer" => "A"
        ],
        [
            "question" => "5. Unawezaje kulinda kompyuta yako dhidi ya malware?",
            "options" => ["A) Kwa kutumia nywila (passwords) imara", "B) Kwa kusakinisha programu ya antivirus", "C) Kwa kupuuza masasisho (updates)"],
            "answer" => "B"
        ],
        [
            "question" => "6. Firewall ni nini?",
            "options" => ["A) Ukuta wa kimwili", "B) Mfumo wa usalama unaodhibiti trafiki", "C) Aina ya malware"],
            "answer" => "B"
        ],
        [
            "question" => "7. Kwa nini ni muhimu kutumia nywila imara?",
            "options" => ["A) Ni rahisi kukumbuka", "B) Husaidia kuzuia ufikiaji usioruhusiwa", "C) Hazina umuhimu"],
            "answer" => "B"
        ],
        [
            "question" => "8. Uthibitishaji wa hatua mbili (Two-Factor Authentication) ni nini?",
            "options" => ["A) Njia ya kuingia kwa kutumia nywila mbili", "B) Mchakato wa usalama unaohitaji njia mbili za uthibitisho", "C) Aina ya malware"],
            "answer" => "B"
        ],
        [
            "question" => "9. Uhandisi wa kijamii (social engineering) unaweza kuwa tishio vipi?",
            "options" => ["A) Unahusisha mashambulizi ya kimwili", "B) Unawashawishi watu kutoa taarifa", "C) Ni aina ya programu"],
            "answer" => "B"
        ],
        [
            "question" => "10. Unapaswa kufanya nini ukipokea kiungo (link) kinachotia shaka?",
            "options" => ["A) Bonyeza ili uone kilicho ndani", "B) Futa barua pepe hiyo", "C) Itume kwa rafiki"],
            "answer" => "B"
        ],
        [
            "question" => "11. Ransomware ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Malware inayofunga faili zako na kudai fidia", "C) Kipimo cha usalama"],
            "answer" => "B"
        ],
        [
            "question" => "12. Unawezaje kurejesha faili baada ya shambulio la ransomware?",
            "options" => ["A) Kulipa fidia", "B) Kurudisha kutoka kwenye nakala rudufu (backup)", "C) Kupuuzia"],
            "answer" => "B"
        ],
        [
            "question" => "13. Dalili za shambulio la mtandao ni zipi?",
            "options" => ["A) Kompyuta kuwa polepole", "B) Kuongezeka kwa muda wa betri", "C) Kuongezeka kwa nafasi ya hifadhi"],
            "answer" => "A"
        ],
        [
            "question" => "14. Unawezaje kulinda mtandao wako wa Wi-Fi?",
            "options" => ["A) Kwa kutumia nywila dhaifu", "B) Kwa kuwezesha usimbaji fiche (encryption)", "C) Kwa kushiriki nywila na kila mtu"],
            "answer" => "B"
        ],
        [
            "question" => "15. Usimbaji fiche wa data (encryption) ni nini?",
            "options" => ["A) Njia ya kuongeza kasi ya uhamisho wa data", "B) Njia ya kulinda data kwa kuibadilisha kuwa msimbo", "C) Aina ya malware"],
            "answer" => "B"
        ],
        [
            "question" => "16. Dalili za wizi wa utambulisho ni zipi?",
            "options" => ["A) Kupokea bili zisizotarajiwa", "B) Kupata marafiki zaidi mitandaoni", "C) Kuongezeka kwa manunuzi mtandaoni"],
            "answer" => "A"
        ],
        [
            "question" => "17. Unapaswa kufanya nini ikiwa nywila yako imeathiriwa?",
            "options" => ["A) Ibadili mara moja", "B) Endelea kuitumia", "C) Shiriki na marafiki"],
            "answer" => "A"
        ],
        [
            "question" => "18. VPN ni nini?",
            "options" => ["A) Aina ya kompyuta", "B) Mtandao wa kibinafsi unaolinda muunganisho wako", "C) Aina ya malware"],
            "answer" => "B"
        ],
        [
            "question" => "19. Shambulio la DDoS ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Shambulio la kutatiza huduma kwa kuzidisha trafiki", "C) Kipimo cha usalama"],
            "answer" => "B"
        ],
        [
            "question" => "20. Udhaifu wa sifuri (zero-day vulnerability) ni nini?",
            "options" => ["A) Dosari ya usalama inayojulikana kwa sifuri siku", "B) Aina ya malware", "C) Tundu la usalama lisilojulikana kwa muundaji wa programu"],
            "answer" => "C"
        ],
        [
            "question" => "21. Botnet ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Mtandao wa kompyuta zilizoambukizwa zinazosimamiwa na mdukuzi", "C) Kipimo cha usalama"],
            "answer" => "B"
        ],
        [
            "question" => "22. Kiraka cha usalama (security patch) ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Sasisho la programu linalorekebisha dosari za usalama", "C) Kipimo cha usalama"],
            "answer" => "B"
        ],
        [
            "question" => "23. Uvunjifu wa usalama (security breach) ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Tukio linalofichua taarifa nyeti", "C) Kipimo cha usalama"],
            "answer" => "B"
        ],
        [
            "question" => "24. Ukaguzi wa usalama (security audit) ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Tathmini ya hatua za usalama za shirika", "C) Kipimo cha usalama"],
            "answer" => "B"
        ],
        [
            "question" => "25. Sera ya usalama (security policy) ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Seti ya sheria na taratibu za kulinda taarifa", "C) Kipimo cha usalama"],
            "answer" => "B"
        ],
        [
            "question" => "26. Tathmini ya hatari za usalama (security risk assessment) ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Tathmini ya vitisho vinavyoweza kutokea", "C) Kipimo cha usalama"],
            "answer" => "B"
        ],
        [
            "question" => "27. Tukio la usalama ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Tukio linalokiuka sera za usalama", "C) Hatua ya usalama"],
            "answer" => "B"
        ],
        [
            "question" => "28. Programu ya uhamasishaji wa usalama ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Programu ya kuelimisha wafanyakazi kuhusu hatari za usalama", "C) Hatua ya usalama"],
            "answer" => "B"
        ],
        [
            "question" => "29. Mpango wa kukabiliana na uvunjifu wa usalama ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Mpango wa kukabiliana na matukio ya usalama", "C) Hatua ya usalama"],
            "answer" => "B"
        ],
        [
            "question" => "30. Timu ya kukabiliana na matukio ya usalama ni nini?",
            "options" => ["A) Aina ya antivirus", "B) Timu inayoshughulikia matukio ya usalama", "C) Hatua ya usalama"],
            "answer" => "B"
        ]



        // Your questions array remains unchanged...
    ];

    // Initialize the current question index
    if (!isset($_SESSION['current_question'])) {
        $_SESSION['current_question'] = 0;
        $_SESSION['score'] = 0; // Initialize score
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Evaluate answer and increase score if correct
        if (isset($_POST['answer'])) {
            $answer = $_POST['answer'];
            $correct_answer = $questions[$_SESSION['current_question']]['answer'];

            if ($answer == $correct_answer) {
                $_SESSION['score']++;
            }
        }

        // Move to the next question
        $_SESSION['current_question']++;
    }

    // Check if quiz is finished
    if ($_SESSION['current_question'] >= count($questions)) {
        // Redirect to results page
        header("Location: swahiliresult.php");
        exit();
    }

    // Get the current question
    $current_question = $_SESSION['current_question'];
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <h1>Jaribio la Usalama Mtandaoni</h1>
        <form method="POST">
            <fieldset>
                <legend><?php echo $questions[$current_question]['question']; ?></legend>
                <?php foreach ($questions[$current_question]['options'] as $option): ?>
                    <label>
                        <input type="radio" name="answer" value="<?php echo $option[0]; ?>" required>
                        <?php echo $option; ?>
                    </label><br>
                <?php endforeach; ?>

                <?php if ($current_question < count($questions) - 1): ?>
                    <input type="submit" value="Inayofuata">
                <?php else: ?>
                    <input type="Submit" value="Imekamilika">
                <?php endif; ?>
            </fieldset>
        </form>
    </body>

    </html>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>