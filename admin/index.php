<?php
require_once '../header.php';
$result = mysqli_query($mysqli, 'SELECT * FROM Admin;');
// $result = mysqli_use_result($mysqli);	
$admin = mysqli_fetch_assoc($result);
?>
<div>
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
			value="<?php echo $admin['fullname']?>"/>
</div>
<?php
require_once '../footer.php';
?>