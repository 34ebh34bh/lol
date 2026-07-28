<?php
$file_name = "notes.txt";
if (unlink('notes.txt')) {
    echo 'Удалено';
    header("Location:app.php");
    exit();
} else {
    echo "Ошибка при удалении файла Возможно, файл не существует или нет прав на удаление.";
}