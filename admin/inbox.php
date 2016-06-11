<?php
require_once 'header-admin.php';
require_once '../function.php';

$limit = 5;
function generate_span_status($class, $status) {
    return "<span class='label $class'>$status</span>";
}
if (!empty($_GET['page'])) {
    $counter = ($_GET['page'] * 5) - 5;
    $lower = $_GET['page'] / $limit;
    if(is_float($lower))
        $lower = intval($lower) + 1;
    $upper = $lower * 5;
    $no = $upper - $limit;
    $bound = $_GET['page'] * $limit - $limit;
    $inboxs = exec_query(
        "SELECT * FROM `inbox` ORDER BY message_time DESC LIMIT $bound, $limit");
?>
        <table class="row table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Waktu Masuk</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inboxs as $inbox): ?>
                    <tr>
                        <td><?php echo ++$counter?></td>
                        <td><?php echo $inbox['message_time']?></td>
                        <td><?php echo $inbox['name'] ?></td>
                        <td><?php echo $inbox['email'] ?></td>
                        <td><?php echo $inbox['is_read'] ?
                            generate_span_status('label-default', "sudah dibaca")
                            :generate_span_status('label-danger', "belum dibaca") ?></td>
                        <td>
                            <a class="btn btn-default"
                            href="<?php
                            echo $config['base_url']
                            . 'admin/inbox.php?id='.$inbox['id'] ?>"
                            >Baca</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav class="row">
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for ($i=$lower; $i <= $upper ; $i++): ?>
                <li>
                    <a href="<?php echo $config['base_url']?>admin/inbox.php?page=<?php echo $i?>">
                        <?php echo $i;?>
                    </a>
                </li>
            <?php endfor;?>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
<?php
} elseif(!empty($_GET['id'])) {
    $inbox = read_table_by_id('Inbox', $_GET['id']);
    update_table_by_id('Inbox',
        $_GET['id'],
        ['is_read' => TRUE]);
?>
    <div class="row">
        <h4><?php echo 'Nama pengirim : ' . $inbox['name']?></h4>
        <h4><?php echo 'Email pengirim : ' . $inbox['email']?></h4>
        <?php echo '<hr /><h4>Content :</h4><br />'.$inbox['content'] ?>
    </div>
<?php
} else {
    redirectTo($config['base_url']);
}
require_once '../footer.php';
?>
</div>
