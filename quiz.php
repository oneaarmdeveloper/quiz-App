<?php
session_start(); // Start the session

// Define Questions and Answers
$questions = [
    "What is the Capital of France?" => ["A) London", "B) Berlin", "C) Paris", "D) Lagos"],
    "What Language is used for web-development?" => ["A) PHP", "B) Java", "C) C++", "D) Python"],
    "What does HTML stand for?" => ["A) Hypertext Markup Language", "B) Berlin", "C) Paris", "D) Lagos"],
];

// Array storing correct answers
$correct_answers = ["C", "A", "A"]; // Fixed missing '$'

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    $user_answers = $_POST["answers"];

    // Calculate the score
    foreach ($correct_answers as $index => $correct) {
        if (isset($user_answers[$index]) && $user_answers[$index] == $correct) { 
            $score++;
        }
    }

    // Store score in session
    $_SESSION["score"] = $score; // Fixed stray quote
    header("Location: result.php"); // Redirect to result page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <h2>PHP Quiz</h2> 
    <form method="POST">
        <?php foreach ($questions as $question => $options): ?>
            <p><strong><?php echo $question; ?></strong></p>
            <?php foreach ($options as $key => $option): ?> 
                <label>
                    <input type="radio" 
                           name="answers[<?php echo array_search($question, array_keys($questions)); ?>]" 
                           value="<?php echo chr(65 + $key); ?>" 
                           required>
                    <?php echo $option; ?>
                </label><br>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <br>
        <input type="submit" value="Submit"> 
    </form>
</body>
</html>
