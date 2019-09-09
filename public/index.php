<?php
$users = require_once '../config/users.php';
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
    <title>Webinse</title>
</head>
<body>
<table class="table table-bordered table-hover" id="main-table">
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
    <?php foreach ($users as $user) : ?>
    <tr>
        <th scope="row"><?php echo $user['id']?></th>
        <td data-info="first_name" data-id="<?php echo $user['id']?>"><?php echo $user['first_name']?></td>
        <td data-info="second_name" data-id="<?php echo $user['id']?>"><?php echo $user['second_name']?></td>
        <td data-info="email" data-id="<?php echo $user['id']?>"><?php echo $user['email']?></td>
        <td class="btn-box">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-danger">Delete</button>
            </div>

        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
