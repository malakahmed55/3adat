<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrepreneurship Quiz</title>
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
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #B0AFAE;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #3A6EA5;
            color: #FFFFFF;
        }
    </style>
</head>
<body>

<div class="container">
    <header>Entrepreneurship Quiz</header>
    <form method="post">
        <label for="username">Enter your username:</label>
        <input type="text" id="username" name="username" required>

        <p>1. Who is the founder of Amazon?</p>
        <select name="q1">
            <option value="Jeff Bezos">Jeff Bezos</option>
            <option value="Elon Musk">Elon Musk</option>
            <option value="Bill Gates">Bill Gates</option>
            <option value="Larry Page">Larry Page</option>
        </select>
        
        <p>2. What does MVP stand for in entrepreneurship?</p>
        <select name="q2">
            <option value="Minimum Viable Product">Minimum Viable Product</option>
            <option value="Most Valuable Product">Most Valuable Product</option>
            <option value="Market Viability Plan">Market Viability Plan</option>
            <option value="Monetary Value Projection">Monetary Value Projection</option>
        </select>
        
        <p>3. What year was Apple founded?</p>
        <select name="q3">
            <option value="1976">1976</option>
            <option value="1980">1980</option>
            <option value="1972">1972</option>
            <option value="1984">1984</option>
        </select>

        <p>4. Who is the CEO of Tesla?</p>
        <select name="q4">
            <option value="Elon Musk">Elon Musk</option>
            <option value="Jeff Bezos">Jeff Bezos</option>
            <option value="Steve Jobs">Steve Jobs</option>
            <option value="Mark Zuckerberg">Mark Zuckerberg</option>
        </select>

        <p>5. What is the name of the startup incubator founded by Paul Graham?</p>
        <select name="q5">
            <option value="Y Combinator">Y Combinator</option>
            <option value="500 Startups">500 Startups</option>
            <option value="TechStars">TechStars</option>
            <option value="Seedcamp">Seedcamp</option>
        </select>

        <p>6. What does the term "bootstrapping" mean in a startup context?</p>
        <select name="q6">
            <option value="Starting a business with minimal resources">Starting a business with minimal resources</option>
            <option value="Using venture capital to scale rapidly">Using venture capital to scale rapidly</option>
            <option value="Hiring without raising funds">Hiring without raising funds</option>
            <option value="Filing for bankruptcy">Filing for bankruptcy</option>
        </select>

        <p>7. Who is the founder of Facebook?</p>
        <select name="q7">
            <option value="Mark Zuckerberg">Mark Zuckerberg</option>
            <option value="Elon Musk">Elon Musk</option>
            <option value="Bill Gates">Bill Gates</option>
            <option value="Larry Page">Larry Page</option>
        </select>

        <p>8. In which year did Google launch?</p>
        <select name="q8">
            <option value="1998">1998</option>
            <option value="2000">2000</option>
            <option value="1995">1995</option>
            <option value="2005">2005</option>
        </select>

        <p>9. What is a business plan?</p>
        <select name="q9">
            <option value="A document that outlines a company's goals and strategies">A document that outlines a company's goals and strategies</option>
            <option value="A plan to hire employees">A plan to hire employees</option>
            <option value="A financial report for investors">A financial report for investors</option>
            <option value="An operational checklist for day-to-day work">An operational checklist for day-to-day work</option>
        </select>

        <p>10. What is an angel investor?</p>
        <select name="q10">
            <option value="An investor who provides capital for a startup in exchange for ownership equity">An investor who provides capital for a startup in exchange for ownership equity</option>
            <option value="A large venture capital firm">A large venture capital firm</option>
            <option value="A bank that gives loans to startups">A bank that gives loans to startups</option>
            <option value="An investor who expects no returns">An investor who expects no returns</option>
        </select>

        <p>11. Who is the co-founder of Microsoft alongside Bill Gates?</p>
        <select name="q11">
            <option value="Paul Allen">Paul Allen</option>
            <option value="Steve Ballmer">Steve Ballmer</option>
            <option value="Jeff Bezos">Jeff Bezos</option>
            <option value="Tim Cook">Tim Cook</option>
        </select>

        <p>12. What is a pitch deck?</p>
        <select name="q12">
            <option value="A presentation used to pitch a business idea to investors">A presentation used to pitch a business idea to investors</option>
            <option value="A financial statement for startups">A financial statement for startups</option>
            <option value="A list of potential employees">A list of potential employees</option>
            <option value="A contract with a VC firm">A contract with a VC firm</option>
        </select>

        <p>13. What is the term for a company's first round of funding?</p>
        <select name="q13">
            <option value="Seed funding">Seed funding</option>
            <option value="Series A">Series A</option>
            <option value="IPO">IPO</option>
            <option value="Angel round">Angel round</option>
        </select>

        <p>14. What is the name of the stock exchange where most tech companies are listed?</p>
        <select name="q14">
            <option value="NASDAQ">NASDAQ</option>
            <option value="NYSE">NYSE</option>
            <option value="London Stock Exchange">London Stock Exchange</option>
            <option value="Tokyo Stock Exchange">Tokyo Stock Exchange</option>
        </select>

        <p>15. Who is the founder of SpaceX?</p>
        <select name="q15">
            <option value="Elon Musk">Elon Musk</option>
            <option value="Jeff Bezos">Jeff Bezos</option>
            <option value="Richard Branson">Richard Branson</option>
            <option value="Larry Page">Larry Page</option>
        </select>

        <p>16. What is the primary goal of a startup?</p>
        <select name="q16">
            <option value="To grow rapidly and capture market share">To grow rapidly and capture market share</option>
            <option value="To maintain a steady profit">To maintain a steady profit</option>
            <option value="To hire the best talent">To hire the best talent</option>
            <option value="To build a strong brand">To build a strong brand</option>
        </select>

        <p>17. What does it mean to pivot a business model?</p>
        <select name="q17">
            <option value="To change the direction of a startup's business strategy">To change the direction of a startup's business strategy</option>
            <option value="To focus on customer service">To focus on customer service</option>
            <option value="To hire a new CEO">To hire a new CEO</option>
            <option value="To reduce operational costs">To reduce operational costs</option>
        </select>

        <p>18. What is venture capital?</p>
        <select name="q18">
            <option value="Funding provided to startups in exchange for equity">Funding provided to startups in exchange for equity</option>
            <option value="A bank loan for business operations">A bank loan for business operations</option>
            <option value="Personal savings used to start a business">Personal savings used to start a business</option>
            <option value="Government grants for entrepreneurs">Government grants for entrepreneurs</option>
        </select>

        <p>19. What is the purpose of a market analysis?</p>
        <select name="q19">
            <option value="To understand the competitive landscape and target audience">To understand the competitive landscape and target audience</option>
            <option value="To analyze the company's financial statements">To analyze the company's financial statements</option>
            <option value="To find the best employees">To find the best employees</option>
            <option value="To assess the company's operational efficiency">To assess the company's operational efficiency</option>
        </select>

        <p>20. What does it mean to scale a business?</p>
        <select name="q20">
            <option value="To grow a business quickly without a proportional increase in costs">To grow a business quickly without a proportional increase in costs</option>
            <option value="To hire more employees">To hire more employees</option>
            <option value="To open more locations">To open more locations</option>
            <option value="To reduce costs">To reduce costs</option>
        </select>

        <button type="submit" class="btn-custom">Submit</button>
    </form>

    <?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'competitiondb'); // Replace with your DB details

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch participants
$sql = "SELECT username, score, passed FROM entership"; // Ensure the column names match your table
$result = $conn->query($sql);

// Check if query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Username: " . htmlspecialchars($row["username"]) . " - Score: " . htmlspecialchars($row["score"]) . " - Passed: " . ($row["passed"] ? 'Yes' : 'No') . "<br>";
    }
} else {
    echo "0 results"; // If there are no records
}

$conn->close();
?>
    
</div>

</body>
</html>
