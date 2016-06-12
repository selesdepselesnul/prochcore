<?php
require_once '../function.php';
require_once '../config.php';
require_once 'header-admin.php';

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
    <div class="upper-row row">
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="username" class="control-label">Username</label>
                <input class="form-control" type="text" name="username">
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="form-group">
                <input type="submit" name="login" class="btn btn-default">
            </div>
        </form>
    </div>

<?php require_once '../footer.php' ?>
