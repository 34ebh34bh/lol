<?php

namespace App;

class Book
{
    public $title;
    private $author;
    private $year;
    public $isRead;
    public function __construct($title, $author, $year, $isRead = false) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->isRead = $isRead;
    }
    public function getTitle() {
        return $this->title;
    }
    public function markAsRead() {
        $this->isRead = true;
    }
    public function markAsUnread() {
        $this->isRead = false;
    }
}