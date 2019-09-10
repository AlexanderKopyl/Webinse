<?php
require "../config/dbconnect.php";

$sql = "UPDATE `user` SET {$_POST['table']}='{$_POST['value']}' WHERE `id` = {$_POST['id']}";

$users = $db->update($sql);
