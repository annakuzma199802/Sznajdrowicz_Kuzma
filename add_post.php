<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";

    $title = $_POST["title"];
    $content = $_POST["content"];

    $query = "INSERT INTO posts (title, content) VALUES (?, ?)";
    $statement = $mysqli->prepare($query);
    $statement->bind_param("ss", $title, $content);

    if (!$statement->execute()) {
        die("Error: " . $mysqli->error);
    }

    header("Location: index.php");
    exit();
}
?>
