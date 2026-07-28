<?php

namespace Vspomnit\oop_project_1\crud_oop;

class UserController // тут у нас получение данных с внещнмх сред, форма и тд
{
    private UserService $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    public function index(): array // тут тоже что то добюывае
    {
        return $this->userService->gettAllServ();
    }
    public function show(int $id): array // вот тут метод что то обывает, как бы он добывет мне пользователя
    {
       return $this->userService->ShowPost($id);
    }
    public function create(): void // тут метод делает а не добывает, как бы тут просто void а не array и return не нужен
    {
    try{
        $this->userService->ServiceCreatePost($_POST['title'], $_POST['description']);
        echo 'Пост создан';
    } catch (\RuntimeException $e) {
        echo 'Ошибка: ' . $e->getMessage();
    }

    }
    public function edit(int $id, string $title, string $description): void
    {
        $id = (int)$_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $this->userService->UpdatePost($id, $title, $description);
        echo 'Данные обновлены';
    }
    public function delete(int $id): void
    {
        $id = $_GET['id'];
        $this->userService->DeletePost($id);
        echo 'Пост удалён';
    }
}