<?php
require '../vendor/autoload.php';
$db = require_once '../config/dbconnect.php';
$lang = require_once '../config/language.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col"><? echo $lang['first_name']?></th>
        <th scope="col"><? echo $lang['second_name']?></th>
        <th scope="col"><? echo $lang['email']?></th>
        <th scope="col"><? echo $lang['buttons']?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>test1@gmail.com</td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>

        </td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>test1@gmail.com</td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>test1@gmail.com</td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </td>
    </tr>
    </tbody>
</table>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
