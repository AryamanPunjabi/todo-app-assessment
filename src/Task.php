<?php

class Task
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Add a task to the database
    public function addTask($taskDescription)
    {
        $query = "INSERT INTO tasks (task, completed) VALUES (?, 0)"; // 0 = incomplete
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $taskDescription); // Bind the task description to the statement
        return $stmt->execute();  // Execute the query and return the result
    }

    // Get all tasks
    public function getAllTasks()
    {
        $query = "SELECT * FROM tasks";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);  // Return all tasks as an associative array
    }

    // Mark a task as completed
    public function markTaskAsComplete($taskId)
    {
        $query = "UPDATE tasks SET completed = 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $taskId); // Bind the task ID
        return $stmt->execute();  // Execute the query
    }

    // Update a task description
    public function updateTask($taskId, $newDescription)
    {
        $query = "UPDATE tasks SET task = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $newDescription, $taskId); // Bind the new task description and ID
        return $stmt->execute();  // Execute the query
    }

    // Delete a task
    public function deleteTask($taskId)
    {
        $query = "DELETE FROM tasks WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $taskId); // Bind the task ID
        return $stmt->execute();  // Execute the query
    }
}

?>
