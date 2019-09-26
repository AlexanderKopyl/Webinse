<?php
require "../config/dbconnect.php";
$mail = isset($_POST['email']) ? htmlspecialchars(strip_tags($_POST['email'])) : '';
$sql = "INSERT INTO `user`(`first_name`, `second_name`, `email`) VALUES ('{$_POST['first_name']}','{$_POST['second_name']}','{$mail}')";
$lasId = "SELECT MAX( id )  as id FROM `user`";
$json = array();
if (isset($_POST['first_name'])) {
    if ((mb_strlen($_POST['first_name']) < 3) || (mb_strlen($_POST['first_name']) > 32)) {
        $json['error']['first_name'] = "Некоректнный ввод имени";
    }
}
if (isset($_POST['second_name'])) {
    if ((mb_strlen($_POST['second_name']) < 3) || (mb_strlen($_POST['second_name']) > 32)) {
        $json['error']['second_name'] = "Некоректнный ввод Фамилии";
    }
}
if ((mb_strlen($mail) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $mail)) {
    $json['error']['email'] = "Некоректнный ввод Емейла";
}
if (!$json) {
    $count = $db->runQuery($sql);
    $id = $db->getResult($lasId);
    if (!$count) {
        $json['fail'] = "Такой пользователь уже существует";
    } else {
        $json['success'] = 'Добавление прошло успешно';
        $json['id'] = $id[0]['id'];
    }
}
print_r(json_encode($json));
//var_dump($users);
