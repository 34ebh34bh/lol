<?php

namespace Vspomnit\oop_project_1\crud_oop\EmailVerif;

use PDO;

class EmailRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

}