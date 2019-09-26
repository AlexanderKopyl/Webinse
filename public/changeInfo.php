<?php
require "../config/dbconnect.php";
require "../class/Validator.php";
use classDB\db\Validator;
$sql = "UPDATE `user` SET {$_POST['table']}= ? WHERE `id` = ?";
$RegName =

$validator = new Validator($_POST);

$json = $validator->validationUpdate();

if (!$json) {
    $count = $db->runQuery($sql,array($_POST['value'],$_POST['id']));
//    $users = $db->update($sql,array($_POST['value'],$_POST['id']));
    if (!$count) {
        $json['error']['exist'] = "Обновить данные не получилось";
    } else {
        $json['success'] = 'ОБновление прошло успешно';
    }
}

print_r(json_encode($json));
