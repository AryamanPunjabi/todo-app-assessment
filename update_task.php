<?php
include 'db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $completed = isset($_POST['complete']) ? 1 : 0;
    $task_description = isset($_POST['task']) ? $_POST['task'] : null;

    // Update completion status securely
    $stmt = $conn->prepare("UPDATE tasks SET completed = ? WHERE id = ?");
    $stmt->bind_param("ii", $completed, $id);
    $stmt->execute();

    // Update task description if provided
    if ($task_description) {
        $stmt = $conn->prepare("UPDATE tasks SET task = ? WHERE id = ?");
        $stmt->bind_param("si", $task_description, $id);
        $stmt->execute();
    }

    $stmt->close();
    header("Location: index.php");
    exit();
}

$conn->close();
?>
