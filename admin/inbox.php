<?php
require_once '../header.php';
require_once '../function.php';

$no = 1;
$limit = 5;
if (!empty($_GET['page'])) {
    $bound = $_GET['page'] * $limit - $limit;
    $inboxs = exec_query(
        "SELECT * FROM `inbox` ORDER BY message_time DESC LIMIT $bound, $limit");
?>
    <table style="border:1;">
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu Masuk</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Content</th>
                <th>Dibaca</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inboxs as $inbox): ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $inbox['message_time']?></td>
                    <td><?php echo $inbox['name'] ?></td>
                    <td><?php echo $inbox['email'] ?></td>
                    <td><?php echo $inbox['content'] ?></td>
                    <td><?php echo $inbox['is_read'] ?></td>
                    <td>
                        <a
                        href="<?php
                        echo $config['base_url']
                        . 'admin/inbox.php?id='.$inbox['id'] ?>"
                        >lebih lanjut</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
} elseif(!empty($_GET['id'])) {
    update_table_by_id('Inbox',
        $_GET['id'],
        ['is_read' => TRUE]);
    var_dump(read_table_by_id('Inbox', $_GET['id']));
}
require_once '../footer.php';
?>
