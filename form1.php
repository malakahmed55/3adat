<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* General Reset and Font */
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
        }
        .form .input-box {
            width: 100%;
            margin-top: 20px;
        }
        .input-box label {
            color: #4E4A4A;
            font-weight: bold;
        }
        .form .input-box input, .form .input-box select {
            height: 50px;
            width: 100%;
            font-size: 1rem;
            color: #4E4A4A;
            margin-top: 8px;
            border: 1px solid #B0AFAE;
            border-radius: 6px;
            padding: 0 15px;
            background-color: #FFFFFF;
        }
        .form button {
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
        }
    </style>
</head>
<body>
    <section class="container">
        <header>Registration Form</header>
        <form method="post" class="form" action="">
            <div class="input-box">
                <label>First Name</label>
                <input type="text" name="first_name" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <label>Second Name</label>
                <input type="text" name="second_name" placeholder="Enter your second name" required>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter email address" required>
            </div>
            <div class="input-box">
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Enter phone number" required>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input type="password" name="password2" placeholder="Confirm password" required>
            </div>
            <div class="input-box">
                <label>Group or Single?</label>
                <select name="group_or_single" required>
                    <option value="group">Group</option>
                    <option value="single">Single</option>
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
    </section>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = ""; // اتركها فارغة إذا لم يكن هناك كلمة مرور
$dbname = "competitiondb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $group_or_single = $_POST['group_or_single'];

    // التحقق من تكرار البريد الإلكتروني
    $check_query = "SELECT * FROM registrations WHERE email = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "البريد الإلكتروني مستخدم بالفعل. يرجى استخدام بريد إلكتروني آخر.";
    } else {
        // إدخال البيانات إلى قاعدة البيانات
        $insert_query = "INSERT INTO registrations (first_name, second_name, email, phone, password, group_or_single) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("ssssss", $first_name, $second_name, $email, $phone, $password, $group_or_single);

        if ($stmt_insert->execute()) {
            // توجيه إلى الصفحة المناسبة بناءً على اختيار المستخدم
            if ($group_or_single == "group") {
                header("Location: http://localhost/comp/group.php");
            } else {
                header("Location: http://localhost/malak ahmed task2/Competitions.php");
            }
            exit();
        } else {
            echo "حدث خطأ أثناء التسجيل. يرجى المحاولة مرة أخرى.";
        }
    }
}
$conn->close();
?>
