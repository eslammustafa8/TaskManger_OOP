<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .priority-high { color: #e74c3c; font-weight: bold; }
        .priority-medium { color: #f39c12; }
        .priority-low { color: #2ecc71; }
        .actions a { margin-right: 10px; text-decoration: none; }
        .status-completed { color: #27ae60; }
        .status-pending { color: #e67e22; }
    </style>
</head>
<body>
    <h1>Task List</h1>
    
    <div class="actions">
        <a href="index.php?action=add_task">Add New Task</a>
        <a href="index.php?action=list_users">View Users</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): 
                $user = $userManager->getUserById($task->getUserId());
                $priorityClass = 'priority-' . strtolower($task->getPriority());
                $statusClass = 'status-' . strtolower($task->getStatus());
            ?>
            <tr>
                <td><?= htmlspecialchars($task->getTitle()) ?></td>
                <td><?= htmlspecialchars($task->getDescription()) ?></td>
                <td class="<?= $priorityClass ?>"><?= $task->getPriority() ?></td>
                <td><?= $user ? htmlspecialchars($user->getName()) : 'Unknown' ?></td>
                <td class="<?= $statusClass ?>"><?= $task->getStatus() ?></td>
                <td><?= $task->getCreatedAt() ?></td>
                <td class="actions">
                    <a href="index.php?action=edit_task&id=<?= $task->getId() ?>">Edit</a>
                    <a href="index.php?action=delete_task&id=<?= $task->getId() ?>" 
                       onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>