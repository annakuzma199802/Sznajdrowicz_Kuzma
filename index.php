<?php
require_once "db.php";

$query = "SELECT * FROM posts";
$result = $mysqli->query($query);

if ($result) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Debata</title>
        <link rel="stylesheet" href="style.css">
        <script>
            function togglePosts() {
                var postsDiv = document.getElementById("posts");
                if (postsDiv.style.display === "none") {
                    postsDiv.style.display = "block";
                } else {
                    postsDiv.style.display = "none";
                }
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h1>Wypełnij poniższy formularz, aby zadać pytanie dla naszego kandydata</h1>
            <form action="add_post.php" method="post">
                <input type="text" name="title" placeholder="Tytuł pytania" required>
                <textarea name="content" placeholder="Treść pytania" required></textarea>
                <button type="submit">Zadaj pytanie</button>
            </form>
            <br>
            <br>
            <h1>Pytania dla kandydata reprezentującego firmę TESTOWĄ w debacie testerskiej</h1>
            <div id="posts" class="posts">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="post">
                        <h2><?= $row['title'] ?></h2>
                        <p><?= $row['content'] ?></p>
                        <p>Data dodania: <?= $row['created_at'] ?></p>
                    </div>
                    <button class="button" onclick="togglePosts()">Pokaż/Ukryj pytania</button> 
                <?php endwhile; ?>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Wystąpił błąd przy pobieraniu danych.";
}

$mysqli->close();
?>



