<?php

namespace Vspomnit\Clas_Test_Practis;

class Post
{
    private string $title;
    private string $content;
    private User $author;
    public function __construct(string $title, string $content, User $author) {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getAuthorName(): string
    {
        return $this->author->getName();
    }
}
