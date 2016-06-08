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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
}
require_once 'footer.php';
?>
