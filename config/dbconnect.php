<?php
require_once '../class/DB.php';
use classDB\db\DB;

$localhost = require_once "db.setting.php";

$db = new DB($localhost);
