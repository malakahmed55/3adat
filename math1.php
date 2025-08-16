<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz</title>
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
        .container header {
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
        .form-group label {
            color: #4E4A4A;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }
        .form-group input, select {
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
    </style>
</head>
<body>
    <div class="container">
        <header>Math Quiz</header>
        <form method="post">
            <div class="form-group">
                <label for="participant_name">Name:</label>
                <input type="text" name="participant_name" id="participant_name" required>
            </div>
            
            <p>1. f(x) = x³ − 3x + 1. Find f'(x): </p>
            <select name="q1">
                <option value="3x^2-3">3x²-3</option>
                <option value="x^2-3">x²-3</option>
                <option value="3x+1">3x+1</option>
                <option value="x^2-1">x²-1</option>
            </select>

            <p>2. Find the roots of the equation: x² - x - 1 = 0:</p>
            <select name="q2">
                <option value="1+sqrt(2)/2,1-sqrt(2)/2">1+√2/2, 1-√2/2</option>
                <option value="1,-1">1, -1</option>
                <option value="0,1">0, 1</option>
                <option value="sqrt(2)/2,-sqrt(2)/2">√2/2, -√2/2</option>
            </select>

            <p>3. Evaluate the integral ∫ dx/(x + 2):</p>
            <select name="q3">
                <option value="ln|x+2| + C">ln|x+2| + C</option>
                <option value="x/(x+2)">x/(x+2)</option>
                <option value="x^2/2 + C">x²/2 + C</option>
                <option value="x^3 + C">x³ + C</option>
            </select>

            <!-- Repeat this format for all remaining questions -->
            <p>4. Solve for x: 5x - 3 = 2x + 9:</p>
            <select name="q4">
                <option value="4">4</option>
                <option value="2">2</option>
                <option value="6">6</option>
                <option value="1">1</option>
            </select>

            <p>5. Find the sum of the first 10 positive integers:</p>
            <select name="q5">
                <option value="55">55</option>
                <option value="45">45</option>
                <option value="50">50</option>
                <option value="60">60</option>
            </select>

            <p>6. Evaluate the derivative of sin(x) at x = π/4:</p>
            <select name="q6">
                <option value="cos(π/4)">cos(π/4)</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="sin(π/4)">sin(π/4)</option>
            </select>

            <input type="submit" value="Submit Answers" class="btn-custom">
        </form>
        <?php
// إعدادات قاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "competitiondb";

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على اسم المشارك
    $participant_name = $_POST['participant_name'] ?? '';
    if (empty($participant_name)) {
        echo "<p style='color: red;'>Please enter your name.</p>";
        exit();
    }

    // الإجابات الصحيحة
    $correct_answers = array(
        'q1' => '3x^2-3',
        'q2' => '1+sqrt(2)/2,1-sqrt(2)/2',
        'q3' => 'ln|x+2| + C',
        'q4' => '4',
        'q5' => '55',
        'q6' => 'cos(π/4)'
    );

    // حساب السكور
    $score = 0;
    $total_questions = count($correct_answers);
    foreach ($correct_answers as $question => $correct_answer) {
        if (isset($_POST[$question]) && $_POST[$question] == $correct_answer) {
            $score++;
        }
    }

    // تحديد النتيجة بناءً على النسبة
    $passing_score = $total_questions / 2; // نصف الأسئلة كشرط للنجاح
    $result = $score >= $passing_score ? "Passed" : "Failed";

    // إدخال النتيجة في قاعدة البيانات
    $sql = "INSERT INTO MathQuizParticipants (ParticipantName, Score, Result) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $participant_name, $score, $result);

    if ($stmt->execute()) {
        echo "<h2>Your score: $score / $total_questions</h2>";
        if ($result == "Passed") {
            echo "<h3 style='color: green;'>Congratulations! You passed the quiz.</h3>";
        } else {
            echo "<h3 style='color: red;'>Sorry, you failed the quiz. Better luck next time!</h3>";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // غلق الـ statement
    $stmt->close();
}

// عرض جميع النتائج (اختياري)
$sql = "SELECT ParticipantName, Score, Result FROM MathQuizParticipants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>All Participants' Results:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>{$row['ParticipantName']}: Score - {$row['Score']}, Result - {$row['Result']}</p>";
    }
}

// غلق الاتصال بقاعدة البيانات
$conn->close();
?>
``
        
</body>
</html>
