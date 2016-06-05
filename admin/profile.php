<?php
require_once '../header.php';

if(!empty($_POST['username'])
	&& !empty($_POST['password'])
	&& !empty($_POST['email'])
	&& !empty($_POST['fullname']))

	mysqli_query(
		$mysqli,
		"UPDATE Admin
		SET
		username='{$_POST['username']}',
		password='{$_POST['password']}',
		email='{$_POST['email']}',
		fullname='{$_POST['fullname']}'
		WHERE id=1;");

$result = mysqli_query($mysqli, 'SELECT * FROM Admin;');
$admin = mysqli_fetch_assoc($result);
mysqli_close($mysqli);
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
require_once $config['base_url'].'footer.php';
?>
