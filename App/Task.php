<?php

namespace App;

class Task
{
    private $task = [];

    public function addTask($taskName) {
        $this->task[] = $taskName;
    }

    public function getTasks($filter = null) {
        return $this->task;
    }

    public function removeTask($taskName) {
        foreach ($this->task as $key=>$value) {
            if($value == $taskName) {
                unset($this->task[$key]);
                echo 'Ваша задача ' . $taskName . ' удалена' ."\n";
            }
        }
    }

    public function markAsDone($taskName) {
        foreach ($this->task as $key=>$value) {
            if($value == $taskName) {
                echo $taskName . ' Задача выполнена ';
            }
        }
    }
}
