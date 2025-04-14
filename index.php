<?php
require_once 'Classes/User.php';
require_once 'Classes/Task.php';
require_once 'Classes/JsonDataMapper.php';
require_once 'Classes/UserManager.php';
require_once 'Classes/TaskManager.php';


$dataMapper = new JsonDataMapper();
$userManager = new UserManager($dataMapper);
$taskManager = new TaskManager($dataMapper);


if (!is_dir('data')) {
    mkdir('data', 0755, true);
}

$action = $_GET['action'] ?? 'list_tasks';

try {
    switch ($action) {
        case 'list_tasks':
            $tasks = $taskManager->getAllTasks();
            $users = $userManager->getAllUsers();
            require 'Views/list_tasks.php';
            break;

        case 'add_task':
            $users = $userManager->getAllUsers();
            require 'Views/add_task.php';
            break;

        case 'save_task':
            $task = $taskManager->addTask(
                $_POST['title'],
                $_POST['description'],
                $_POST['priority'],
                $_POST['user_id']
            );
            header('Location: index.php?action=list_tasks');
            break;

        case 'edit_task':
            $taskId = $_GET['id'] ?? null;
            if (!$taskId) throw new Exception('Task ID not provided');
            
            $tasks = $taskManager->getAllTasks();
            $task = current(array_filter($tasks, fn($t) => $t->getId() == $taskId));
            if (!$task) throw new Exception('Task not found');
            
            $users = $userManager->getAllUsers();
            require 'Views/edit_task.php';
            break;

        case 'update_task':
            $taskId = $_POST['id'] ?? null;
            if (!$taskId) throw new Exception('Task ID not provided');
            
    
            header('Location: index.php?action=list_tasks');
            break;

        case 'delete_task':
            $taskId = $_GET['id'] ?? null;
            if (!$taskId) throw new Exception('Task ID not provided');
            
            $taskManager->deleteTask($taskId);
            header('Location: index.php?action=list_tasks');
            break;

        case 'list_users':
            $users = $userManager->getAllUsers();
            require 'Views/list_users.php';
            break;

        case 'add_user':
            require 'Views/add_user.php';
            break;

        case 'save_user':
            $user = $userManager->addUser(
                $_POST['name'],
                $_POST['email']
            );
            header('Location: index.php?action=list_users');
            break;

        case 'delete_user':
            $userId = $_GET['id'] ?? null;
            if (!$userId) throw new Exception('User ID not provided');
            
            $userManager->deleteUser($userId);
            header('Location: index.php?action=list_users');
            break;

        default:
            throw new Exception('Invalid action');
    }
} catch (Exception $e) {
 
    echo '<h1>Error</h1>';
    echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<a href="index.php">Go back</a>';
}
?>