<?php

namespace Vspomnit\Clas_Test_Practis;

class Task
{
    private int $id;
    private string $title;
    private int $projectId;
    private string $status = 'new';
    public function __construct(int $id, string $title, int $projectId) {
        $this->id = $id;
        $this->title = $title;
        $this->projectId = $projectId;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getProjectId(): int
    {
        return $this->projectId;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}