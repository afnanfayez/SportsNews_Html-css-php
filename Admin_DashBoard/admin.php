<?php
session_start();
require_once '../news-site/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);

 
    $stmt1 = $conn->prepare("DELETE FROM comments WHERE article_id = ?");
    $stmt1->bind_param("i", $delete_id);
    $stmt1->execute();

 
    $stmt2 = $conn->prepare("DELETE FROM articles WHERE article_id = ?");
    $stmt2->bind_param("i", $delete_id);
    $stmt2->execute();

    header('Location: admin.php');
    exit();
}


$sql = "SELECT a.article_id, a.title, a.published_date, c.category_name, u.username AS author_name
        FROM articles a
        LEFT JOIN categories c ON a.category_id = c.category_id
        LEFT JOIN users u ON a.author_id = u.user_id
        ORDER BY a.published_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Dashboard - Manage Articles</title>
<style>
    body { font-family: Arial, sans-serif; margin: 20px; direction: ltr; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    a.button {
        display: inline-block; padding: 6px 12px; margin: 2px;
        background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px;
    }
    form.delete-form {
        display: inline;
    }
    button.delete-button {
        padding: 6px 12px;
        margin: 2px;
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
</head>
<body>

<h1>Admin Dashboard - Manage Articles</h1>

<p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?> | <a href="logout.php">Logout</a></p>

<p>
    <a href="add_article.php" class="button">Add New Article</a>
</p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Published Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['article_id'] ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['category_name'] ?? 'Uncategorized') ?></td>
                    <td><?= htmlspecialchars($row['author_name'] ?? 'Unknown') ?></td>
                    <td><?= $row['published_date'] ?></td>
                    <td>
                        <a href="edit_article.php?id=<?= $row['article_id'] ?>" class="button">Edit</a>
                        <form class="delete-form" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');" >
                            <input type="hidden" name="delete_id" value="<?= $row['article_id'] ?>">
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">No articles found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
