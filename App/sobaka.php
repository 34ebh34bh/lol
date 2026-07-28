<?php

namespace App;
require 'mes.php';

class sobaka
{
    public static $sobaka = 21;
    public static function run() {
        return   'собаке лет ей ' . self::$sobaka. 'erfrfrf';
    }
    public static function lol() {
        return   'собаке лет ей ' . self::$sobaka . sobaka::run;
    }

}
$sobaka = new sobaka();
echo $sobaka::run();