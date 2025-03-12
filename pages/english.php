<?php
//session_start();
include '../authentication/db.php'; // Database connection

// Set default language if not chosen
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'English';
}

// Fetch Courses from DB
$column_title = $_SESSION['lang'] == 'English' ? 'title_en' : 'title_sw';
$column_content = $_SESSION['lang'] == 'English' ? 'content_en' : 'content_sw';

$query = "SELECT $column_title AS title, $column_content AS content, category FROM cybersecurity_content ORDER BY created_at DESC";
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
                <li class="nav-item"><a class="nav-link" href="/pages/services.php">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/feedback.php">Feedback</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/about.php">About</a></li>
        </div>
    </nav>

    <br>
    <?php
    // Cybersecurity Threats Content for English
    $content = [
        [
            "title" => "Cybersecurity Awareness in Kenya",
            "intro" => "Cybersecurity awareness is crucial in Kenya due to the rising number of cyber threats. Here are some common threats and safety measures to protect youself.",
            "title" => "Mobile Money Scams",
            "definition" => "A type of fraud where attackers trick victims into sending money or revealing mobile banking details.",
            "safety_measures" => [
                "Always verify caller identity before sending money.",
                "Do not share PINs or OTPs with anyone.",
                "Use official customer service numbers for assistance."
            ],
            "regulation" => "Kenyan Regulation: Central Bank of Kenya (CBK) - Guidelines on mobile money fraud prevention.",
            "real_life_example" => "In 2022, Kenyans lost millions to fraudsters posing as Safaricom M-Pesa agents, requesting PINs and withdrawing funds.",
            "case_study" => "A Nairobi businessman lost KSh 50,000 after receiving a fake 'SIM card upgrade' request."
        ],
        [
            "title" => "Phishing Attacks",
            "definition" => "A type of cybercrime where attackers impersonate legitimate organizations to steal sensitive data.",
            "safety_measures" => [
                "Always verify email sources.",
                "Don't click on suspicious links.",
                "Enable multi-factor authentication (MFA)."
            ],
            "regulation" => "Kenyan Regulation: Computer Misuse and Cybercrimes Act (2018) - Section 28 prohibits phishing activities.",
            "real_life_example" => "In 2022, Kenyan banks reported an increase in phishing scams where attackers mimicked bank emails to trick customers into revealing their online banking details."
        ],
        [
            "title" => "Identity Theft",
            "definition" => "Unauthorized use of someone’s personal information for fraud.",
            "safety_measures" => [
                "Use strong, unique passwords.",
                "Avoid sharing personal details on social media.",
                "Monitor bank transactions regularly."
            ],
            "regulation" => "Kenyan Regulation: National Payment Systems Act - Protects consumers from financial fraud.",
            "real_life_example" => "A Nairobi-based company lost KSh 2 million when attackers used stolen employee credentials to gain access to payroll systems."
        ],
        [
            "title" => "Ransomware",
            "definition" => "Malware that encrypts files and demands a ransom for decryption.",
            "safety_measures" => [
                "Regularly back up your data.",
                "Don't open suspicious email attachments.",
                "Use reputable antivirus software."
            ],
            "regulation" => "Kenyan Regulation: Data Protection Act (2019) - Requires organizations to protect personal data from cyber threats.",
            "case_study" => "In 2023, a Kenyan healthcare provider was attacked by the 'WannaCry' ransomware, leading to patient data being locked for several days."
        ],
        [
            "title" => "Social Engineering Attacks",
            "definition" => "Manipulating individuals to reveal confidential information.",
            "safety_measures" => [
                "Verify caller identities before sharing information.",
                "Avoid posting sensitive details publicly.",
                "Train employees on social engineering tactics."
            ],
            "regulation" => "Kenyan Regulation: Cybercrime Act (2018) - Section 31 criminalizes fraudulent cyber activities.",
            "case_study" => "A Kenyan government employee unknowingly gave access to classified files after receiving a fake IT support call."
        ],
        [
            "title" => "Pyramid and Ponzi Schemes",
            "definition" => "Fraudulent investment schemes promising high returns with little risk.",
            "safety_measures" => [
                "Be cautious of 'too good to be true' investment offers.",
                "Verify the legitimacy of financial schemes with regulatory authorities.",
                "Avoid investments that require recruitment to earn money."
            ],
            "regulation" => "Kenyan Regulation: Capital Markets Authority Act - Outlaws pyramid schemes.",
            "real_life_example" => "In 2021, thousands of Kenyans lost money in the 'Amazon Web Worker' Ponzi scheme, which collapsed after luring investors with fake returns."
        ],
        [
            "title" => "Data Breaches",
            "definition" => "Unauthorized access to confidential data.",
            "safety_measures" => [
                "Encrypt sensitive files.",
                "Use firewalls and strong access controls.",
                "Regular security audits."
            ],
            "regulation" => "Kenyan Regulation: Data Protection Act (2019) - Mandates organizations to report breaches to the Data Commissioner.",
            "real_life_example" => "In 2021, a major Kenyan telecom provider faced a breach where thousands of customer records were exposed online."
        ],
        [
            "title" => "Malware & Viruses",
            "definition" => "Malicious software that disrupts or damages systems.",
            "safety_measures" => [
                "Keep software updated.",
                "Use trusted antivirus programs.",
                "Avoid downloading files from unknown sources."
            ],
            "regulation" => "Kenyan Regulation: Computer Misuse Act - Outlaws creating and distributing malware.",
            "case_study" => "The 'ILOVEYOU' virus once infected thousands of Kenyan computers, leading to massive data loss."
        ]
    ];
    ?>
    <?php foreach ($content as $threat): ?>
        <div class="threat">
            <h2><?php echo $threat['title']; ?></h2>
            <p><strong>Definition:</strong> <?php echo $threat['definition']; ?></p>
            <p><strong>Safety Measures:</strong></p>
            <ul>
                <?php foreach ($threat['safety_measures'] as $measure): ?>
                    <li><?php echo $measure; ?></li>
                <?php endforeach; ?>
            </ul>
            <p><strong>Regulation:</strong> <?php echo $threat['regulation']; ?></p>
            <?php if (isset($threat['real_life_example'])): ?>
                <p><strong>Real-Life Example:</strong> <?php echo $threat['real_life_example']; ?></p>
            <?php endif; ?>
            <?php if (isset($threat['case_study'])): ?>
                <p><strong>Case Study:</strong> <?php echo $threat['case_study']; ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>