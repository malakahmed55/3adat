<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Knowledge Quiz</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            background-color: #FFFFFF;
        }
        .container {
            position: relative;
            max-width: 700px;
            width: 100%;
            background: #F6F4F1;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 80px;
        }
        header {
            font-size: 1.5rem;
            color: #4E4A4A;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            width: 100%;
            margin-top: 20px;
            text-align: center;
        }
        .form-group h6 {
            color: #4E4A4A;
            font-weight: bold;
            margin-bottom: 10px;
        }
        select {
            height: 50px;
            width: 100%;
            font-size: 1rem;
            color: #4E4A4A;
            border: 1px solid #B0AFAE;
            border-radius: 6px;
            padding: 0 15px;
            background-color: #FFFFFF;
            margin-top: 8px;
        }
        .btn-custom {
            height: 55px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #3A6EA5;
            border-radius: 6px;
        }
        .btn-custom:hover {
            background: #2a537f; /* Darker shade on hover */
        }
    </style>
</head>
<body>
<div class="container">
    <header>General Knowledge Quiz</header>
    <form method="post">
    <p>Participant Name:</p>
            <input type="text" name="participant_name" required placeholder="Enter your name" style="width: 100%; height: 40px; padding: 0 15px; border-radius: 6px; border: 1px solid #B0AFAE; margin-bottom: 20px;">

        <p>1. What is the capital city of France?</p>
        <select name="q1">
            <option value="Paris">Paris</option>
            <option value="Berlin">Berlin</option>
            <option value="Madrid">Madrid</option>
            <option value="Rome">Rome</option>
        </select>

        <p>2. Who wrote the play 'Romeo and Juliet'?</p>
        <select name="q2">
            <option value="Shakespeare">William Shakespeare</option>
            <option value="Hemingway">Ernest Hemingway</option>
            <option value="Tolkien">J.R.R. Tolkien</option>
            <option value="Dickens">Charles Dickens</option>
        </select>

        <p>3. Which planet is known as the Red Planet?</p>
        <select name="q3">
            <option value="Mars">Mars</option>
            <option value="Jupiter">Jupiter</option>
            <option value="Saturn">Saturn</option>
            <option value="Venus">Venus</option>
        </select>

        <p>4. What is the largest ocean on Earth?</p>
        <select name="q4">
            <option value="Pacific">Pacific Ocean</option>
            <option value="Atlantic">Atlantic Ocean</option>
            <option value="Indian">Indian Ocean</option>
            <option value="Arctic">Arctic Ocean</option>
        </select>

        <p>5. Who discovered electricity?</p>
        <select name="q5">
            <option value="Franklin">Benjamin Franklin</option>
            <option value="Edison">Thomas Edison</option>
            <option value="Tesla">Nikola Tesla</option>
            <option value="Newton">Isaac Newton</option>
        </select>

        <p>6. What is the longest river in the world?</p>
        <select name="q6">
            <option value="Nile">Nile</option>
            <option value="Amazon">Amazon</option>
            <option value="Yangtze">Yangtze</option>
            <option value="Mississippi">Mississippi</option>
        </select>

        <p>7. In which year did World War II end?</p>
        <select name="q7">
            <option value="1945">1945</option>
            <option value="1939">1939</option>
            <option value="1942">1942</option>
            <option value="1950">1950</option>
        </select>

        <p>8. Who painted the Mona Lisa?</p>
        <select name="q8">
            <option value="Da Vinci">Leonardo da Vinci</option>
            <option value="Van Gogh">Vincent van Gogh</option>
            <option value="Picasso">Pablo Picasso</option>
            <option value="Rembrandt">Rembrandt</option>
        </select>

        <p>9. What is the smallest country in the world?</p>
        <select name="q9">
            <option value="Vatican">Vatican City</option>
            <option value="Monaco">Monaco</option>
            <option value="Nauru">Nauru</option>
            <option value="Liechtenstein">Liechtenstein</option>
        </select>

        <p>10. What is the chemical symbol for water?</p>
        <select name="q10">
            <option value="H2O">H₂O</option>
            <option value="O2">O₂</option>
            <option value="CO2">CO₂</option>
            <option value="NaCl">NaCl</option>
        </select>

        <div class="form-group">
            <input type="submit" value="Submit Answers" class="btn-custom">
        </div>
    </form>
    <?php
$servername = "localhost"; // عنوان الخادم
$username = "root";        // اسم المستخدم
$password = "";            // كلمة المرور
$dbname = "competitiondb"; // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $participant_name = $_POST['participant_name']; // Get the participant name from the form

    $correct_answers = array(
        'q1' => 'Paris',
        'q2' => 'Shakespeare',
        'q3' => 'Mars',
        'q4' => 'Pacific',
        'q5' => 'Franklin',
        'q6' => 'Nile',
        'q7' => '1945',
        'q8' => 'Da Vinci',
        'q9' => 'Vatican',
        'q10' => 'H2O'
    );
    $score = 0;
    foreach ($correct_answers as $question => $correct_answer) {
        if (isset($_POST[$question]) && $_POST[$question] == $correct_answer) {
            $score++;
        }
    }

    // Display the result
    echo "<h2 style='text-align:center;'>Your score: $score out of 10</h2>";
    $passed = $score >= 7 ? 1 : 0;
    $failed = $passed ? 0 : 1;

    if ($passed) {
        echo "<h3 style='color: green; text-align:center;'>Congratulations! You passed the quiz 🎉</h3>";
    } else {
        echo "<h3 style='color: red; text-align:center;'>Sorry, you failed the quiz. Better luck next time! 💪</h3>";
    }

    // Insert result into the database including participant name
    $stmt = $conn->prepare("INSERT INTO information_result (participant_name, score, total_questions, passed, failed) VALUES (?, ?, 10, ?, ?)");
    $stmt->bind_param("siid", $participant_name, $score, $passed, $failed);
    $stmt->execute();
    $stmt->close();
    $conn->close();


// Fetch and display results from the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM information_result ORDER BY created_at DESC"; // Assuming there is a created_at column
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2 style='text-align:center;'>Previous Results:</h2>";
    echo "<table style='width: 100%; margin-top: 20px; border-collapse: collapse;'>
            <thead>
                <tr>
                    <th style='border: 1px solid #B0AFAE; padding: 8px; text-align: left;'>Participant</th>
                    <th style='border: 1px solid #B0AFAE; padding: 8px; text-align: left;'>Score</th>
                    <th style='border: 1px solid #B0AFAE; padding: 8px; text-align: left;'>Passed</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td style='border: 1px solid #B0AFAE; padding: 8px;'>" . htmlspecialchars($row['participant_name']) . "</td>
                <td style='border: 1px solid #B0AFAE; padding: 8px;'>" . $row['score'] . "</td>
                <td style='border: 1px solid #B0AFAE; padding: 8px;'>" . ($row['passed'] ? 'Yes' : 'No') . "</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<h3 style='text-align:center;'>No previous results found.</h3>";
}

$conn->close();
?>
</div>
</body>
</html>
