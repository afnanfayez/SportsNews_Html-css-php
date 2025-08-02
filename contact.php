<?php
require_once 'news-site/db.php';

$name = $email = $subject = $message = '';
$success_msg = '';
$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!$name || !$email || !$subject || !$message) {
        $error_msg = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Please enter a valid email address.";
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $subject, $message);
            $stmt->execute();
            $success_msg = "Your message has been sent successfully!";
            $name = $email = $subject = $message = '';
        } catch (Exception $e) {
            $error_msg = "Failed to send your message. Please try again later.";
        }
    }
}

?>

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
 
 .contact-container {
  max-width: 600px;
  margin: 12rem auto 80px;
  padding: 40px 35px;
  background-color: #f9f9f9;
  border-radius: 14px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
  font-family: 'Ubuntu', sans-serif;
  color: #333;
}

.contact-container h2 {
  font-size: 32px;
  font-weight: 700;
  color: #444;
  margin-bottom: 30px;
  border-bottom: 3px solid #888;
  padding-bottom: 10px;
  text-align: center;
}

. .contact-container .success-msg,
 .contact-container .error-msg {
  padding: 12px 20px;
  margin-bottom: 25px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 16px;
  text-align: center;
}

 .contact-container .success-msg {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
}

 .contact-container .error-msg {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}

 .contact-container form label {
  display: block;
  font-weight: 600;
  margin-bottom: 8px;
  color: #555;
  margin-top: 18px;
}

.contact-container form input[type="text"],
.contact-container form input[type="email"],
.contact-container form textarea {
  width: 100%;
  padding: 12px 14px;
  border: 1.8px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  color: #444;
  resize: vertical;
  transition: border-color 0.3s ease;
}


 .contact-container form input[type="text"]:focus,
 .contact-container form input[type="email"]:focus,
 .contact-container form textarea:focus {
  outline: none;
  border-color: #6d6e6fff;
  box-shadow: 0 0 6px rgba(92, 157, 237, 0.5);
}

 .contact-container form textarea {
  min-height: 120px;
}

 .contact-container form button[type="submit"] {
  margin-top: 30px;
  width: 100%;
  background-color: #696b6eff;
  color: #fff;
  font-size: 18px;
  font-weight: 700;
  padding: 15px 0;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

 .contact-container form button[type="submit"]:hover {
  background-color: #838383ff;
}


@media (max-width: 480px) {
  .contact-container {
    margin: 40px 15px 60px;
    padding: 30px 20px;
  }

  .contact-container h2 {
    font-size: 26px;
  }

  .contact-container form input[type="text"],
  .contact-container form input[type="email"],
  .contact-container form textarea {
    font-size: 14px;
  }

   .contact-containerform button[type="submit"] {
    font-size: 16px;
    padding: 12px 0;
  }
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
        <li class="nav_item"><a href="index.php" class="nav_link">Home</a></li>

 <li class="nav_item dropdown">
  <a href="#" class="nav_link">Category ▾</a>
  <ul class="dropdown_menu">
    <li><a href="category.php?query=Sports">Sports</a></li>
    <li><a href="category.php?query=Politics">Politics</a></li>
    <li><a href="category.php?query=Technology">Technology</a></li>
  </ul>
</li>


        <li class="nav_item"><a href="about.php" class="nav_link">About Us</a></li>
        <li class="nav_item"><a href="contact.php" class="nav_link  link_active">Contact</a></li>

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


  <div class="contact-container">
    <h2>Contact Us</h2>

    <?php if ($success_msg): ?>
      <div class="success-msg"><?= htmlspecialchars($success_msg) ?></div>
    <?php endif; ?>

    <?php if ($error_msg): ?>
      <div class="error-msg"><?= htmlspecialchars($error_msg) ?></div>
    <?php endif; ?>

    <form action="" method="POST" novalidate>
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Your full name" required value="<?= htmlspecialchars($name) ?>" />

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="Your email address" required value="<?= htmlspecialchars($email) ?>" />

      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" placeholder="Subject" required value="<?= htmlspecialchars($subject) ?>" />

      <label for="message">Message</label>
      <textarea id="message" name="message" placeholder="Write your message here..." required><?= htmlspecialchars($message) ?></textarea>

      <button type="submit">Send Message</button>
    </form>
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
