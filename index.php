<?php

include 'news-site/db.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
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
  <a href="#" class="nav_link">Category ▾</a>
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
      <div class="home_left">

      <!-- Breaking News Section  -->
<section class="section sec1">
  <h2 class="section_header">Breaking News Section</h2>

  <div class="Breaking_News">

    <article class="artical1">
      <a href="articale.php?id=1">
        <img src="images/BR1.avif" alt="">
      </a>
      <a href="articale.php?id=1" class="artical1_title">
        Sinner banishes Roland Garros<br> demons to de-throne Alcaraz at<br>Wimbledon
      </a>
      <p class="artical1_p1">Tennis · July 13, 2025 · 12 hours ago</p>
      <p class="artical1_p2">While Sunday's duel contained some mind-boggling points, it lacked the twists of
        last month's Roland Garros roller-coaster.</p>
    </article>

    <div class="artical2_wrapper">

      <article class="artical2">
        <a href="articale.php?id=2">
          <img src="images/BR2.avif" alt="">
        </a>
        <p class="artical2_p1">Soccer</p>
        <a href="articale.php?id=2" class="artical2_title">
          Palmer double fires Chelsea past PSG to Club World Cup glory
        </a>
        <p class="artical2_p2">2:51 AM GMT+3</p>
      </article>

      <article class="artical2">
        <a href="articale.php?id=3">
          <img src="images/BR3.avif" alt="">
        </a>
        <p class="artical2_p1">Golf</p>
        <a href="articale.php?id=3" class="artical2_title">
          Chris Gotterup earns second career win with victory at Scottish Open
        </a>
        <p class="artical2_p2">4:57 AM GMT+3</p>
      </article>

    </div>
  </div>
</section>


        <!-- Featured Articles -->
    <section class="section sec2" id="featured-articles">
  <h2 class="section_header">Featured Articles</h2>
<div class="Featured_Articles">

  <article class="artical_day artical">
    <p class="artical1_p11">14</p>
    <p class="artical1_p22">JULY</p>
    <p class="artical1_p3">MONDAY</p>
  </article>

<?php
$limit = 7;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$excluded_ids = "1,2,3,4,5,6,7,8";

$searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

if ($searchTerm !== '') {
    $sql_count = "SELECT COUNT(*) as total FROM articles WHERE (title LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%') AND article_id NOT IN ($excluded_ids)";
    $sql = "SELECT * FROM articles WHERE (title LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%') AND article_id NOT IN ($excluded_ids) ORDER BY published_date DESC LIMIT $limit OFFSET $offset";
} else {
    $sql_count = "SELECT COUNT(*) as total FROM articles WHERE article_id NOT IN ($excluded_ids)";
    $sql = "SELECT * FROM articles WHERE article_id NOT IN ($excluded_ids) ORDER BY published_date DESC LIMIT $limit OFFSET $offset";
}

$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_articles = $row_count['total'];
$total_pages = ceil($total_articles / $limit);

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['article_id'];
        $title = $row['title'];
        $image = $row['image_url'];
        $published_date = strtotime($row['published_date']);
        $hours_ago = floor((time() - $published_date) / 3600);

        echo "
        <article class='artical'>
          <a href='articale.php?id=$id'>
            <img src='$image' alt=''>
            <p class='artical1_p1'>$title</p>
            <p class='artical1_p2'>$hours_ago HOUR" . ($hours_ago > 1 ? "S" : "") . " AGO</p>
          </a>
        </article>
        ";
    }
} else {
    echo "<p>No articles found.</p>";
}

echo '<div class="pagination">';

$anchor = '#featured-articles'; 

if ($page > 1) {
    $prev_page = $page - 1;
    echo '<a href="?search=' . urlencode($searchTerm) . '&page=' . $prev_page . $anchor . '">&laquo; Previous</a>';
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        echo '<span class="current-page">' . $i . '</span>';
    } else {
        echo '<a href="?search=' . urlencode($searchTerm) . '&page=' . $i . $anchor . '">' . $i . '</a>';
    }
}

if ($page < $total_pages) {
    $next_page = $page + 1;
    echo '<a href="?search=' . urlencode($searchTerm) . '&page=' . $next_page . $anchor . '">Next &raquo;</a>';
}

echo '</div>';

?>


</div>

