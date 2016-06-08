<?php
require_once 'header.php';
require_once 'tags.php';
if(isset($_GET['id']))
    var_dump(read_dbase_by_id('Inbox', $_GET['id']));
require_once 'footer.php';
?>
