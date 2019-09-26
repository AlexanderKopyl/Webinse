<?php
require "../config/dbconnect.php";

$sql = "DELETE FROM `user` WHERE `id` = ?";


$users = $db->delete($sql,[$_POST['id']]);


