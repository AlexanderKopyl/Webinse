<?php
require "../config/dbconnect.php";
require "../class/Validator.php";
use classDB\db\Validator;
$sql = "UPDATE `user` SET {$_POST['table']}= ? WHERE `id` = ?";
$RegName =

$validator = new Validator($_POST);

$json = $validator->validationUpdate();

if (!$json) {
    $users = $db->update($sql,array($_POST['value'],$_POST['id']));
    if (!$users) {
        $json['fail'] = "Обновить данные не получилось";
    } else {
        $json['success'] = 'ОБновление прошло успешно';
    }
}

print_r(json_encode($json));
