<?php
require "../config/dbconnect.php";

$sql = "UPDATE `user` SET {$_POST['table']}= ? WHERE `id` = ?";
$RegName = "/^[a-zA-Zа-яА-Я']{2}[a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/u";

$json = array();

if (isset($_POST['value'])) {
    if (trim($_POST['value']) === '') {
        $json['error']['value'] = "У вас пустое поле";
    }
}

if (isset($_POST['attrName']) && isset($_POST['table'])) {
   if($_POST['attrName'] ==='first_name' || $_POST['attrName'] ==='second_name' ){
       if (!preg_match($RegName, trim($_POST['value']))) {
           $json['error'][trim($_POST['table'])] = 'Введите коректно Поле: ' . $_POST['table'];
       }
   }
}

if (isset($_POST['attrName']) && $_POST['attrName'] === 'email'){
    if ((mb_strlen( trim($_POST['value'])) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',  trim($_POST['value']))) {
        $json['error']['email'] = "Некоректнный ввод Емейла";
    }
}

if (!$json) {
    $users = $db->update($sql,array($_POST['value'],$_POST['id']));
    if (!$users) {
        $json['fail'] = "Обновить данные не получилось";
    } else {
        $json['success'] = 'ОБновление прошло успешно';
    }
}

print_r(json_encode($json));
