<?php
class TaskManager {
    private $dataMapper;

    public function __construct(JsonDataMapper $dataMapper) {
        $this->dataMapper = $dataMapper;
    }

    public function addTask($title, $description, $priority, $userId) {
        $tasks = $this->dataMapper->loadTasks();
        $newId = $this->generateNewId($tasks);
        $task = new Task(
            $newId,
            $title,
            $description,
            $priority,
            $userId,
            date('Y-m-d H:i:s')
        );
        $tasks[] = $task;
        $this->dataMapper->saveTasks($tasks);
        return $task;
    }

    private function generateNewId($tasks) {
        if (empty($tasks)) return 1;
        $maxId = max(array_map(function($task) { return $task->getId(); }, $tasks));
        return $maxId + 1;
    }

    public function getAllTasks() {
        return $this->dataMapper->loadTasks();
    }

    public function deleteTask($taskId) {
        $tasks = $this->dataMapper->loadTasks();
        $tasks = array_filter($tasks, function($task) use ($taskId) {
            return $task->getId() != $taskId;
        });
        $this->dataMapper->saveTasks(array_values($tasks));
    }
}
?>