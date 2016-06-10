<?php
require_once '../function.php';
redirectIfNotLogin();
require_once '../header.php';

function updateIfNotEmpty($table, $field_name, $post_name) {
	if(!empty($_POST[$post_name]))
		update_table_by_id($table, 1, [
			$field_name => $_POST[$post_name]
		]);
}

updateIfNotEmpty('Admin', 'username', 'username');
updateIfNotEmpty('Admin', 'password', 'password');
updateIfNotEmpty('Admin', 'email', 'email');
updateIfNotEmpty('Admin', 'fullname', 'fullname');

$admin = read_table_by_id('Admin', 1);
?>
<form method="POST">
	<label for="username">Username</label>
	<input type="text" name="username"
		   value="<?php echo $admin['username']?>" /> <br />
	<label for="password">Password</label>
	<input type="password" name="password"
			value="<?php echo $admin['password']?>" /> <br />
	<label for="email">Email</label>
	<input type="email" name="email"
			value="<?php echo $admin['email']?>" /> <br />
	<label for="fullname">Fullname</label>
	<input type="text" name="fullname"
			value="<?php echo $admin['fullname']?>"/> <br />
	<input type="submit">
</form>
<?php
require_once '../footer.php';
?>
