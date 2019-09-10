<?php
require "../config/dbconnect.php";

$sql = "INSERT INTO `user`(`first_name`, `second_name`, `email`) VALUES ('{$_POST['first_name']}','{$_POST['second_name']}','{$_POST['email']}')";
$lasId = "SELECT MAX( id )  as id FROM `user`";

$count = $db->runQuery($sql);
$id = $db->getResult($lasId);

$id['success'] = $count;
print_r(json_encode($id));
//var_dump($users);
