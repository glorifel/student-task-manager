<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM tasks ORDER BY due_date ASC, id DESC");
$tasks = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="container">
        <h1>Student Task Manager</h1>
        <p>Organize your school assignments in one place.</p>
    </div>
</header>

<main class="container">
    <section class="card">
        <h2>Add a Task</h2>
        <form action="add_task.php" method="POST" class="task-form">
            <input type="text" name="title" placeholder="Task title" required>
            <input type="date" name="due_date" required>
            <select name="priority">
                <option value="Low">Low Priority</option>
                <option value="Medium" selected>Medium Priority</option>
                <option value="High">High Priority</option>
            </select>
            <button type="submit">Add Task</button>
        </form>
    </section>

    <section class="card">
        <h2>My Tasks</h2>
        <?php if (!$tasks): ?>
            <p class="empty">No tasks yet. Add your first task above.</p>
        <?php else: ?>
            <div class="task-list">
                <?php foreach ($tasks as $task): ?>
                    <article class="task <?= $task['status'] === 'Completed' ? 'completed' : '' ?>">
                        <div>
                            <h3><?= htmlspecialchars($task['title']) ?></h3>
                            <p>Due: <?= htmlspecialchars($task['due_date']) ?></p>
                            <span class="badge"><?= htmlspecialchars($task['priority']) ?></span>
                            <span class="status"><?= htmlspecialchars($task['status']) ?></span>
                        </div>
                        <div class="actions">
                            <?php if ($task['status'] !== 'Completed'): ?>
                                <a href="update_task.php?id=<?= $task['id'] ?>&status=Completed">Complete</a>
                            <?php else: ?>
                                <a href="update_task.php?id=<?= $task['id'] ?>&status=Pending">Undo</a>
                            <?php endif; ?>
                            <a class="delete" href="delete_task.php?id=<?= $task['id'] ?>" onclick="return confirm('Delete this task?')">Delete</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<footer>
    <p>Student Task Manager • School Project</p>
</footer>
</body>
</html>
