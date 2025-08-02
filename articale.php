<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'news-site/db.php';

if (!isset($conn) || $conn->connect_error) {
    $host = 'localhost';
    $db = 'news_db';
    $user = 'root'; 
    $pass = '';  

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

$comments = [];
$article_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$error_message = "";
$article = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $username_post = isset($_POST['username']) ? trim($_POST['username']) : '';
    $comment_post = isset($_POST['comment_text']) ? trim($_POST['comment_text']) : '';
    $article_id_post = $article_id;

    if (!empty($username_post) && !empty($comment_post)) {
      
        $stmt_user = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
        $stmt_user->bind_param("s", $username_post);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();

        if ($result_user->num_rows > 0) {
            
            $user = $result_user->fetch_assoc();
            $user_id = $user['user_id'];
            $stmt_user->close();
        } else {
            
            $stmt_user->close();
            $stmt_insert_user = $conn->prepare("INSERT INTO users (username) VALUES (?)");
            $stmt_insert_user->bind_param("s", $username_post);
            $stmt_insert_user->execute();
            $user_id = $stmt_insert_user->insert_id;
            $stmt_insert_user->close();
        }

     
        $stmt_insert = $conn->prepare("INSERT INTO comments (article_id, user_id, comment_text) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("iis", $article_id_post, $user_id, $comment_post);

        if ($stmt_insert->execute()) {
            $stmt_insert->close();
         
          header("Location:articale.php?id=" . $article_id_post);
        exit;
        } else {
            $error_message = "Error saving comment: " . htmlspecialchars($stmt_insert->error);
        }
    } else {
        $error_message = "Please fill in both your name and comment.";
    }
}

if ($article_id > 0) {
    $sql = "SELECT a.article_id, a.title, a.content, a.image_url, a.published_date, u.username AS author_name 
            FROM articles AS a
            JOIN users AS u ON a.author_id = u.user_id
            WHERE a.article_id = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $article_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $article = $result->fetch_assoc();

            $title = $article['title'];
            $content = $article['content'];
            $image_url = $article['image_url'];
            $author_name = $article['author_name'];

            $published_date_obj = new DateTime($article['published_date']);
            $formatted_date = $published_date_obj->format('F j, Y');
        } else {
            $error_message = "Article not found.";
        }
        $stmt->close();
    } else {
        $error_message = "Database query preparation failed: " . $conn->error;
    }


    $stmt_comments = $conn->prepare("
        SELECT u.username, c.comment_text, c.timestamp 
        FROM comments c
        JOIN users u ON c.user_id = u.user_id
        WHERE c.article_id = ?
        ORDER BY c.timestamp DESC
    ");

    if ($stmt_comments) {
        $stmt_comments->bind_param("i", $article_id);
        $stmt_comments->execute();
        $result_comments = $stmt_comments->get_result();
        $comments = $result_comments->fetch_all(MYSQLI_ASSOC);
        $stmt_comments->close();
    }
} else {
    $error_message = "No valid article ID specified.";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/all.css"> 
    <title><?php echo isset($title) && !empty($title) ? $title : 'Article'; ?> - Sports News</title>

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
  <a href="#" class="nav_link">Category ▾</a>
  <ul class="dropdown_menu">
    <li><a href="category.php?query=Sports">Sports</a></li>
    <li><a href="category.php?query=Politics">Politics</a></li>
    <li><a href="category.php?query=Technology">Technology</a></li>
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
<!-- Main -->
    <main>
        <div class="content_Home">

   <!-- Articale/Left Side -->
            <div class="home_left">
<article class="section">
    <div class="article-container">
        <?php if ($article): ?>
            <h1 class="article-title"><?php echo htmlspecialchars($title); ?></h1>
            <hr class="divider">

            <div class="article-meta-bar">
                <div class="listen">
                    <i class="fa-solid fa-play"></i>
                    <span>Listen to this article · <strong>6:59 min</strong></span>
                    <a href="#" class="learn-more-link">Learn more</a>
                </div>

                <div class="share-buttons">
                    <button title="Share"><i class="fa-solid fa-gift"></i></button>
                    <button title="Share"><i class="fa-solid fa-arrow-up-right-from-square"></i></button>
                    <button title="Bookmark"><i class="fa-regular fa-bookmark"></i></button>
                </div>
            </div>

            <?php 
            if (!empty($image_url)) {
                $safe_image_url = htmlspecialchars($image_url);
                $safe_title = htmlspecialchars($title);
                echo "<img src='$safe_image_url' alt='$safe_title' class='article-image' />";
            } else {
                $safe_title = htmlspecialchars($title);
                echo "<img src='images/default_article.png' alt='$safe_title' class='article-image' />";
            }
            ?>

            <div class="article-author">
                <img src="images/artical2 .png" alt="Author">
                <div>
                    <p class="article-author-name">By <span class="author-name-highlight">Marlin Jakkey</span></p>
                    <p class="article-author-date"><?php echo htmlspecialchars($formatted_date); ?></p>
                </div>
            </div>

            <div class="article-paragraph">
                <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
            </div>
        <?php else: ?>
            <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
    </div>
<!-- Comments Section -->
<div class="comments-section">
    <h2 class="comments-title">Comments</h2>

    <?php if (!empty($comments)): ?>
        <?php foreach ($comments as $row): ?>
            <div class="comment">
                <div class="comment-header">
                    <strong><?php echo htmlspecialchars($row['username']); ?></strong>
                    <span class="comment-date"><?php echo date('F j, Y, g:i a', strtotime($row['timestamp'])); ?></span>
                </div>
                <p class="comment-text"><?php echo nl2br(htmlspecialchars($row['comment_text'])); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-comments">No comments yet. Be the first to comment!</p>
    <?php endif; ?>

    <form method="post" class="comment-form">
        <h3 class="form-title">Add a Comment</h3>
        <?php if (!empty($error_message)): ?>
            <p class="comment-error"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        
        <input type="text" name="username" placeholder="Enter your username" required>
        <textarea name="comment_text" rows="4" placeholder="Write your comment..." required></textarea>
        <button type="submit" name="submit_comment">Submit</button>
    </form>
</div>

    
</article>

</div>

    
     
    <!-- aside -->

            <aside class="section" >
                <section class="trending-news">
                    <div class="trending_news">
                        <h2 class="trending_title">Trending News</h2>
                        <div class="trending_news_card_s">
                            <img src="images/tr1.jpeg" alt="Trending News Image 1" class="trending_news_s_img">
                            <div class="trending_news_s_content">
                                <p class="trending_news_s_date">Race98 - 03 June 2023</p>
                                <h3 class="trending_news_s_title">6-Years_Old Horse Dies at Belmont Park After Race Injury </h3>
                                <p class="trending_news_s_text">
                                    Tragedy strikes at Belmont Park as a young racehorse suffers a fatal injury during the final
                                    lap.
                                </p>
                            </div>
                        </div>
                        <div class="trending_news_card_s">
                            <img src="images/tr2.jpeg" alt="Trending News Image 2" class="trending_news_s_img">
                            <div class="trending_news_s_content">
                                <p class="trending_news_s_date">Cycling Weekly - 04 June 2023</p>
                                <h3 class="trending_news_s_title">Epic Sprint Finish Seals Victory at Tour de France Stage 5
                                </h3>
                                <p class="trending_news_s_text">
                                    A thrilling sprint finish saw Dutch cyclist Lars van Dijk take the lead in Stage 5 of the
                                    Tour de France.
                                </p>
                            </div>
                        </div>
                        <div class="trending_news_card_s">
                            <img src="images/tr3.jpeg" alt="Trending News Image 3" class="trending_news_s_img">
                            <div class="trending_news_s_content">
                                <p class="trending_news_s_date">WrestleWorld - 05 June 2023</p>
                                <h3 class="trending_news_s_title">Underdog Wins National Wrestling Title in Stunning Comeback
                                </h3>
                                <p class="trending_news_s_text">
                                    In a dramatic final match, 21-year-old Carlos Mendoza overcame a 10-point deficit to claim
                                    the national wrestling championship title .
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="advertisement">
                    <h2 class="trending_title">Advertisement</h2>
                    <div class="trending_news_card_s">
                        <img src="images/lg.jpeg" alt="Ad Banner" class="trending_news_s_img">
                        <div class="trending_news_s_content">
                            <h3 class="trending_news_s_title">DISCOVER THE MEMBER BENEFITS OF USA CYCLING</h3>
                            <p class="trending_news_s_text">
                                Exclusive offers, race access, training plans, and more — join USA Cycling today and take your
                                performance to the next level.
                            </p>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
   
    </main>

<!-- footer -->
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
