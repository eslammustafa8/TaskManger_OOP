<?php
class Task {
    private $id;
    private $title;
    private $description;
    private $priority;
    private $userId;
    private $createdAt;
    private $status;

    public function __construct($id, $title, $description, $priority, $userId, $createdAt, $status = 'Pending') {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->setPriority($priority);
        $this->userId = $userId;
        $this->createdAt = $createdAt;
        $this->status = $status;
    }

    private function setPriority($priority) {
        $allowed = ['High', 'Medium', 'Low'];
        if (!in_array($priority, $allowed)) {
            throw new InvalidArgumentException("Invalid priority value");
        }
        $this->priority = $priority;
    }

  
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getPriority() { return $this->priority; }
    public function getUserId() { return $this->userId; }
    public function getCreatedAt() { return $this->createdAt; }
    public function getStatus() { return $this->status; }
}
?>