<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Competition</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: white; /* لون الخلفية */
            color: #4E4A4A; /* لون النص */
        }
        h1 {
            margin-top: 20px;
            color: #FFF; /* لون العنوان */
        }
        .card {
            background-color: #F6F4F1; /* لون خلفية البطاقة */
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-weight: bold;
            color: #3A6EA5; /* لون النص في عنوان البطاقة */
        }
        .card-text {
            color: #333; /* لون النص في وصف البطاقة */
        }
        .card img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        a{
    position: relative;
    display: inline-block;
    padding: 25px 30px;
    margin: 40px 0;
    color: #000;
    text-decoration: none;
    text-transform: uppercase;
    transition: 0.5s;
    letter-spacing: 4px;
    overflow: hidden;
    margin-right: 50px;
   
}
a:hover{
    background: #3A6EA5;
    color: #050801;
    box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 200px #03e9f4;
     -webkit-box-reflect:below 1px linear-gradient(transparent, #0005);
}
a:nth-child(1){
    filter: hue-rotate(270deg);
}
a:nth-child(2){
    filter: hue-rotate(110deg);
}
a span{
    position: absolute;
    display: block;
}
a span:nth-child(1){
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg,transparent,#03e9f4);
    animation: animate1 1s linear infinite;
}
@keyframes animate1{
    0%{
        left: -100%;
    }
    50%,100%{
        left: 100%;
    }
}
a span:nth-child(2){
    top: -100%;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg,transparent,#03e9f4);
    animation: animate2 1s linear infinite;
    animation-delay: 0.25s;
}
@keyframes animate2{
    0%{
        top: -100%;
    }
    50%,100%{
        top: 100%;
    }
}
a span:nth-child(3){
    bottom: 0;
    right: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(270deg,transparent,#03e9f4);
    animation: animate3 1s linear infinite;
    animation-delay: 0.50s;
}
@keyframes animate3{
    0%{
        right: -100%;
    }
    50%,100%{
        right: 100%;
    }
}


a span:nth-child(4){
    bottom: -100%;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(360deg,transparent,#03e9f4);
    animation: animate4 1s linear infinite;
    animation-delay: 0.75s;
}
@keyframes animate4{
    0%{
        bottom: -100%;
    }
    50%,100%{
        bottom: 100%;
    }
}
        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
    </style>
</head>
<body>
    <?php
    ?>
    <div class="container">
        <!-- المسابقة الأولى -->
        <div class="card" style="width: 18rem;">
            <img src="math.jpeg" class="card-img-top" alt="Math Image">
            <div class="card-body">
                <h5 class="card-title">Math 🤓</h5>
                <p class="card-text">Test your love and intelligence in math with these challenging questions.</p>
                <a href="math1.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Let's go
    </a>

            </div>
        </div>

        <!-- المسابقة الثانية -->
        <div class="card" style="width: 18rem;">
            <img src="programming.jpeg" class="card-img-top" alt="Programming Image">
            <div class="card-body">
                <h5 class="card-title">Programming 💻</h5>
                <p class="card-text">Think you can't be defeated in programming? Let's see your skills!</p>
                <a href="programming.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Let's go
    </a>

            </div>
        </div>

        <!-- المسابقة الثالثة -->
        <div class="card" style="width: 18rem;">
            <img src="info.jpeg" class="card-img-top" alt="General Information Image">
            <div class="card-body">
                <h5 class="card-title">General Information 📚📝</h5>
                <p class="card-text">Do you have enough knowledge to take on the challenge? Prove it to us! 🤭</p>
                <a href="information.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Let's go
    </a>

            </div>
        </div>

        <!-- المسابقة الرابعة -->
        <div class="card" style="width: 18rem;">
            <img src="history.jpeg" class="card-img-top" alt="History Image">
            <div class="card-body">
                <h5 class="card-title">History 📜⚔️</h5>
                <p class="card-text">A random test in history, wars, and invasions. Are you ready? ⚔️</p>
                <a href="history.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Let's go
    </a>

            </div>
        </div>

        <!-- المسابقة الخامسة -->
        <div class="card" style="width: 18rem;">
            <img src="isef.jpeg" class="card-img-top" alt="Entrepreneurship Image">
            <div class="card-body">
                <h5 class="card-title">Entrepreneurship 🤵‍♂️</h5>
                <p class="card-text">Are you an entrepreneur? Test your skills and develop your abilities 😍</p>
                <a href="Entrepreneurship.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Let's go
    </a>

            </div>
</body>
</html>
