<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-container { max-width: 600px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="email"] { 
            width: 100%; 
            padding: 8px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
        }
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
        <h1>Add New User</h1>
        <a href="index.php?action=list_users">Back to User List</a>
        
        <form action="index.php?action=save_user" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn">Save User</button>
            </div>
        </form>
    </div>
</body>
</html>