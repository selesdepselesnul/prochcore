<?php
require_once 'header-admin.php';
require_once '../function.php';
redirectIfNotLogin();
$admin = read_table_by_id('Admin', 1);
?>
<p class="row upper-row lead">Selamat datang <?php echo $admin['fullname'] ?></p>
<div class="row upper-row">
    <img src="<?php echo $admin['avatar'] ?>" width="200" height="200" class="img-circle">
</div>
<div class="lower-container">
    <div class="lead">
        <p>Jumlah seluruh inbox : <span class="label label-default"><?php echo count_row('Inbox') ?></span></p>
        <p>Jumlah seluruh inbox yang belum dibaca : <span class="label label-danger"><?php echo count_row_where('Inbox', 'is_read', 0) ?></span></p>
        <p>Jumlah seluruh inbox yang sudah dibaca : <span class="label label-success"><?php echo count_row_where('Inbox', 'is_read', 1) ?></span></p>
    </div>
</div>
<?php require_once '../footer.php'; ?>
