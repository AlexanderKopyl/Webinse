<?php

require "dbconnect.php";

$users = $db->getResult('SELECT * FROM user');

return $users;