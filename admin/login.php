<?php
require_once '../function.php';
require_once '../config.php';
    if(isset($_POST['username'])
        && isset($_POST['password'])) {
        $admin = read_table_by_id('Admin', 1);
        if($_POST['username'] == $admin['username']
            && $_POST['password'] == $admin['password']) {
            session_start();
            $_SESSION['login'] = 1;
            header('Location: '.$config['base_url'].'admin/content.php');
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
