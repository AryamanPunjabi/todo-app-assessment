<?php
include 'db.php';

if (isset($_POST['task'])) {
    $task = trim($_POST['task']);

    // Validate task description length and content
    if (strlen($task) > 0 && strlen($task) <= 255 && preg_match("/^[a-zA-Z0-9\s]+$/", $task)) {
        
        $stmt = $conn->prepare("INSERT INTO tasks (task, completed) VALUES (?, 0)");
        $stmt->bind_param("s", $task);

        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            echo "Error adding task: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Invalid task description!";
    }
}

$conn->close();
?>
