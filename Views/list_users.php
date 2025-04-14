<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .actions a { margin-right: 10px; text-decoration: none; }
    </style>
</head>
<body>
    <h1>User List</h1>
    
    <div class="actions">
        <a href="index.php?action=add_user">Add New User</a>
        <a href="index.php?action=list_tasks">View Tasks</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= htmlspecialchars($user->getName()) ?></td>
                <td><?= htmlspecialchars($user->getEmail()) ?></td>
                <td class="actions">
                    <a href="index.php?action=edit_user&id=<?= $user->getId() ?>">Edit</a>
                    <a href="index.php?action=delete_user&id=<?= $user->getId() ?>" 
                       onclick="return confirm('Are you sure? This will delete all associated tasks too.')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>