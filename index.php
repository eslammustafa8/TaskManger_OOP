<?php
require_once 'Classes/User.php';
require_once 'Classes/Task.php';
require_once 'Classes/JsonDataMapper.php';
require_once 'Classes/TaskManager.php';
require_once 'Classes/UserManager.php';

$dataMapper = new JsonDataMapper();
$taskManager = new TaskManager($dataMapper);
// $userManager = new UserManager($dataMapper);

$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'add':
        // Handle task creation
        break;
    case 'delete':
        // Handle task deletion
        break;
    case 'list_users':
        // Show users
        break;
    default:
        $tasks = $taskManager->getAllTasks();
        include 'Views/list_tasks.php';
}
?>