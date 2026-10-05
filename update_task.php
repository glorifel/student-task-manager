<?php
require_once 'db.php';

$id = (int)($_GET['id'] ?? 0);
$status = $_GET['status'] ?? 'Pending';

if ($id > 0 && in_array($status, ['Pending', 'Completed'], true)) {
    $stmt = $pdo->prepare("UPDATE tasks SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
}
header('Location: index.php');
exit;
