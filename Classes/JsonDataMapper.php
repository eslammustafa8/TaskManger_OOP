<?php
class JsonDataMapper {
    private $usersFile = 'data/users.json';
    private $tasksFile = 'data/tasks.json';

    public function loadUsers() {
        if (!file_exists($this->usersFile)) return [];
        $json = file_get_contents($this->usersFile);
        $data = json_decode($json, true);
        return array_map(function($user) {
            return new User($user['id'], $user['name'], $user['email']);
        }, $data);
    }

    public function saveUsers(array $users) {
        $data = array_map(function($user) {
            return [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail()
            ];
        }, $users);
        file_put_contents($this->usersFile, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function loadTasks() {
        if (!file_exists($this->tasksFile)) return [];
        $json = file_get_contents($this->tasksFile);
        $data = json_decode($json, true);
        if (!is_array($data)) return []; 
        return array_map(function($task) {
            return new Task(
                $task['id'],
                $task['title'],
                $task['description'],
                $task['priority'],
                $task['userId'],
                $task['createdAt'],
                $task['status']
            );
        }, $data);
    }

    public function saveTasks(array $tasks) {
        $data = array_map(function($task) {
            return [
                'id' => $task->getId(),
                'title' => $task->getTitle(),
                'description' => $task->getDescription(),
                'priority' => $task->getPriority(),
                'userId' => $task->getUserId(),
                'createdAt' => $task->getCreatedAt(),
                'status' => $task->getStatus()
            ];
        }, $tasks);
        file_put_contents($this->tasksFile, json_encode($data, JSON_PRETTY_PRINT));
    }
}
?>