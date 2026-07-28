<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // проверяем на получение данных
    $name = $_POST['name'];
    $description = $_POST['description'];
    $prioritet = $_POST['prioritet'];

    $n = trim($name); // убенраем пробелы по бакам
    $d = trim($description);
    $p = trim($prioritet);

    $arr_ds = ['test', 'admin', 'lol']; //запрешённые слова
    $wrong_detected = false; //флаг на то будем ли мы дальше отправлять данные или нет

    $smtm = $pdo->prepare("SELECT name FROM crud_2.test_note WHERE name=?");
    $smtm->execute([$n]);

    if ($smtm->fetch() === false) {
        if (strlen($n) >= 1 && strlen($d) >= 10 && $p >= 5) { // проверяем длину введёного текста
            foreach ($arr_ds as $arr_d) { // перебераем масив в запрет словами т сравнимаем с тем что пришло из desc
                if (strpos($d, $arr_d) !== false) { //если там есть плохие слова
                    echo 'ошибка ' . ' слово ' . $arr_d . ' запрещено';
                    $wrong_detected = true; // флан делается true и мы дальше не отправим это некуда
                }
            }
            if (is_numeric($p) === true) {
            if ($wrong_detected === false) { // иначе отправлячем в бд и рабоатет дальеш
                $smtmt = $pdo->prepare("INSERT INTO crud_2.test_note (name, description, prioritet) VALUES (?,?,?)");
                $smtmt->execute([$n, $d, $p]);
                header('Location:create_noye.php');
                exit();
            }
            }else{
                echo 'error';
            }
        }
    }
    }else{
        echo 'Имя уже занято';
    }
?>