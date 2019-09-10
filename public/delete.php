<?php
require "../config/dbconnect.php";

$sql = "DELETE FROM `user` WHERE `id` = {$_POST['id']}";


$users = $db->delete($sql);


