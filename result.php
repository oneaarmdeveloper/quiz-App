<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
    <h2>Quiz Results</h2>
    <?php
    if (isset($_SESSION["score"])) {
        echo "<p>Your score: " . $_SESSION["score"] . " out of " . 3 . "</p>";
    } else {
        echo "<p>No score available. Please take the quiz first.</p>";
    }
    ?>
    <a href="quiz.php">Back to Quiz</a>
</body>
</html>