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
            "question" => "1.What is phishing?",
            "options" => ["A) A type of fishing", "B) A method to steal personal information", "C) A computer virus"],
            "answer" => "B"
        ],
        [
            "question" => "2.How can you identify a phishing email?",
            "options" => ["A) It has a generic greeting", "B) It is from a known sender", "C) It contains no links"],
            "answer" => "A"
        ],
        [
            "question" => "3.What is malware?",
            "options" => ["A) Software that helps you", "B) Malicious software designed to harm", "C) A type of antivirus"],
            "answer" => "B"
        ],
        [
            "question" => "4.What are the common types of malware?",
            "options" => ["A) Viruses, worms, and trojans", "B) Web browsers and apps", "C) Operating systems"],
            "answer" => "A"
        ],
        [
            "question" => "5.How can you protect your computer from malware?",
            "options" => ["A) By using strong passwords", "B) By installing antivirus software", "C) By ignoring updates"],
            "answer" => "B"
        ],
        [
            "question" => "6.What is a firewall?",
            "options" => ["A) A physical wall", "B) A security system that monitors traffic", "C) A type of malware"],
            "answer" => "B"
        ],
        [
            "question" => "7.Why is it important to use strong passwords?",
            "options" => ["A) They are easier to remember", "B) They help prevent unauthorized access", "C) They are not important"],
            "answer" => "B"
        ],
        [
            "question" => "8.What is two-factor authentication?",
            "options" => ["A) A method of logging in with two passwords", "B) A security process that requires two forms of verification", "C) A type of malware"],
            "answer" => "B"
        ],
        [
            "question" => "9.How can social engineering be a threat?",
            "options" => ["A) It involves physical attacks", "B) It manipulates people into giving information", "C) It is a type of software"],
            "answer" => "B"
        ],
        [
            "question" => "10.What should you do if you receive a suspicious link?",
            "options" => ["A) Click on it to see what it is", "B) Delete the email", "C) Forward it to a friend"],
            "answer" => "B"
        ],
        [
            "question" => "11.What is ransomware?",
            "options" => ["A) A type of antivirus", "B) Malware that locks your files for ransom", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "12.How can you recover from a ransomware attack?",
            "options" => ["A) Pay the ransom", "B) Restore from a backup", "C) Ignore it"],
            "answer" => "B"
        ],
        [
            "question" => "13.What are the signs of a cyber attack?",
            "options" => ["A) Slow computer performance", "B) Increased battery life", "C) More storage space"],
            "answer" => "A"
        ],
        [
            "question" => "14.How can you secure your Wi-Fi network?",
            "options" => ["A) By using a weak password", "B) By enabling encryption", "C) By sharing the password with everyone"],
            "answer" => "B"
        ],
        [
            "question" => "15.What is data encryption?",
            "options" => ["A) A method to speed up data transfer", "B) A way to secure data by converting it into a code", "C) A type of malware"],
            "answer" => "B"
        ],
        [
            "question" => "16.What is a common sign of identity theft?",
            "options" => ["A) Receiving unexpected bills", "B) Getting more friends on social media", "C) Increased online shopping"],
            "answer" => "A"
        ],
        [
            "question" => "17.What should you do if your password is compromised?",
            "options" => ["A) Change it immediately", "B) Keep using it", "C) Share it with friends"],
            "answer" => "A"
        ],
        [
            "question" => "18.What is a VPN?",
            "options" => ["A) A type of computer", "B) A virtual private network that secures your connection", "C) A type of malware"],
            "answer" => "B"
        ],
        [
            "question" => "19.What is a DDoS attack?",
            "options" => ["A) A type of antivirus", "B) A distributed denial-of-service attack that floods a system with traffic", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "20.What is a zero-day vulnerability?",
            "options" => ["A) A security flaw that is known for zero days", "B) A type of malware", "C) A security hole that is unknown to the software vendor"],
            "answer" => "C"
        ],
        [
            "question" => "21.What is a botnet?",
            "options" => ["A) A type of antivirus", "B) A network of infected computers controlled by a hacker", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "22.What is a security patch?",
            "options" => ["A) A type of antivirus", "B) A software update that fixes security vulnerabilities", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "23.What is a security breach?",
            "options" => ["A) A type of antivirus", "B) An incident that exposes sensitive information", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "24.What is a security audit?",
            "options" => ["A) A type of antivirus", "B) An evaluation of an organization's security measures", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "25.What is a security policy?",
            "options" => ["A) A type of antivirus", "B) A set of rules and procedures to protect information", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "26.What is a security risk assessment?",
            "options" => ["A) A type of antivirus", "B) An evaluation of potential threats to an organization", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "27.What is a security incident?",
            "options" => ["A) A type of antivirus", "B) An event that violates security policies", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "28.What is a security awareness program?",
            "options" => ["A) A type of antivirus", "B) A program to educate employees about security risks", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "29.What is a security breach response plan?",
            "options" => ["A) A type of antivirus", "B) A plan to respond to security incidents", "C) A security measure"],
            "answer" => "B"
        ],
        [
            "question" => "30.What is a security incident response team?",
            "options" => ["A) A type of antivirus", "B) A team that responds to security incidents", "C) A security measure"],
            "answer" => "B"
        ],
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
        header("Location: englishresult.php");
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
        <h1>Cybersecurity Quiz</h1>
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
                    <input type="submit" value="Next">
                <?php else: ?>
                    <input type="submit" value="Finish">
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