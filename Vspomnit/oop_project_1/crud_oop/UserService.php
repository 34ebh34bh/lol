<?php

namespace Vspomnit\oop_project_1\crud_oop;

use PHPUnit\Framework\Exception;
use function PHPUnit\Framework\throwException;
use RuntimeException;
class UserService
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function gettAllServ(): array
    {
       return $this->userRepository->getAllPost();
    }
    public function DeletePost($id): void
    {
        $this->userRepository->deletePost($id);
    }
    public function ShowPost($id): array
    {
        if ($this->userRepository->CheckPost($id) === null){
            throw new Exception('Нет такого поста');
        }

        return $this->userRepository->FindBuId($id);
    }
    public function UpdatePost(int $id, string $title, string $description): void
    {
        if ($this->userRepository->CheckPost($id) === null){
            throw new Exception('Нет такого поста');
        }
        $this->userRepository->updatePost($id, $title, $description);
    }
    public function ServiceCreatePost(string $title, string $description):void
    {
        $title = trim($title);
        $description = trim($description);

        if ($title === '') {
            throw new RuntimeException("name can't be empty");
        }

        if ($description === '') {
            throw new RuntimeException("description can't be empty");
        }

        if (mb_strlen($description) < 5) {
            throw new RuntimeException("description can't be less than 5 characters");
        }

        if (mb_strlen($title) < 3) {
            throw new RuntimeException("name can't be less than 3 characters");
        }

        $this->userRepository->CreatePost($title, $description);
    }

}