<?php
require_once 'header.php';
require_once 'tags.php';

if (isset($_GET['page'])) {

    print_r(read_all_assoc_limit('Inbox', ($_GET['page'] * 5) - 5, 5));
}

require_once 'footer.php';
?>
