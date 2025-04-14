<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Task Manager</h1>
    <a href="index.php?action=add">Add New Task</a>
    
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task->getTitle()) ?></td>
            <td><?= htmlspecialchars($task->getDescription()) ?></td>
            <td><?= $task->getPriority() ?></td>
            <td><?= $task->getStatus() ?></td>
            <td>
                <a href="index.php?action=delete&id=<?= $task->getId() ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>