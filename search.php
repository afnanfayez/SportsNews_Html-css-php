<?php
include_once 'news-site/db.php';

if (isset($_GET['query']) && !empty(trim($_GET['query']))) {
    $search_query = trim($_GET['query']);
    $like_query = '%' . $search_query . '%';

    $stmt = $conn->prepare("SELECT article_id FROM articles WHERE title LIKE ? OR content LIKE ? ORDER BY published_date DESC LIMIT 1");
    $stmt->bind_param("ss", $like_query, $like_query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        header("Location: articale.php?id=" . $row['article_id']);
        exit();
    } else {
        echo "<script>alert('No article found matching your search.'); window.history.back();</script>";
        exit();
    }
} else {
    echo "<script>alert('Please enter a search term.'); window.history.back();</script>";
    exit();
}
?>
