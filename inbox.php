<?php
require_once 'header.php';
require_once 'tags.php';

define('LIMIT', 5);
if (isset($_GET['page'])) {
    $inboxs = read_all_assoc_limit('Inbox',
        ($_GET['page'] * LIMIT) - LIMIT, LIMIT);
?>
    <table style="border:1;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Waktu Masuk</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Content</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inboxs as $inbox): ?>
                <tr>
                    <td><?php echo $inbox['id']?></td>
                    <td><?php echo $inbox['message_time']?></td>
                    <td><?php echo $inbox['name'] ?></td>
                    <td><?php echo $inbox['email'] ?></td>
                    <td><?php echo $inbox['content'] ?></td>
                    <td>
                        <a
                        href="<?php
                        echo $config['base_url']
                        . 'inbox.php?id='.$inbox['id'] ?>"
                        >lebih lanjut</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
} elseif(isset($_GET['id']))
    var_dump(read_dbase_by_id('Inbox', $_GET['id']));
require_once 'footer.php';
?>