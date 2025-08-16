<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Quiz</title>
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
    <header>Programming Quiz</header>
    <form method="post">
        <div class="form-group">
        <p>Participant Name:</p>
<input type="text" name="participant_name" required>

            <p>1. Which language is known as the backbone of web development?</p>
            <select name="q1">
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="Python">Python</option>
            </select>

            <p>2. Which of the following is not a programming language?</p>
            <select name="q2">
                <option value="Ruby">Ruby</option>
                <option value="HTML">HTML</option>
                <option value="C++">C++</option>
                <option value="Java">Java</option>
            </select>

            <p>3. What does SQL stand for?</p>
            <select name="q3">
                <option value="Structured Query Language">Structured Query Language</option>
                <option value="Simple Query Language">Simple Query Language</option>
                <option value="Strong Query Language">Strong Query Language</option>
                <option value="Syntax Query Language">Syntax Query Language</option>
            </select>

            <p>4. Which company developed the Java programming language?</p>
            <select name="q4">
                <option value="Sun Microsystems">Sun Microsystems</option>
                <option value="Microsoft">Microsoft</option>
                <option value="Google">Google</option>
                <option value="Apple">Apple</option>
            </select>

            <p>5. What does CSS stand for?</p>
            <select name="q5">
                <option value="Cascading Style Sheets">Cascading Style Sheets</option>
                <option value="Computer Style Sheets">Computer Style Sheets</option>
                <option value="Creative Style Sheets">Creative Style Sheets</option>
                <option value="Colorful Style Sheets">Colorful Style Sheets</option>
            </select>

            <p>6. What is the main function of a database management system (DBMS)?</p>
            <select name="q6">
                <option value="Store and retrieve data">Store and retrieve data</option>
                <option value="Design web pages">Design web pages</option>
                <option value="Compile code">Compile code</option>
                <option value="Create games">Create games</option>
            </select>

            <p>7. What is the extension for a Python file?</p>
            <select name="q7">
                <option value=".py">.py</option>
                <option value=".java">.java</option>
                <option value=".exe">.exe</option>
                <option value=".html">.html</option>
            </select>

            <p>8. Which language is primarily used for developing iOS apps?</p>
            <select name="q8">
                <option value="Swift">Swift</option>
                <option value="Java">Java</option>
                <option value="Kotlin">Kotlin</option>
                <option value="C#">C#</option>
            </select>

            <p>9. In JavaScript, which of the following is used to declare a variable?</p>
            <select name="q9">
                <option value="var">var</option>
                <option value="let">let</option>
                <option value="const">const</option>
                <option value="All of the above">All of the above</option>
            </select>

            <p>10. What is the term used for a loop that never ends?</p>
            <select name="q10">
                <option value="Infinite loop">Infinite loop</option>
                <option value="Endless loop">Endless loop</option>
                <option value="Recursive loop">Recursive loop</option>
                <option value="While loop">While loop</option>
            </select>
        </div>
        <input type="submit" class="btn-custom" value="Submit">
    </form>
    <?php
// إعداد الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "competitiondb";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام لإنشاء الجدول إذا لم يكن موجودًا
$createTableQuery = "
CREATE TABLE IF NOT EXISTS programmingquizresults (
    id INT AUTO_INCREMENT PRIMARY KEY,
    participant_name VARCHAR(255) NOT NULL,
    correct_answers INT NOT NULL,
    total_questions INT NOT NULL,
    passed INT NOT NULL
)";
$conn->query($createTableQuery);

// تعريف الإجابات الصحيحة
$answers = [
    "q1" => "JavaScript",
    "q2" => "HTML",
    "q3" => "Structured Query Language",
    "q4" => "Sun Microsystems",
    "q5" => "Cascading Style Sheets",
    "q6" => "Store and retrieve data",
    "q7" => ".py",
    "q8" => "Swift",
    "q9" => "All of the above",
    "q10" => "Infinite loop"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على اسم المتسابق من النموذج
    $participant_name = $_POST['participant_name'] ?? '';
    $correct_answers = 0;
    $total_questions = 10;

    // حساب عدد الإجابات الصحيحة
    foreach ($answers as $question => $correct_answer) {
        if (isset($_POST[$question]) && trim($_POST[$question]) == $correct_answer) {
            $correct_answers++;
        }
    }

    // تحديد حالة النجاح أو الفشل
    $passed = $correct_answers >= 7 ? 1 : 0;

    // إدراج النتيجة في قاعدة البيانات مع اسم المتسابق
    $stmt = $conn->prepare("INSERT INTO programmingquizresults (participant_name, correct_answers, total_questions, passed) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii", $participant_name, $correct_answers, $total_questions, $passed);
    $stmt->execute();
    $stmt->close();
}

// عرض بيانات المتسابقين
$result = $conn->query("SELECT participant_name, correct_answers, total_questions, passed FROM programmingquizresults");

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Participant Name</th><th>Correct Answers</th><th>Total Questions</th><th>Passed</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row['participant_name']) . "</td>";
        echo "<td>" . $row['correct_answers'] . "</td>";
        echo "<td>" . $row['total_questions'] . "</td>";
        echo "<td>" . ($row['passed'] ? 'Yes' : 'No') . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
    

</div>
</body>
</html>
