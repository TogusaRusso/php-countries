<?php
// подготовим базу данных
$config = json_decode(file_get_contents('config/app.json'), true);
$db = new PDO(
    "mysql:host={$config['db']['ip']};port={$config['db']['port']};charset=utf8",
    $config['db']['user'],
    $config['db']['password']
);
$db->query("CREATE DATABASE IF NOT EXISTS {$config['db']['dbName']}
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci
");
$db->query("USE {$config['db']['dbName']}");
$db->query("CREATE TABLE IF NOT EXISTS country(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL DEFAULT '' UNIQUE)
");

// модель для связи с базой данныых
require_once('src/model.php');
$country =  new Country($db);

// если пришел запрос с GET параметром json
// надо вернуть список стран в формате JSON
if (isset($_GET['json'])) {
    $result = $country->all();
    // шаблон для передачи информации из $result в виде JSON
    require_once('src/views/json.php');
// иначе выводим заглавную страницу
} else {
    // если был POST запрос с новой страной
    // попытаемся её добавить
    if (isset($_POST['name'])) {
        try {
            $country->add($_POST['name']);
        } catch (ErrorException $e) {
            // в случае, если не удалось добавить
            // используем переменную, чтобы передать
            // ошибку в шаблон
            $error = $e->getMessage();
        }
    }
    // шаблон для вывода заглавной страницы
    // выводит содержимое $error если не пустая
    require_once('src/views/main.php');
}