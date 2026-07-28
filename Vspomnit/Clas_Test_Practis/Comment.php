<?php

namespace Vspomnit\Clas_Test_Practis;

class Comment
{
    private int $id;
    private int $postId;
    private int $userId;
    private string $text;
    public function __construct(int $id, int $postId, int $userId, string $text) {
        $this->id = $id;
        $this->postId = $postId;
        $this->userId = $userId;
        $this->text = $text;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getText(): string
    {
        return $this->text;
    }
}