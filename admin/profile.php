<?php
require_once '../function.php';
redirectIfNotLogin();
require_once 'header-admin.php';



updateIfNotEmpty('Admin', 'username', 'username');
updateIfNotEmpty('Admin', 'password', 'password');
updateIfNotEmpty('Admin', 'email', 'email');
updateIfNotEmpty('Admin', 'fullname', 'fullname');


if(isset($_POST["submit"])) {
	if($_FILES["avatar"]["tmp_name"] !== '') {
		$check = getimagesize($_FILES["avatar"]["tmp_name"]);
	    if($check) {
			$tmp_ava = $_FILES["avatar"]["tmp_name"];
			if(is_valid_std_img($tmp_ava)) {
				$admin = read_table_by_id('Admin', 1);
				$ava_name = $_FILES["avatar"]["name"];
				echo $ava_name;
				unlink($admin['avatar']);
				move_uploaded_file($tmp_ava, $ava_name);
				process_db(function($conn) use($ava_name){
					mysqli_query($conn, "UPDATE Admin SET avatar = '$ava_name' WHERE id = 1");
				});
			}
	    }
	}
}

$admin = read_table_by_id('Admin', 1);
?>
<div class="row upper-row">
	<img src="<?php echo $admin['avatar'] ?>" class="img-circle" width="200" height="200">
	<form method="POST" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label class="control-label" for="avatar">Pilih avatar</label>
			<input type="file" name="avatar"/>
 			<span class="label label-info" role="alert">jpg / png / gif</span>
		</div>
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
			<input type="submit" class="btn btn-default" name="submit" value="save">
		</div>
	</form>
</div>

<?php
require_once '../footer.php';
?>
