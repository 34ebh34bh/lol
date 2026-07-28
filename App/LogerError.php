<?php

namespace App;

trait LogerError // трйет для вывода ошибок и удобного догирования
{
    public function error($message) {// тут у нас сам метод с
        $date = date("Y-m-d H:i:s");
        $logmessage = "[".$date."] ".$message."\n";
        file_put_contents(__DIR__ . "/error.log", $logmessage, FILE_APPEND);
    }
    public function info($message) {
        $date = date("Y-m-d H:i:s");
        $logmessage = "[".$date."] ".$message."\n";
        file_put_contents(__DIR__ . "/warning.log", $logmessage .  FILE_APPEND);
    }
}