<?php

namespace Vspomnit\Clas_Test_Practis;

class UserService // тут мы тока получаем и есои надо то проверяем,
{
    private int $nextId  = 1;
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function create(string $name, string $email) {
        $u = new UserModel($this->nextId++,$name, $email); // жоделать создание
        $this->userRepository->add($u);
    }
    public function update(int $id, string $name, string $email) {
         $this->userRepository->update($id, $name, $email);
    }
    public function delete($id) {
        $this->userRepository->delete($id);
    }
    public function getUserfindById($id) {
        return $this->userRepository->findById($id);
    }
}