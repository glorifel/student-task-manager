<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $due_date = $_POST['due_date'] ?? '';
    $priority = $_POST['priority'] ?? 'Medium';

    if ($title !== '' && $due_date !== '') {
        $stmt = $pdo->prepare("INSERT INTO tasks (title, due_date, priority, status) VALUES (?, ?, ?, 'Pending')");
        $stmt->execute([$title, $due_date, $priority]);
    }
}
header('Location: index.php');
exit;
