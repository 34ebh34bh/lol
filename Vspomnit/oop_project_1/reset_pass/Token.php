<?php


namespace Vspomnit\oop_project_1\reset_pass;

use DateTimeImmutable;

class Token // этот класс лмшь описывает токен, но он не лезит в бд и и екуда его не отправляет, не сохраняеь, он лигь говорит за состояние токена
{
    private string $token;
    private DateTimeImmutable $expiries_at;
    private ?DateTimeImmutable $used_at;

    public function __construct(string $token, ?DateTimeImmutable $used_at = null, DateTimeImmutable $expiries_at) {
        $this->token = $token;
        $this->expiries_at = $expiries_at;
        $this->used_at = $used_at;
    }
    public static function create_token(int $minutes = 30): array
    {
        $token = bin2hex(random_bytes(32));
        $token_hash = hash('sha256', $token);
        $expiries_at = (new DateTimeImmutable())->modify("+{$minutes} minutes");

        return [$token, new Token($token_hash, $expiries_at)]; // тут мы храним два разных материала, один идёт в ссылку другой в бд, то что ищёт в бд имеет время жизни
    }
    public function isExpiried(): bool // получается тут мы проверяем, и в лаотгейнем ьбудем вызывать что бы смотреть закрончился токен или нет, его время жизни
    {
        return new DateTimeImmutable() >= $this->expiries_at;
    }
    public function isUsed(): bool
    {
        return $this->used_at !== null;
    }
    public function markUsed(): void
    {
        $this->used_at = new DateTimeImmutable();
    }
    public function getToken(): string
    {
        return $this->token;
    }
    public function getExpiriesAt(): DateTimeImmutable
    {
        return $this->expiries_at;
    }
    public function getUsedAt(): ?DateTimeImmutable
    {
        return $this->used_at;
    }

}