<?php
require_once 'User.php';
require_once 'JsonDataMapper.php';

class UserManager {
    private $dataMapper;

    public function __construct(JsonDataMapper $dataMapper) {
        $this->dataMapper = $dataMapper;
    }

    public function addUser(string $name, string $email): User {
        $users = $this->dataMapper->loadUsers();
        $newId = $this->generateNewId($users);
        $user = new User($newId, $name, $email);
        $users[] = $user;
        $this->dataMapper->saveUsers($users);
        return $user;
    }

    public function deleteUser(int $userId): void {
        $users = $this->dataMapper->loadUsers();
        $users = array_filter($users, function($user) use ($userId) {
            return $user->getId() !== $userId;
        });
        $this->dataMapper->saveUsers(array_values($users));
    }

    public function getAllUsers(): array {
        return $this->dataMapper->loadUsers();
    }

    public function getUserById(int $userId): ?User {
        $users = $this->dataMapper->loadUsers();
        foreach ($users as $user) {
            if ($user->getId() === $userId) {
                return $user;
            }
        }
        return null;
    }

    private function generateNewId(array $users): int {
        if (empty($users)) return 1;
        $maxId = max(array_map(fn($user) => $user->getId(), $users));
        return $maxId + 1;
    }
}
?>