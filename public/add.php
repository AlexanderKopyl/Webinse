<?php
require "../config/dbconnect.php";
require "../class/Validator.php";
use classDB\db\Validator;
$validator = new Validator($_POST);
$sql = "INSERT INTO `user`(`first_name`, `second_name`, `email`) VALUES (?,?,?)";
$lasId = "SELECT MAX( id )  as id FROM `user`";
$json = $validator->validationAdd();

if (!$json) {
    $count = $db->runQuery($sql,array($_POST['first_name'],$_POST['second_name'],$_POST['email']));
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
