<?php
session_start();
if ($_SESSION['role'] !== 'admin') die("Access denied");

$conn = new mysqli("localhost", "root", "", "news_db");
$id = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];
    $category_id = $_POST['category_id'];

    $stmt = $conn->prepare("UPDATE articles SET title=?, content=?, image_url=?, category_id=? WHERE article_id=?");
    $stmt->bind_param("sssii", $title, $content, $image_url, $category_id, $id);
    $stmt->execute();

    header("Location: admin.php"); // تعديل حسب مسار لوحة التحكم
    exit();
}

$article = $conn->query("SELECT * FROM articles WHERE article_id=$id")->fetch_assoc();
$cats = $conn->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Article</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        padding: 30px;
    }
    .container {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
    }
    form input[type="text"],
    form textarea,
    form select {
        width: 100%;
        padding: 12px;
        margin: 12px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }
    form textarea {
        resize: vertical;
        height: 200px;
    }
    button {
     background-color: #2c3e50;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    button:hover {
        background-color: #1a242f;
    }
    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        text-decoration: none;
        color: #007BFF;
    }
    .back-link:hover {
        text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <a href="admin.php" class="back-link">← Back to Dashboard</a>
  <h2>Edit Article</h2>
  <form method="POST">
    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>

    <label>Content:</label>
    <textarea name="content" required><?= htmlspecialchars($article['content']) ?></textarea>

    <label>Image URL:</label>
    <input type="text" name="image_url" value="<?= htmlspecialchars($article['image_url']) ?>">

    <label>Category:</label>
    <select name="category_id" required>
      <?php while($cat = $cats->fetch_assoc()): ?>
        <option value="<?= $cat['category_id'] ?>" <?= $cat['category_id'] == $article['category_id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($cat['category_name']) ?>
        </option>
      <?php endwhile; ?>
    </select>

    <button type="submit">Save Changes</button>
  </form>
</div>

</body>
</html>
