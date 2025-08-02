<?php

session_start();
require_once 'news-site/db.php';

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $login_error = 'Please enter both username and password.';
    } else {
        $stmt = $conn->prepare("SELECT user_id, username, password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            if (password_verify($password, $user['password']) || $password === $user['password']) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] === 'admin') {
                    header('Location: Admin_DashBoard/admin.php');
                } else {
                    header('Location: index.php');
                }
                exit;
            } else {
                $login_error = 'Invalid username or password.';
            }
        } else {
            $login_error = 'Invalid username or password.';
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sport News</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.css">
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
<!-- Login -->
 <div class="login-container section">
    <h2>Login</h2>
    <?php if (!empty($login_error)): ?>
      <div class="error"><?= htmlspecialchars($login_error) ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST" autocomplete="off">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Log In</button>
    </form>
</div>

</body>
</html>
