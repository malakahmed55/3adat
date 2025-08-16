<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قصتي</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color:  white;

        }

        .image-container {
            text-align: center;
        }

        img {
            width: 100%;
            height: 500px;
        }

        .button {
            height: 55px;
            
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

.button:hover {
    background: #2a537f; /* Darker shade on hover */

}

        .top-bar {
            display: flex;
            justify-content: center;
        }

        .top-bar h1, .top-bar button {
            display: inline-block;
            margin: 0 10px; /* Adjust the margin as needed */
        }
    </style>
</head>
<body>
    <div class="image-container">
        <img src="53fb7a2ca4434321b9137308.jpeg" alt="صورة للبطلة">
        <div class="top-bar">
            <h1>Hello, I'm John. Would you like to continue the story with me or Emily?</h1>
            <button class="button" onclick="showButtons()">choose</button>
        </div>
    </div>

    <div id="buttons" style="display: none;">
        <button class="button" onclick="location.href='joun.php'">Joun</button>
        <button class="button" onclick="location.href='Emily.php'">Emily</button>
    </div>

    <script>
        function showButtons() {
            document.getElementById("buttons").style.display = "block";
        }
    </script>
</body>
</html>