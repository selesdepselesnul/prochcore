<?php
require_once 'header-admin.php';
$limit = 5;

function generate_span_status($class, $status) {
    return "<span class='label $class'>$status</span>";
}

if (!empty($_GET['page'])) {
    $counter = ($_GET['page'] * 5) - 5;
    $lower_page = $_GET['page'];
    $page_count = count_row('Inbox') / 5;

    if(is_float($page_count))
        $page_count = intval($page_count) + 1;
    else
        $page_count = intval($page_count);

    if(is_float($lower_page))
        $lower_page = intval($lower_page) + 1;

    $upper_page = $lower_page + 4;
    $no = $upper_page - $limit;
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
            <?php if($lower_page != 1): ?>
                <li>
                  <a href="<?php echo $config['base_url'] . 'admin/inbox.php?page='.($lower_page-1)?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
            <?php endif ?>
            <?php for ($i=$lower_page; $i <= $upper_page; $i++): ?>
                <li>
                    <a href="<?php echo $config['base_url']?>admin/inbox.php?page=<?php echo $i?>">
                        <?php echo $i;?>
                    </a>
                </li>
                <?php if($i ==  $page_count) break;?>
            <?php endfor;?>
            <?php if($upper_page < $page_count): ?>
                <li>
                  <a href="<?php echo $config['base_url'].'admin/inbox.php?page='.($upper_page + 1) ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
            <?php endif ?>
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
