<?php
session_start();
if ($_SESSION['role'] !== 'admin') die("Access denied");

$conn = new mysqli("localhost", "root", "", "news_db");
$id = $_GET['id'];

$conn->query("DELETE FROM articles WHERE article_id=$id");
header("Location: admin_dashboard.php");
