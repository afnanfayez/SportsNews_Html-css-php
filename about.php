<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - Sports News</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
  <style>

    .about-container {
      max-width: 1000px;
      margin: 12rem auto;
      padding: 40px;
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    .check-icon {
  color: #28a745; 
  margin-right: 8px;
  font-size: 18px;
}


    .about-container h2 {
      font-size: 36px;
      color: #1e1e1e;
      margin-bottom: 20px;
      border-bottom: 2px solid #848383ff;
      display: inline-block;
      padding-bottom: 5px;
    }

    .about-container h3 {
      margin-top: 30px;
      font-size: 24px;
      color:#848383ff;
    }

    .about-container p {
      font-size: 18px;
      color: #444;
      line-height: 1.8;
      margin-bottom: 20px;
    }

    .highlight {
      color: #848383ff;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- Header -->
<header>
  
  <nav class="nav">
    <div class="container nav_header">
      <a href="#" class="logo">
        <img src="images/Sports.jpeg" alt="">
        <h2>Sports News</h2>
      </a>

      <input type="checkbox" id="menu-toggle" class="menu-toggle" />
      <label for="menu-toggle" class="menu-icon">&#9776;</label>

      <ul class="nav_list">
        <li class="nav_item"><a href="index.php" class="nav_link ">Home</a></li>

 <li class="nav_item dropdown">
  <a href="#" class="nav_link">Category ▾</a>
  <ul class="dropdown_menu">
    <li><a href="category.php?query=Sports">Sports</a></li>
    <li><a href="category.php?query=Politics">Politics</a></li>
    <li><a href="category.php?query=Technology">Technology</a></li>
  </ul>
</li>


        <li class="nav_item"><a href="about.php" class="nav_link link_active">About Us</a></li>
        <li class="nav_item"><a href="contact.php" class="nav_link">Contact</a></li>

        <li class="nav_item nav_buttons">
          <form action="search.php" method="GET" class="search-form">
            <input type="text" name="query" placeholder="Search news..." class="search-input" required>
            <button type="submit" class="search-btn">
              <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            </button>
          </form>
          <button><a href="login.php" class="btn">Login</a></button>
          <button><a href="register.php" class="btn">Sign Up</a></button>
        </li>
      </ul>

      <div class="header-right">
        <form action="search.php" method="GET" class="search-form">
          <input type="text" name="query" placeholder="Search news..." class="search-input" required>
          <button type="submit" class="search-btn">
            <span class="search-icon">🔍</span>
          </button>
        </form>
        <a href="login.php" class="btn">Login</a>
        <a href="register.php" class="btn">Sign Up</a>
      </div>

    </div>
  </nav>
</header>



<div class="about-container">
  <h2>About Sports News</h2>

  <p>
    Welcome to <span class="highlight">Sports News</span>, the home of passionate reporting and exciting coverage from the world of sports.
    Our platform is designed for every sports lover who wants to stay updated with real-time news, insightful articles, match analysis, and behind-the-scenes stories from all over the globe.
  </p>

  <p>
    We cover a wide range of sports, including football, basketball, tennis, athletics, motorsports, and more. Whether it's a heated match in the Premier League, a Grand Slam final, or breaking news in the Olympics — we’ve got you covered!
  </p>

  <h3>Our Mission</h3>
  <p>
    At <span class="highlight">Sports News</span>, our mission is simple: to deliver accurate, fast, and inspiring sports news to a global audience. We believe sports are more than just games — they are stories of passion, perseverance, and greatness. We aim to bring those stories to you in the most engaging and human way possible.
  </p>

  <h3>What Makes Us Different?</h3>
 <p><i class="fa-solid fa-square-check check-icon"></i> <strong>Real-Time Updates:</strong> Our team works around the clock to provide live scores, breaking news, and timely updates.</p>
<p><i class="fa-solid fa-square-check check-icon"></i> <strong>Original Content:</strong> We produce well-researched, opinionated, and thought-provoking articles.</p>
<p><i class="fa-solid fa-square-check check-icon"></i> <strong>Fan-Centered Approach:</strong> Our platform is made for the fans, by fans. We understand what matters most to you.</p>
<p><i class="fa-solid fa-square-check check-icon"></i> <strong>Clean & Responsive Design:</strong> Enjoy reading on any device with a seamless user experience.</p>


  <h3>Meet Our Team</h3>
  <p>
    We are a team of sports journalists, analysts, developers, and creatives who live and breathe sports. With a shared vision to inspire and inform, each member of our team brings a unique voice to the content you enjoy every day.
  </p>

  <h3>Join Our Community</h3>
  <p>
    <span class="highlight">Sports News</span> is more than a website — it’s a community of sports lovers who believe in celebrating athletic achievement. We invite you to connect with us on social media, share your thoughts in the comments, and become part of this exciting journey.
  </p>

  <p>
    Thank you for visiting <span class="highlight">Sports News</span>. We’re excited to have you with us!
  </p>
</div>


  <!-- Footer  -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-logo">
        <h2><span>Sports</span> News</h2>
        <p>A game changer</p>
        <p class="p2">&copy; 2025 Wisesport. All rights reserved</p>
      </div>
      <div class="columns">
        <div class="footer-column">
          <h3>SPORTS NEWS</h3>
          <p class="p1">Wisesport is an official trademark of Wisehockey Ltd.</p>
        </div>

        <div class="footer-column">
          <h3>ANALYTICS</h3>
          <a href="#">Features</a>
          <a href="#">Services</a>
          <a href="#">Wisehockey</a>
        </div>


        <div class="footer-column">
          <h3>RESOURCES</h3>
          <a href="#">News</a>
          <a href="#">Data protection</a>
          <a href="#">Invoicing</a>
        </div>

        <div class="footer-right">
          <ul class="footer-menu">
            <li><a href="index.php">HOME</a></li>
            <li><a href="category.php?query=Sports">CATEGORY</a></li>
            <li><a href="#">SERVICES</a></li>
            <li><a href="#">FEATURES</a></li>
             <li><a href="about.php">ABOUTUS</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>

          <div class="footer-social">
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
