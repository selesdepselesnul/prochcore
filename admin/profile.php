<?php
require_once '../function.php';
redirectIfNotLogin();
require_once 'header-admin.php';

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
<div class="row upper-row">
	<form method="POST" class="form-horizontal">
		<div class="form-group">
			<label class="control-label" for="username">Username</label>
			<input class="form-control" type="text" name="username"
				   value="<?php echo $admin['username']?>" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password"
					value="<?php echo $admin['password']?>" />
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" name="email"
					value="<?php echo $admin['email']?>" />
		</div>
		<div class="form-group">
			<label for="fullname">Fullname</label>
			<input class="form-control" type="text" name="fullname"
					value="<?php echo $admin['fullname']?>"/>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-default">
		</div>
	</form>
</div>

<?php
require_once '../footer.php';
?>
