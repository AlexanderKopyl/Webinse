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
<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">First Name:</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="second_name" class="col-form-label">Second Name:</label>
                        <input type="text" name="second_name" class="form-control" id="second_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" name="email" class="form-control" id="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addUser">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="button-modal">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
        Add User
    </button>
</div>
<table class="table table-bordered table-hover" id="main-table">
    <thead>
    <tr>
        <th scope="col">#id</th>
        <th scope="col"><? echo $lang['first_name']?></th>
        <th scope="col"><? echo $lang['second_name']?></th>
        <th scope="col"><? echo $lang['email']?></th>
        <th scope="col"><? echo $lang['buttons']?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
    <tr data-id="<?php echo $user['id']?>">
        <th scope="row"><?php echo $user['id']?></th>
        <td data-info="first_name" data-id="<?php echo $user['id']?>"><?php echo $user['first_name']?></td>
        <td data-info="second_name" data-id="<?php echo $user['id']?>"><?php echo $user['second_name']?></td>
        <td data-info="email" data-id="<?php echo $user['id']?>"><?php echo $user['email']?></td>
        <td class="btn-box">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-danger deleteUser" data-id="<?php echo $user['id']?>">Delete</button>
            </div>

        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
