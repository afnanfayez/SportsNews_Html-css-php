<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "news_db");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category_id = intval($_POST['category_id']);
    $image_url = trim($_POST['image_url']);
    $author_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO articles (title, content, image_url, category_id, author_id, published_date) 
                            VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssii", $title, $content, $image_url, $category_id, $author_id);
    $stmt->execute();

    header("Location: admin.php");
    exit();
}

$cats = $conn->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Article</title>
  <style>
 body {
    font-family: 'Helvetica Neue', sans-serif;
    background: linear-gradient(to right, #f0f2f5, #e2e8ec);
    margin: 0;
    padding: 40px;
    color: #333;
  }

  .container {
    max-width: 700px;
    margin: auto;
    background-color: #ffffff;
    padding: 35px 40px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
  }

  h2 {
    text-align: center;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 30px;
  }

  form input[type="text"],
  form textarea,
  form select {
    width: 100%;
    padding: 14px 16px;
    margin-bottom: 20px;
    border: 1px solid #dcdde1;
    border-radius: 10px;
    font-size: 15px;
    background-color: #f9f9f9;
    transition: 0.2s border ease;
  }

  form input:focus,
  form textarea:focus,
  form select:focus {
    border-color: #007BFF;
    outline: none;
    background-color: #fff;
  }

  form textarea {
    height: 140px;
    resize: vertical;
  }

  form button {
    width: 100%;
    padding: 14px;
         background-color: #2c3e50;
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  form button:hover {
    background-color: #1a242f;
  }

  .back-link {
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: #555;
    font-size: 14px;
  }

  .back-link:hover {
    color: #000;
    text-decoration: underline;
  }
  </style>
</head>
<body>

  <div class="container">
    <h2>Add New Article</h2>
    <form method="POST">
      <input type="text" name="title" placeholder="Article Title" required>
      <textarea name="content" placeholder="Article Content" required></textarea>
      <input type="text" name="image_url" placeholder="Image URL (optional)">
      <select name="category_id" required>
        <option disabled selected>Select Category</option>
        <?php while ($cat = $cats->fetch_assoc()): ?>
          <option value="<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['category_name']) ?></option>
        <?php endwhile; ?>
      </select>
      <button type="submit">Publish Article</button>
    </form>
    <a class="back-link" href="admin.php">← Back to Dashboard</a>
  </div>

</body>
</html>
