<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Quiz</title>
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
        .result {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>History Quiz</header>
        <form method="post">
            <p>Participant Name:</p>
            <input type="text" name="participant_name" required placeholder="Enter your name" style="width: 100%; height: 40px; padding: 0 15px; border-radius: 6px; border: 1px solid #B0AFAE; margin-bottom: 20px;">

            <p>1. When did World War I begin?</p>
            <select name="q1">
                <option value="1914">1914</option>
                <option value="1950">1950</option>
                <option value="1916">1916</option>
                <option value="1939">1939</option>
            </select>

            <p>2. Who was the first president of the United States?</p>
            <select name="q2">
                <option value="George Washington">George Washington</option>
                <option value="Abraham Lincoln">Abraham Lincoln</option>
                <option value="Thomas Jefferson">Thomas Jefferson</option>
                <option value="John Adams">John Adams</option>
            </select>

            <p>3. In which year did the Berlin Wall fall?</p>
            <select name="q3">
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1985">1985</option>
                <option value="1975">1975</option>
            </select>

            <p>4. Who was the famous queen of Ancient Egypt?</p>
            <select name="q4">
                <option value="Cleopatra">Cleopatra</option>
                <option value="Nefertiti">Nefertiti</option>
                <option value="Hatshepsut">Hatshepsut</option>
                <option value="Nefertari">Nefertari</option>
            </select>

            <p>5. What was the name of the ship that carried the Pilgrims to America in 1620?</p>
            <select name="q5">
                <option value="Mayflower">Mayflower</option>
                <option value="Santa Maria">Santa Maria</option>
                <option value="Beagle">Beagle</option>
                <option value="Endeavour">Endeavour</option>
            </select>

            <p>6. Who was the leader of Nazi Germany during World War II?</p>
            <select name="q6">
                <option value="Adolf Hitler">Adolf Hitler</option>
                <option value="Joseph Stalin">Joseph Stalin</option>
                <option value="Benito Mussolini">Benito Mussolini</option>
                <option value="Winston Churchill">Winston Churchill</option>
            </select>

            <p>7. Which empire was known as the "Empire on which the sun never sets"?</p>
            <select name="q7">
                <option value="British Empire">British Empire</option>
                <option value="Roman Empire">Roman Empire</option>
                <option value="Ottoman Empire">Ottoman Empire</option>
                <option value="Mongol Empire">Mongol Empire</option>
            </select>

            <p>8. Who was the founder of the Mongol Empire?</p>
            <select name="q8">
                <option value="Genghis Khan">Genghis Khan</option>
                <option value="Kublai Khan">Kublai Khan</option>
                <option value="Attila the Hun">Attila the Hun</option>
                <option value="Tamerlane">Tamerlane</option>
            </select>

            <p>9. In which year did the Titanic sink?</p>
            <select name="q9">
                <option value="1912">1912</option>
                <option value="1920">1920</option>
                <option value="1905">1905</option>
                <option value="1914">1914</option>
            </select>

            <p>10. Who was assassinated on November 22, 1963, in Dallas, Texas?</p>
            <select name="q10">
                <option value="John F. Kennedy">John F. Kennedy</option>
                <option value="Martin Luther King Jr.">Martin Luther King Jr.</option>
                <option value="Robert Kennedy">Robert Kennedy</option>
                <option value="Abraham Lincoln">Abraham Lincoln</option>
            </select>

            <p>11. What was the capital city of the Byzantine Empire?</p>
            <select name="q11">
                <option value="Constantinople">Constantinople</option>
                <option value="Rome">Rome</option>
                <option value="Alexandria">Alexandria</option>
                <option value="Carthage">Carthage</option>
            </select>

            <p>12. Who discovered America in 1492?</p>
            <select name="q12">
                <option value="Christopher Columbus">Christopher Columbus</option>
                <option value="Amerigo Vespucci">Amerigo Vespucci</option>
                <option value="Leif Erikson">Leif Erikson</option>
                <option value="Vasco da Gama">Vasco da Gama</option>
            </select>

            <p>13. Which country was the first to land a man on the moon?</p>
            <select name="q13">
                <option value="United States">United States</option>
                <option value="Russia">Russia</option>
                <option value="China">China</option>
                <option value="India">India</option>
            </select>

            <p>14. In which year did the French Revolution begin?</p>
            <select name="q14">
                <option value="1789">1789</option>
                <option value="1776">1776</option>
                <option value="1804">1804</option>
                <option value="1848">1848</option>
            </select>

            <p>15. Who was the first female Prime Minister of the United Kingdom?</p>
            <select name="q15">
                <option value="Margaret Thatcher">Margaret Thatcher</option>
                <option value="Theresa May">Theresa May</option>
                <option value="Elizabeth II">Elizabeth II</option>
                <option value="Angela Merkel">Angela Merkel</option>
            </select>

            <p>16. What ancient wonder was located in Babylon?</p>
            <select name="q16">
                <option value="Hanging Gardens">Hanging Gardens</option>
                <option value="Great Pyramid">Great Pyramid</option>
                <option value="Colossus of Rhodes">Colossus of Rhodes</option>
                <option value="Statue of Zeus">Statue of Zeus</option>
            </select>

            <p>17. Who was known as the Sun King?</p>
            <select name="q17">
                <option value="Louis XIV">Louis XIV</option>
                <option value="Louis XVI">Louis XVI</option>
                <option value="Henry IV">Henry IV</option>
                <option value="Charles X">Charles X</option>
            </select>

            <p>18. What was the name of the first artificial satellite launched into space?</p>
            <select name="q18">
                <option value="Sputnik 1">Sputnik 1</option>
                <option value="Explorer 1">Explorer 1</option>
                <option value="Apollo 11">Apollo 11</option>
                <option value="Voyager 1">Voyager 1</option>
            </select>

            <p>19. Who wrote the Declaration of Independence?</p>
            <select name="q19">
                <option value="Thomas Jefferson">Thomas Jefferson</option>
                <option value="George Washington">George Washington</option>
                <option value="John Adams">John Adams</option>
                <option value="Benjamin Franklin">Benjamin Franklin</option>
            </select>

            <p>20. What was the main cause of the Cold War?</p>
            <select name="q20">
                <option value="Ideological conflict between capitalism and communism">Ideological conflict between capitalism and communism</option>
                <option value="Territorial disputes">Territorial disputes</option>
                <option value="World War II outcomes">World War II outcomes</option>
                <option value="Economic competition">Economic competition</option>
            </select>

            <button type="submit" class="btn-custom">Submit</button>
        </form>

    </div>
    <?php
// Database connection
$conn = new mysqli("localhost", "root", "", "competitiondb"); // Adjust username and password accordingly

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare variables for score calculation
    $score = 0;
    $participant_name = $conn->real_escape_string($_POST['participant_name']);

    // Correct answers
    $correct_answers = [
        'q1' => '1914',
        'q2' => 'George Washington',
        'q3' => '1989',
        'q4' => 'Cleopatra',
        'q5' => 'Mayflower',
        'q6' => 'Adolf Hitler',
        'q7' => 'British Empire',
        'q8' => 'Genghis Khan',
        'q9' => '1912',
        'q10' => 'John F. Kennedy',
        'q11' => 'Constantinople',
        'q12' => 'Christopher Columbus',
        'q13' => 'United States',
        'q14' => '1789',
        'q15' => 'Margaret Thatcher',
        'q16' => 'Hanging Gardens',
        'q17' => 'Louis XIV',
        'q18' => 'Sputnik 1',
        'q19' => 'Thomas Jefferson',
        'q20' => 'Ideological conflict between capitalism and communism'
    ];

    // Check answers
    foreach ($correct_answers as $key => $value) {
        if (isset($_POST[$key]) && $_POST[$key] == $value) {
            $score++;
        }
    }

    // Insert results into the database
    $sql = "INSERT INTO history_results (participant_name, score) VALUES ('$participant_name', $score)";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='result'>Thank you, $participant_name! Your score is: $score out of 20.</div>";
    } else {
        echo "<div class='result'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Display all results
$result_query = "SELECT participant_name, score FROM history_results ORDER BY score DESC";
$result_set = $conn->query($result_query);

if ($result_set->num_rows > 0) {
    echo "<h2>All Results:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Participant Name</th><th>Score</th></tr>";
    while ($row = $result_set->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row['participant_name']) . "</td><td>" . htmlspecialchars($row['score']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<div>No results found.</div>";
}

// Close the database connection
$conn->close();
?>

</body>
</html>
