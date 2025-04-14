<!DOCTYPE html>
<html>
<head>
    <title>Add New Task</title>
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
        <h1>Add New Task</h1>
        <a href="index.php?action=list_tasks">Back to Task List</a>
        
        <form action="index.php?action=save_task" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="priority">Priority:</label>
                <select id="priority" name="priority" required>
                    <option value="High">High</option>
                    <option value="Medium" selected>Medium</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="user_id">Assign To:</label>
                <select id="user_id" name="user_id" required>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user->getId() ?>"><?= htmlspecialchars($user->getName()) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Pending" selected>Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn">Save Task</button>
            </div>
        </form>
    </div>
</body>
</html>