<?php
require_once '../tags.php';
    if(isset($_POST['username'])
        && isset($_POST['password'])) {
        $admin = read_dbase('Admin');
        if($_POST['username'] == $admin['username']
            && $_POST['password'] == $admin['password']) {
            echo "cucok";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <form method="post">
            <input type="text" name="username" placeholder="username"> <br />
            <input type="password" name="password" placeholder="password"> <br />
            <input type="submit" name="login">
        </form>
    </body>
</html>
