<?php
include 'db.php';

$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
$query = "SELECT id, task, completed FROM tasks";

if ($filter === 'completed') {
    $query .= " WHERE completed = 1";
} elseif ($filter === 'pending') {
    $query .= " WHERE completed = 0";
}

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f0f0f0;
        }
        h1 {
            color: #333;
            margin-top: 20px;
        }
        form {
            margin: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 250px;
            font-size: 16px;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            background-color: #28a745;
            color: white;
            border: none;
        }
        ul {
            list-style-type: none;
            padding: 0;
            width: 300px;
        }
        li {
            padding: 10px;
            margin-bottom: 5px;
            background-color: #fff;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ddd;
        }
        .delete {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        .completed-task {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>
<body>
    <h1>To-Do List</h1>

    <!-- Form to add a new task -->
    <form action="add_task.php" method="post">
        <input type="text" name="task" placeholder="Enter a new task" required>
        <button type="submit">Add Task</button>
    </form>

    <div>
        <a href="index.php?filter=all">All</a> |
        <a href="index.php?filter=completed">Completed</a> |
        <a href="index.php?filter=pending">Pending</a>
    </div>

    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li class="<?php echo $row['completed'] ? 'completed-task' : ''; ?>">
                <form action="update_task.php" method="post" style="display: flex; align-items: center;">
                    <input type="checkbox" name="complete" value="1" <?php echo $row['completed'] ? 'checked' : ''; ?> 
                        onchange="this.form.submit()">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    
                    <?php if (isset($_GET['edit']) && $_GET['edit'] == $row['id']): ?>
                        <input type="text" name="task" value="<?php echo htmlspecialchars($row['task']); ?>" required>
                        <button type="submit">Save</button>
                    <?php else: ?>
                        <span><?php echo htmlspecialchars($row['task']); ?></span>
                    <?php endif; ?>
                </form>
                
                <?php if (!isset($_GET['edit']) || $_GET['edit'] != $row['id']): ?>
                    <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                <?php endif; ?>
                <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
