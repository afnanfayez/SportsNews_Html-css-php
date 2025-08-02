<?php
include 'news-site/db.php';

$search = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($search)) {
    header("Location: index.php");
    exit;
}

$search_safe = $conn->real_escape_string($search);

$sql_category = "SELECT category_id, category_name FROM categories WHERE category_name LIKE ?";
$stmt = $conn->prepare($sql_category);
$search_param = "%$search_safe%";
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result_cat = $stmt->get_result();

$articles = [];
$category_name = "";

if ($result_cat->num_rows === 1) {
    $category = $result_cat->fetch_assoc();
    $category_id = $category['category_id'];
    $category_name = $category['category_name'];

    $sql_articles = "SELECT a.article_id, a.title, a.image_url, a.published_date, u.username AS author 
                     FROM articles a 
                     JOIN users u ON a.author_id = u.user_id
                     WHERE a.category_id = ?
                     ORDER BY a.published_date DESC";

    $stmt_articles = $conn->prepare($sql_articles);
    $stmt_articles->bind_param("i", $category_id);
    $stmt_articles->execute();
    $result_articles = $stmt_articles->get_result();

    while ($row = $result_articles->fetch_assoc()) {
        $articles[] = $row;
    }

    $stmt_articles->close();

} elseif ($result_cat->num_rows > 1) {
    $multiple_matches = true;
} else {
    $not_found = true;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results - Sports News</title>
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
      <li class="nav_item"><a href="index.php" class="nav_link">Home</a></li>

<li class="nav_item dropdown">
  <a href="category.php" class="nav_link link_active">Category ▾</a>
  <ul class="dropdown_menu">
    <li><a href="category.php?query=Sports">Sports</a></li>
    <li><a href="category.php?query=Politics">Politics</a></li>
    <li><a href="category.php?query=Technology">Technology</a></li>
  </ul>
</li>

        <li class="nav_item"><a href="about.php" class="nav_link">About Us</a></li>
        <li class="nav_item"><a href="#" class="nav_link">Contact</a></li>

        <li class="nav_item nav_buttons">
          <form action="search.php" method="GET" class="search-form">
            <input type="text" name="query" placeholder="Search news..." class="search-input" required>
            <button type="submit" class="search-btn">
              <span class="search-icon">🔍</span>
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
<main class="results-section">
    <?php if (isset($not_found)): ?>
        <h2>No category found for "<?php echo htmlspecialchars($search); ?>"</h2>
    <?php elseif (isset($multiple_matches)): ?>
        <h2>Multiple categories matched "<?php echo htmlspecialchars($search); ?>", please refine your search:</h2>
        <ul>
            <?php while ($cat = $result_cat->fetch_assoc()): ?>
                <li><a href="category.php?category=<?php echo urlencode($cat['category_name']); ?>">
                    <?php echo htmlspecialchars($cat['category_name']); ?>
                </a></li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <h2>Articles in "<?php echo htmlspecialchars($category_name); ?>"</h2>

        <?php if (count($articles) > 0): ?>
            <div class="article-grid">
                <?php foreach ($articles as $article): ?>
                    <a href="articale.php?id=<?php echo $article['article_id']; ?>" class="article-card" style="display: block; color: inherit; text-decoration: none;">
                        <img src="<?php echo htmlspecialchars($article['image_url']); ?>" alt="Article Image">
                        <div class="article-card-content">
                            <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                            <p>By <?php echo htmlspecialchars($article['author']); ?> · <?php echo date("F j, Y", strtotime($article['published_date'])); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No articles found under this category.</p>
        <?php endif; ?>
    <?php endif; ?>
</main>

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
