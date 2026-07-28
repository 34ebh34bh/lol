<?php
session_start();
include './connection.php'; //подключаем файл

if($_SERVER["REQUEST_METHOD"] == "POST"){ // если данные пришли с пост запросы то принимаем
    $name = $_POST["name"]; // помещаем в переменную
    $description = $_POST["description"];
    $prioritet = $_POST["prioritet"];
    $u = $_SESSION['id'];

    $n = mb_convert_case(trim($name), MB_CASE_TITLE, "UTF-8"); //очищаем от пробелом и делаем их с маленькой буквы
    $d = trim($description);
    $p = trim($prioritet);

    $date = date("Y-m-d"); //дата
    $status = 'pending'; //автоматический статус после того как создал
    $bad_word = ['test','lol','kek','admin']; //слова не жопустимые


    $result = preg_match('/^[а-яА-Яa-zA-Z0-9\s]+$/u', $n); //убеждаемся какие слова нельзя

    $smtm = $pdo->prepare("SELECT name FROM crud_2.test_note WHERE name = ?"); // проверка на уникальность именни
    $smtm->execute([$n]);

    if(strlen($n) >= 1 && strlen($n) <= 50 && strlen($d) > 10 && $p > 1 && $p < 10) { // проверка на длину
        if ($result === 1) { // то что если всё ок и нет лишних символов то 1 он выдаст и всё окей
            if ($n === strip_tags($n) && $d === strip_tags($d)) { //проверяем и имя и описание на html теги
                if ($smtm->fetch() === false) { //проверка на уник имя
                    
                    $d_lower = strtolower($d); //применяем описание к низ регистру

                    //Тут суть в том что мы не можем сравнивать массив со строкой и мы взяли сначало перевели описание в масива после чего его перебрали и
                    // сравниваем с дргуим перебрвнным масиво с словами плохими
                    $d_arr = explode(' ', $d_lower); //делаем из делаем из описания массив

                    $checked_word = false; //флаг

                    foreach ($bad_word as $word) {
                        $lover_arr = strtolower($word);

                        foreach ($d_arr as $word_text) {
                            if ($word_text === $lover_arr) {
                                $checked_word = true;
                                break 2;
                            }
                            }
                        }

                    if ($checked_word === false) {
                        if(is_numeric($p) === true) {
                            if ($p < 5) {
                                $prioritet_level = 'Низкий';
                            }elseif ($p > 8) {
                                $prioritet_level = 'Высокий';
                            }else{
                                $prioritet_level = 'средний';
                            }
                          $smtm = $pdo->prepare("INSERT INTO crud_2.test_note_2 (name, description, prioritet, flag ,created_at, prioritet_level, user_id) VALUES(?, ?, ?, ?, ?, ?, ?)");
                          $smtm->execute([$name, $description, $prioritet, $status, $date, $prioritet_level, $u]);
                          header("location:index.php");
                          exit();
                        }
                    }else{
                        echo 'найдено запрещённое слово';
                    }

                }else {
                    echo 'такое имя уже занято';
                }
            }else {
                echo 'Warning Html';
            }
        }else{
            echo 'НЕ корректные символы';
        }
    }else{
        echo 'длина не подходит';
    }
}

//    if(strlen($n) >= 1 && strlen($n) <= 50 && strlen($d) > 10 && $p > 1 && $p < 10) {
//        if ($result === 1) {
//            if ($n === strip_tags($n)) {
//                if ($smtm->fetch() === false) {
//        $smtm = $pdo->prepare("INSERT INTO crud_2.test_note_2 (name, description, prioritet, flag ,date) VALUES(?, ?, ?, ?, ?)");
//        $smtm->execute([$name, $description, $prioritet, $status, $date]);
//        header("location:index.php");
//        exit();
//                    }
//                }else{
//                    echo 'warning name';
//                }
//        }else{
//            echo 'Warning Html/JavaScript';
//        }
//
//    }


?>