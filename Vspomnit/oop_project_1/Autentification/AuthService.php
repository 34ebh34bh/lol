<?php

namespace Vspomnit\oop_project_1\Autentification;

use DateTimeImmutable;
use mysql_xdevapi\Exception;
use function PHPUnit\Framework\throwException;

class AuthService
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(string $email, string $password): User
    {
        if ($this->userRepository->findByEmail($email) !== null) { // тут получается мы ищем что бы аткой почты не было, иначе не зарегаем
            throw new \Exception('такая почта уже используется');
        };

        $passwordHash = password_hash($password, PASSWORD_DEFAULT); // пароль берётся из аргумента из метода
//        $created_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');

        $user = new User(
            email: $email,
            password_hash: $passwordHash,
            id: (int)null,
            created_at: new DateTimeImmutable()
        );

        $this->userRepository->save($user);
        return $user;

    }
    public function login(string $email, string $password): User {

        $user = $this->userRepository->findByEmail($email);

        if ($this->userRepository->findByEmail($email) === null) { // а тут наоборот ищем что бы была
            throw new \Exception('Такой почты нет');
        }

        if (!password_verify($password,$user->getPasswordHash())) {
            throw new Exception('Пароль не верный');
        }
        return $user;
    }
}