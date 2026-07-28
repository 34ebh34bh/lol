<?php

namespace Vspomnit\Clas_Test_Practis;

class UserRepository
{
    private array $users = [];

    public function add(UserModel $userModel) {
        $this->users[] = $userModel;
        return $this->users;
    }
    public function getAll() {
        $users =  $this->users;
        foreach ($users as $user) {
            echo $user->getId();
            echo $user->getName();
            echo $user->getEmail();
        }
    }
    public function findById($id) {
        $users = $this->users;

        foreach ($users as $user) {
            if ($id == $user->getId()) {
//                echo 'name: ' . $user->getName() . PHP_EOL;
//                echo 'email: ' . $user->getEmail() . PHP_EOL;
                return $user;
            }
        }
        return null;
    }
    public function delete($id) {
        $users =  $this->users;

        foreach ($users as $key => $user) {
            if ($user->getId() === $id) {
                unset($this->users[$key]);
                return;
            }
        }
    }
    public function update(int $id, string $name, string $email) {
        $users = $this->users;
        foreach ($users as $user) {
            if ($user->getId() === $id) {
                $user->setName($name);
                $user->setEmail($email);
            }
        }
    }

    public function getUsers(): array
    {
        return $this->users;
    }

}