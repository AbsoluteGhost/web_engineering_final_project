<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester Subjects and Grading System</title>
    <link rel="stylesheet" href="signup.css?v=<?php echo time(); ?>">
</head>
<body>
    
    <div class="container">
        <h1>Welcome, <?php echo $name; ?>!</h1>
        <!-- <ul>
            <li><b>Name:</b> <?php echo $name; ?></li>
            <li><b>Email:</b> <?php echo $email; ?></li>
            <li><b>Phone:</b> <?php echo $phone; ?></li>
            <li><b>Address:</b> <?php echo $address; ?></li>
        </ul> -->
        <h1>Your Semester Subjects</h1>

        
        <?php
        // subjects
        $subjects = [
            "Data Structures and Algorithms",
            "Database Management Systems",
            "Operating Systems",
            "Computer Networks",
            "Artificial Intelligence",
            "Software Engineering",
            "Web Development",
            "Mobile Application Development",
            "Cybersecurity",
            "Machine Learning",
            "Cloud Computing",
            "Compiler Design"
        ];

        $quotes = [
        "Success is not final, failure is not fatal: It is the courage to continue that counts.",
        "The only limit to our realization of tomorrow is our doubts of today.",
        "Success usually comes to those who are too busy to be looking for it.",
        "Don't watch the clock; do what it does. Keep going.",
        "The way to get started is to quit talking and begin doing."
        ];
        $randomQuote = $quotes[array_rand($quotes)];
        
        shuffle($subjects);
        $selectedSubjects = array_slice($subjects, 0, 5);
        ?>

        <table class="contact-table">
            <thead>
                <tr>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($selectedSubjects as $subject): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($subject); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h1>Grading System</h1>

        
        <?php
        
        $grades = [
            "A+" => 80,
            "A"  => 70,
            "B+" => 60,
            "B"  => 50,
            "C"  => 40,
            "F"  => "Below 40"
        ];
        ?>

        <table class="contact-table">
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Marks Range</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grades as $grade => $marks): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($grade); ?></td>
                        <td><?php echo htmlspecialchars($marks); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Inspirational Quote:</h2>
        <blockquote>
            <p>"<?php echo $randomQuote; ?>"</p>
        </blockquote>

        <a href="index.php" class="back-link">Back to Home</a>
    </div>
</body>
</html>
