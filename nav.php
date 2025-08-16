<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iconic Tab Bar - Pure CSS</title>
  <style>
    html {
      scroll-behavior: smooth;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: white; /* خلفية بيضاء للجسم */
      color: #4E4A4A; /* لون النص */
      font-size: 24px;
      height: 100vh;
      display: flex;
      flex-direction: column; /* Stack the nav and sections */
    }

    nav {
      position: fixed;
      top: 0;
      background-color: #F6F4F1; /* لون خلفية شريط التنقل */
      width: 100vw;
      z-index: 10; /* Keep nav on top */
    }

    nav ul {
      display: flex;
      list-style: none;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
      justify-content: center;
    }

    nav ul li {
      position: relative;
      padding: 20px;
      cursor: pointer;
      transition: .5s;
    }

    nav ul li a {
      text-decoration: none;
      color: #4E4A4A; /* لون النص */
    }

    nav ul li:hover {
      color: #3A6EA5; /* لون النص عند التمرير */
    }

    nav ul li:before,
    nav ul li:after {
      content: '';
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      background: #3A6EA5; /* اللون الأزرق لتأثير التمرير */
      z-index: -1;
      transform: scaleY(0);
      transform-origin: bottom;
      transition: transform .5s;
    }

    nav ul li:after {
      z-index: -2;
      filter: blur(20px);
    }

    nav ul li:hover:before,
    nav ul li:hover:after {
      transform: scaleY(1);
      transition-origin: top;
    }

    .container {
      margin-top: 70px; /* Space for fixed nav */
    }

    section {
      background-color: white; /* خلفية بيضاء للأقسام */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    section:nth-child(odd) {
      background: white; /* التأكد من أن الأقسام الفردية بيضاء أيضًا */
    }

    @media all and (max-width: 500px) {
      body {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    ::selection {
      background-color: #9400d3;
    }

    ::-webkit-scrollbar {
      width: 20px;
    }

    ::-webkit-scrollbar-track {
      background: linear-gradient(white, #9400d3);
    }

    ::-webkit-scrollbar-thumb {
      background: transparent;
      box-shadow: 0px 0px 0px 100000vh black;
    }
  </style>
</head>
<body>
  <div>
    <nav class="navbar navbar-expand-lg">
      <ul>
        <li><a href='http://localhost/%D8%A7%D8%B9%D8%AA%D9%85%D8%A7%D8%AF/home.php'>Home</a></li>
        <li><a href='http://localhost/%D8%A7%D8%B9%D8%AA%D9%85%D8%A7%D8%AF/form1.php'>Sign In</a></li>
        <li><a href='http://localhost/%d8%a7%d8%b9%d8%aa%d9%85%d8%a7%d8%af/Competitions.php'>Competitions</a></li>
      </ul>
    </nav>
  </div>
  
  <div class="container">
    <section id="sec2"></section> <!-- Removed data-text -->
    <section id="sec3"></section> <!-- Removed data-text -->
    <section id="sec4"></section> <!-- Removed data-text -->
  </div>
  
</body>
</html>