</section>


        <!-- Latest News -->
       <section class="section sec3">
  <h2 class="section_header">Latest News</h2>
  <div class="Latest_News">

    <article class="artical">
      <a href="articale.php?id=4" style="text-decoration:none; color:inherit; display:flex; gap:1rem; align-items:flex-start; height:100%;">
        <img src="images/LE1.webp" alt="">
        <div>
          <h3>History</h3>
          <p>3rd Test LIVE: 1st Time Since 1986 - KL Rahul, Pant Eye History For India</p>
        </div>
      </a>
    </article>

    <article class="artical">
      <a href="articale.php?id=5" style="text-decoration:none; color:inherit; display:flex; gap:1rem; align-items:flex-start; height:100%;">
        <img src="images/LE2.jpg" alt="">
        <div>
          <h3>Controversy</h3>
          <p>"Anything Close, Not Out: Kumble's Direct Attack At Umpire Paul Reiffel "</p>
        </div>
      </a>
    </article>

    <article class="artical">
      <a href="articale.php?id=6" style="text-decoration:none; color:inherit; display:flex; gap:1rem; align-items:flex-start; height:100%;">
        <img src="images/LE6.webp" alt="">
        <div>
          <h3>Schedule</h3>
          <p>"Cricket Australia Announces Domestic Schedule For 2025-26 Season "</p>
        </div>
      </a>
    </article>

    <article class="artical">
      <a href="articale.php?id=7" style="text-decoration:none; color:inherit; display:flex; gap:1rem; align-items:flex-start; height:100%;">
        <img src="images/LE7.avif" alt="">
        <div>
          <h3>Criticism</h3>
          <p>"'What Was He Looking For?': Rahul Slammed For Giving Akash Strike On Day 4 "</p>
        </div>
      </a>
    </article>

    <article class="artical">
      <a href="articale.php?id=8" style="text-decoration:none; color:inherit; display:flex; gap:1rem; align-items:flex-start; height:100%;">
        <img src="images/LE8.jpg" alt="">
        <div>
          <h3>Sledging</h3>
          <p>"Done For The Series": Eng Star Dishes Out Sledging At Gill. This Happens Next "</p>
        </div>
      </a>
    </article>

  </div>
</section>



        <!-- Category-wise Sections -->
<section class="section sec4">
  <div class="container">
    <h2 class="section_header">Category-wise Sections</h2>

    <a href="category.php?query=Sports" style="text-decoration: none; color: inherit;">
      <section class="category football">
        <h2>Sports</h2>
        <article class="category-article">
          <img src="images/cat1.jpeg" alt="Football Match">
          <div class="text-box">
            <div class="spans"> <span class="label">ARTICLE</span><span class="date">July 16, 2025</span></div>
            <h3>Barcelona Victory</h3>
            <p>Barcelona came from behind to beat Real Madrid 3-2 in a spectacular El Clasico showdown, thrilling fans worldwide.</p>
        <span class="read-more">Read More <i class="fa-solid fa-right-long"></i></span>
          </div>
        </article>
      </section>
    </a>

    <a href="category.php?query=Politics" style="text-decoration: none; color: inherit;">
      <section class="category combat-sports">
        <h2>Politics</h2>
        <article class="category-article">
          <img src="images/cat2.jpeg" alt="UFC Fight">
          <div class="text-box">
            <div class="spans"> <span class="label">ARTICLE</span> <span class="date">July 10, 2025</span></div>
            <h3>UFC Title Defense</h3>
            <p>The reigning UFC champion successfully defended his belt after an intense 5-round battle.</p>
        <span class="read-more">Read More <i class="fa-solid fa-right-long"></i></span>
          </div>
        </article>
      </section>
    </a>

    <a href="category.php?query=Technology" style="text-decoration: none; color: inherit;">
      <section class="category technology">
        <h2>Technology</h2>
        <article class="category-article">
          <img src="images/cat3.jpeg" alt="VAR Technology">
          <div class="text-box">
            <div class="spans"> <span class="label">ARTICLE</span> <span class="date">July 1, 2025</span></div>
            <h3>VAR in Football</h3>
            <p>Video Assistant Referee technology is transforming how referees make decisions on the field.</p>
        <span class="read-more">Read More <i class="fa-solid fa-right-long"></i></span>
          </div>
        </article>
      </section>
    </a>

  </div>
</section>



      </div>
      <!-- Aside -->
      <aside class="section">
        <section class=" trending-news">
          <div class=" trending_news">
            <h2 class="trending_title">Trending News</h2>

            <div class="trending_news_card_s">
              <img src="images/tr1.jpeg" alt="" class="trending_news_s_img">
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
              <img src="images/tr2.jpeg" alt="" class="trending_news_s_img">
              <div class="trending_news_s_content">
                <p class="trending_news_s_date">Cycling Weekly - 04 June 2023</p>
                <h3 class="trending_news_s_title">Epic Sprint Finish Seals Victory at Tour de France Stage 5
                </h3>
                <p class="trending_news_s_text">
                  A thrilling sprint finish saw Dutch cyclist Lars van Dijk take the lead in Stage 5 of the
                  Tour de France.
              </div>
            </div>

            <div class="trending_news_card_s">
              <img src="images/tr3.jpeg" alt="" class="trending_news_s_img">
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