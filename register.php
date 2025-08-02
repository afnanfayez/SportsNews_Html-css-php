<?php
session_start();
require_once 'news-site/db.php'; 

$register_error = '';
$register_success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';


    if (empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        $register_error = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $register_error = "Please enter a valid email address.";
    } elseif ($password !== $confirm_password) {
        $register_error = "Passwords do not match.";
    } else {
 
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $register_error = "Username or email already exists.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

       
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password_hash);

            if ($stmt->execute()) {
                $register_success = "Registration successful. You can now <a href='login.php'>log in</a>.";
            } else {
                $register_error = "Error registering user. Please try again.";
            }
        }
        $stmt->close();
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - Sports News</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap"
    rel="stylesheet">

</head>
<body>

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
        <li class="nav_item"><a href="index.php" class="nav_link link_active">Home</a></li>

        <li class="nav_item dropdown">
          <a href="category.php" class="nav_link">Category ▾</a>
              <ul class="dropdown_menu">
            <li><a href="category.php">Sports</a></li>
            <li><a href="category.php">Politecs</a></li>
            <li><a href="category.php">Technology</a></li>
          </ul>
        </li>

        <li class="nav_item"><a href="about.php" class="nav_link">About Us</a></li>
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


  <?php include 'includes/header.php'; ?>

  <div class="register-container">
    <h2>Create Account</h2>

    <?php if ($register_error): ?>
      <div class="error"><?= htmlspecialchars($register_error) ?></div>
    <?php elseif ($register_success): ?>
      <div class="success"><?= $register_success ?></div>
    <?php endif; ?>

   <form method="POST" action="register.php" autocomplete="off">
  <input type="email" name="email" placeholder="Email Address" required>
  <input type="text" name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required>
  <input type="password" name="confirm_password" placeholder="Confirm Password" required>
  <button type="submit">Sign Up</button>
</form>

  </div>

</body>
</html>


