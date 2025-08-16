<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Registration Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
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
        .form-group input {
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
        <header>Register Your Team</header>

        <?php
        $teamName = $member1 = $member2 = $member3 = $member4 = $member5 = "";
        $errorMessage = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $teamName = $_POST["team_name"];
            $member1 = $_POST["member1"];
            $member2 = $_POST["member2"];
            $member3 = $_POST["member3"];
            $member4 = $_POST["member4"];
            $member5 = $_POST["member5"];

            if (empty($teamName)) {
                $errorMessage = "Please enter a team name.";
            } else {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "competitiondb";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // إعداد استعلام إدخال اسم الفريق
                $stmt = $conn->prepare("INSERT INTO Teams (TeamName) VALUES (?)");
                $stmt->bind_param("s", $teamName);

                if ($stmt->execute()) {
                    $teamID = $conn->insert_id; // الحصول على ID الفريق

                    // إعداد استعلام لإدخال أعضاء الفريق
                    $members = [$member1, $member2, $member3, $member4, $member5];
                    $stmt_member = $conn->prepare("INSERT INTO TeamMembers (TeamID, MemberName) VALUES (?, ?)");

                    foreach ($members as $member) {
                        if (!empty($member)) {
                            $stmt_member->bind_param("is", $teamID, $member);
                            $stmt_member->execute();
                        }
                    }

                    // التوجيه لصفحة اختيار المنافسات بعد التسجيل الناجح
                    header("Location: choose_competitions.php?teamID=$teamID");
                    exit();
                } else {
                    echo "Error: Could not register team.";
                }

                // إغلاق الاتصال بقاعدة البيانات
                $stmt->close();
                $conn->close();
            }
        }

        if ($errorMessage) {
            echo "<div style='text-align:center; color:red;'>$errorMessage</div>";
        }
        ?>

        <form method="post">
            <div class="form-group">
                <h6>Team Name</h6>
                <input type="text" name="team_name" placeholder="Enter team name" value="<?php echo htmlspecialchars($teamName); ?>" required>
            </div>
            <div class="form-group">
                <h6>Member 1</h6>
                <input type="text" name="member1" placeholder="Enter member 1 name" value="<?php echo htmlspecialchars($member1); ?>">
            </div>
            <div class="form-group">
                <h6>Member 2</h6>
                <input type="text" name="member2" placeholder="Enter member 2 name" value="<?php echo htmlspecialchars($member2); ?>">
            </div>
            <div class="form-group">
                <h6>Member 3</h6>
                <input type="text" name="member3" placeholder="Enter member 3 name" value="<?php echo htmlspecialchars($member3); ?>">
            </div>
            <div class="form-group">
                <h6>Member 4</h6>
                <input type="text" name="member4" placeholder="Enter member 4 name" value="<?php echo htmlspecialchars($member4); ?>">
            </div>
            <div class="form-group">
                <h6>Member 5</h6>
                <input type="text" name="member5" placeholder="Enter member 5 name" value="<?php echo htmlspecialchars($member5); ?>">
            </div>
            <div class="form-group">
            <a href="http://localhost/comp/Competitions.php" style="display: inline-block; padding: 15px 30px; color: #fff; background-color: #3A6EA5; text-align: center; border-radius: 6px; text-decoration: none; font-size: 1rem; font-weight: 400; transition: all 0.2s ease;">reguster group</a>

            </div>
        </form>
    </div>
</body>
</html>
