<?php

namespace App;

class Auth
{
    private $user;
    public function __construct(User $user) {
        $this->user = $user;
        if (session_status() == PHP_SESSION_NONE) { // тут я пока что хз что происходит
            session_start();
        }
    }
    public function attempt($email, $password) { // логие и проверка на то что есть ли такой зарегистрированный пользователь по email
        $user = $this->user->findEmail($email); //  люращаемся к методу который выводит нам по email нужглшл пользователя
        if ($user && password_verify($password, $user['password'])) { // если тако пароль и пользователя есть то всё ок
            $_SESSION['user_id'] = $user['id']; // тут мы получаем данные для того что бы выполнять метод  он берёт и заполняет его если он за голинен
            $_SESSION['user_name'] = $user['name'];
            return true;
        }
        return false;
    }
    public function check() // проверк на то есть ли такой пользователь войден
    {
        return isset($_SESSION['user_id']);
    }
    public function user()
    {
        return $this->check() ? $_SESSION['user_name'] : null; // просто выводим его имя если он войден
    }
    public function logout() { // просто выходим
        session_destroy();
    }
}