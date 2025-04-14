<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-container { max-width: 600px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea, select { 
            width: 100%; 
            padding: 8px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
        }
        textarea { height: 100px; }
        .form-actions { margin-top: 20px; }
        .btn { 
            padding: 10px 15px; 
            background-color: #3498db; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        .btn:hover { background-color: #2980b9; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Task</h1>
        <a href="index.php?action=list_tasks">Back to Task List</a>
        
        <form action="index.php?action=update_task" method="post">
            <input type="hidden" name="id" value="<?= $task->getId() ?>">
            
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($task->getTitle()) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required><?= htmlspecialchars($task->getDescription()) ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="priority">Priority:</label>
                <select id="priority" name="priority" required>
                    <option value="High" <?= $task->getPriority() === 'High' ? 'selected' : '' ?>>High</option>
                    <option value="Medium" <?= $task->getPriority() === 'Medium' ? 'selected' : '' ?>>Medium</option>
                    <option value="Low" <?= $task->getPriority() === 'Low' ? 'selected' : '' ?>>Low</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="user_id">Assign To:</label>
                <select id="user_id" name="user_id" required>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user->getId() ?>" <?= $task->getUserId() == $user->getId() ? 'selected' : '' ?>>
                            <?= htmlspecialchars($user->getName()) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Pending" <?= $task->getStatus() === 'Pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="In Progress" <?= $task->getStatus() === 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                    <option value="Completed" <?= $task->getStatus() === 'Completed' ? 'selected' : '' ?>>Completed</option>
                </select>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn">Update Task</button>
            </div>
        </form>
    </div>
</body>
</html>